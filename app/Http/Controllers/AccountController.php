<?php

namespace App\Http\Controllers;

use App\Actions\SubscribeActiveListAction;
use App\Actions\SubscribeDoctorListAction;
use App\Actions\SubscribeOldListAction;
use App\Actions\SubscribeTimeAction;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\AuthPostRequest;
use App\Http\Requests\SubscribeManageRequest;
use App\Http\Requests\UserInfoRequest;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Actions\SubscribeDateAction;
use PhpParser\Comment\Doc;
use Storage;
use function view;

class AccountController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        return view('Account.sign_up');
    }

    public function save(RegisterPostRequest $request)
    {
        $user = new User();
        $user->login = $request->login;
        $user->tel_number = $request->tel_number;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->assignRole('user')->givePermissionTo('view_profile');
        if ($user->save()) {
            Auth::login($user);
            return redirect()->route('change');
        }

        return redirect()->route('register')->withErrors('error');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        return view('Account.sign_in');
    }

    public function auth(AuthPostRequest $request): RedirectResponse
    {
        if (Auth::attempt(['login' => $request->get('login'), 'password' => $request->get('password')], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('main');
        } else {
            return back()->withErrors(
                ['login' => 'неверный пользователь или пароль.']
            );
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }

    public function change_pas(Request $request)
    {

        $request->validateWithBag('pass',

            [
                'current_password' => 'required|current_password',
                'password' => 'required|confirmed|min:6',
            ],
            [
                'required' => 'Введите пароль.',
                'confirmed' => "Пароли не совпадают.",
                'min' => 'Пароль минимум из 6 символов.',
                'current_password' => 'Неверный пароль.'
            ]);
        $user = Auth::user();
        $user->setAttribute('password', Hash::make($request->password));
        if ($user->save()) {
            return back();
        } else {
            return back()->withErrors(['pass' => 'Произошла ошибка.']);
        }

    }

    public function change_info(Request $request)
    {
        $request->validateWithBag('info',
            [
                'surname' => 'required|alpha',
                'name' => 'required|alpha',
                'second_name' => 'required|alpha',
                'date' => 'required|date',
                'sex' => 'required'
            ],
            [
                'required' => 'Поле не заполнено.',
                'date' => 'Введите дату.',
                'surname.alpha' => 'Фамилия может содержать только буквы.',
                'name.alpha' => 'Имя может содержать только буквы.',
                'second_name.alpha' => 'Отчество может содержать только буквы.',
            ]);
        $user = Auth::user();
        $full_name = $request->surname . ' ' . $request->name . ' ' . $request->second_name;
        $user->full_name = $full_name;
        $user->birthday = $request->date;
        $user->sex = $request->sex;
        $user->updated_at = Carbon::now();
        if ($user->save()) {
            return back();
        } else {
            return back()->withErrors(['info' => 'Произошла ошибка.']);
        }
    }

    public function change_phone(UserInfoRequest $request)
    {
        $request->validateWithBag('phone',

            [
                'tel_number' => ['required', 'digits:9', 'regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/', Rule::unique('users', 'tel_number')]
            ],
            [
                'required' => 'Поле не заполнено.',
                'digits' => 'Номер телефона состоит из 9 цифр.',
                'tel_number.regex' => 'Введите номер телефона белорусских операторов.',
                'tel_number.unique' => 'Такой номер телефона уже зарегистрирован.'
            ]);
        $user = Auth::user();
        $user->setAttribute('tel_number', $request->tel_number);
        if ($user->save()) {
            return back();
        } else {
            return back()->withErrors(['phone' => 'Произошла ошибка.']);
        }
    }

    public function save_image(Request $request)
    {
        $request->validate(
            [
                'profile-image' => 'mimes:webp,jpeg,png,jpg|required'
            ]);
        if ($img = Auth::user()->img)
            Storage::disk('public')->delete($img);
        $path = $request->file('profile-image')->store('uploads/image/users', 'public');
        $user = Auth::user();
        $user->setAttribute('img', $path);
        $user->save();
        return redirect()->back();
    }

    public function subscribe()
    {
        $category = ServiceCategory::all();
        $doctors = Doctor::all();
        $id = null;
        return view('Account.subscribe', compact('category', 'doctors', 'id'));
    }

    public function subscribe_doc(Request $request)
    {
        $category = ServiceCategory::all();
        $doctors = Doctor::all();
        $id = $request->id;
        $id_category = Doctor::all()->where('id', '=', $id)->first()->getAttribute('id_service_category');
        $url_category = ServiceCategory::all()->where('id', '=', $id_category)->first()->getAttribute('url_name');
        return view('Account.subscribe', compact('category', 'doctors', 'id', 'url_category'));
    }

    //partial subscribe
    public function subscribe_services(Request $request)
    {
        if (!$request->name)
            redirect()->back();
        $id = ServiceCategory::all()->where('url_name', '=', $request->name)->first()->id;
        $services = Service::all()->where('id_service_category', '=', $id);
        $doctors = Doctor::all()->where('id_service_category', '=', $id);
        return view('Account.partial.partial_subscribe_services', compact('services', 'doctors'));
    }

    public function subscribe_doctors(Request $request)
    {
        if (!$request->name)
            redirect()->back();
        $id = ServiceCategory::all()->where('url_name', '=', $request->name)->first()->id;
        $doctors = Doctor::all()->where('id_service_category', '=', $id);
        return view('Account.partial.partial_subscribe_doctors', compact('doctors'));
    }

    public function subscribe_date(Request $request, SubscribeDateAction $action)
    {
        if (!$request->id)
            redirect()->back();
        $dates = $action->handle($request->id);
        return view('Account.partial.partial_subscribe_date', compact('dates'));
    }

    public function subscribe_time(Request $request, SubscribeTimeAction $action)
    {
        if (!$request->id)
            redirect()->back();
        $times = $action->handle($request->id, $request->date);
        return view('Account.partial.partial_subscribe_time', compact('times'));
    }

    public function subscribe_save(SubscribeManageRequest $request)
    {
        $sub = new Subscribe();
        $sub->id_doctor = $request->doctor;
        $sub->id_service_category = ServiceCategory::all()->where('url_name', '=', $request->category)->first()->id;
        $sub->time = $request->time;
        $sub->date = $request->date;
        $sub->user_login = $request->login;
        $sub->id_service = $request->service;
        $sub->save();
        return redirect()->back();
    }

    public function get_user_subscribe(SubscribeOldListAction $action1, SubscribeActiveListAction $action2)
    {
        $subs = $action1->handle();
        $active_subs = $action2->handle();
        return view('Account.user_profile_get_subscribe', compact('subs', 'active_subs'));
    }

    public function get_doctor_subscribe(SubscribeDoctorListAction $action)
    {
        $active_subs_after_week = $action->after_week_handle();
        $week_subs = $action->week_handle();
        $archive_subs = $action->archive_handle();

        return view('Account.doctor_profile_get_subscribe', compact('active_subs_after_week', 'week_subs', 'archive_subs'));
    }

    public function schedules_doctors()
    {
        $category = ServiceCategory::all();
        $doctors = Doctor::all();
        return view('Account.Manage.schedules_doctors', compact('category', 'doctors'));
    }

    public function manage_register()
    {
        $user = null;
        $doctors = Doctor::all();
        $category = ServiceCategory::all();
        return view('Account.Manage.manage_register_user', compact('user', 'category', 'doctors'));
    }

    public function manage_register_found(UserInfoRequest $request)
    {
        $user = User::all()->where('tel_number', '=', $request->tel_number)->first();
        if ($user)
            return view('Account.partial.user_find', compact('user'));
        return '<div class="text-center text-5xl error_message">Пациент не найден</div>';
    }

    public function manage_subscribe(SubscribeManageRequest $request)
    {
        $sub = new Subscribe();
        $sub->id_doctor = $request->doctor;
        $sub->id_service_category = ServiceCategory::all()->where('url_name', '=', $request->category)->first()->id;
        $sub->time = $request->time;
        $sub->date = $request->date;
        $sub->user_login = User::all()->where('tel_number','=',$request->tel_number)->first()->get('login');
        $sub->id_service = $request->service;
        if($sub->save()){
            return redirect()->back()->with('success', 'Пользователь успешно зарегистрирован');
        }
        return redirect()->back()->with('fail', 'Произошла ошибка');
    }
}
