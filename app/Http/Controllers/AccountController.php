<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\AuthPostRequest;
use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class AccountController extends Controller
{
    public function register()
    {
        if(Auth::check()){
            return redirect()->route('main');
        }
        return view('Account.register');
    }

    public function save(RegisterPostRequest $request)
    {
        $user = new User();
        $full_name = $request->surname . ' ' . $request->name . ' ' . $request->second_name;
        $user->login = $request->login;
        $user->full_name = $full_name;
        $user->tel_number = $request->phone_number;
        $user->password = password_hash($request->Password, PASSWORD_DEFAULT);
        $user->birthday = $request->date;
        $user->sex = $request->sex;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->assignRole('user')->givePermissionTo('view_profile');
        if($user->save()){
            Auth::login($user);
            return redirect()->route('main');
        }

        return redirect()->route('register')->withErrors('error');
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('main');
        }
        return view('Account.login');
    }

    public function auth(AuthPostRequest $request): RedirectResponse
    {
        if(Auth::attempt(['login'=>$request->login,'password'=>$request->Password],$request->remember)){
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        else{
            return back()->withErrors(
                ['login'=>'неверный пользователь или пароль.']
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

    public function get_profile (){
        return \view('user_profile');
    }

    public function change_pas(Request $request){

            $request->validateWithBag('pass',

            [
                'current_password'=>'required|current_password',
                'password'=>'required|confirmed|min:6',
            ],
            [
                'required'=>'Введите пароль.',
                'confirmed'=>"Пароли не совпадают.",
                'min'=>'Пароль минимум из 6 символов.',
                'current_password'=>'Неверный пароль.'
            ]);

                $user = Auth::user();
                $user->setAttribute('password', \Hash::make($request->password));
                if ($user->save()) {
                    return back();
                }
                else {
                        return back()->withErrors(['pass' => 'Произошла ошибка.']);
                }

    }

    public function change_info(UserInfoRequest $request){
        $request->validateWithBag('info',

            [
                'surname'=>'required|alpha',
                'name'=>'required|alpha',
                'second_name'=>'required|alpha',
                'tel_number'=>['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/',Rule::unique('users','tel_number')],
                'date'=>'required|date',
                'sex'=>'required'
            ],
            [
                'required'=>'Поле не заполнено.',
                'date'=>'Введите дату.',
                'digits'=>'Номер телефона состоит из 9 цифр.',
                'surname.alpha'=>'Фамилия может содержать только буквы.',
                'name.alpha'=>'Имя может содержать только буквы.',
                'second_name.alpha'=>'Отчество может содержать только буквы.',
                'tel_number.regex'=>'Введите номер телефона белорусских операторов.',
                'tel_number.unique'=>'Такой номер телефона уже зарегистрирован.'
            ]);
        $user = Auth::user();
        $full_name = $request->surname . ' ' . $request->name . ' ' . $request->second_name;
        $user->full_name = $full_name;
        $user->tel_number = $request->tel_number;
        $user->birthday = $request->date;
        $user->sex = $request->sex;
        $user->updated_at = Carbon::now();
        if ($user->save()) {
            return back();
        }
        else {
            return back()->withErrors(['info' => 'Произошла ошибка.']);
        }
    }

    public function save_image (Request $request){
        $request->validate(
            [
            'image'=>'mimes:webp,jpeg,png,jpg|required'
            ],
            [
            'required'=>'Вы не выбрали файл.',
            'mimes'=>'Файл не является изображением'
            ]);
        if($img = Auth::user()->img)
        \Storage::disk('public')->delete($img);
         $path = $request->file('image')->store('uploads/image/users','public');
         $user = Auth::user();
         $user->setAttribute('img',$path);
         if($user->save())
         {
             return redirect('profile');
         }
        return redirect('profile')->withErrors('Не удалось загрузить файл');
    }
}
