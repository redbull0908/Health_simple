<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\AuthPostRequest;
use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserPasRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        redirect()->route('register')->withErrors('error');
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

        $request->validate(
            ['Password'=>'required|min:6',
                'current_Password'=>'required|min:6'],
            ['required'=>'Введите пароль',
                'min'=>'Пароль минимум 6 символов']
        );

        if($request->current_Password === $request->Password_confirm) {


            if (\Hash::check($request->current_Password, Auth::user()->password)) {
                $user = Auth::user();
                $user->setAttribute('password', \Hash::make($request->Password));
                if ($user->save()) {
                    return back()->withErrors(
                        ['suc' => 'Пароль изменен']
                    );
                }
            } else {
                return back()->withErrors(
                    ['message' => 'Неверный пароль.']
                );
            }
        }
        return back()->withErrors(
            ['message' => 'Пароли не совпадают.']
        );
    }

    public function change_info(UserInfoRequest $request){
        dd($request);
    }
}
