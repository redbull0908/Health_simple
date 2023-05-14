<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//main
Route::get('/', [MainController::class , 'main' ])->name('main');
//home
Route::controller(HomeController::class)->group(function () {
    Route::get('/services', 'services_category')->name('services');
    Route::get('/our_specialists', 'doctors')->name('doctors');
    Route::get('/services/{name}', 'service')->name('service');
    Route::get('contacts',function (){
        return view('Home.contacts');
    })->name('contacts');
});
//account
Route::controller(AccountController::class)->group(function () {
    //register view
    Route::get('sign_up', 'register')->name('register');
    //register->save
    Route::post('sign_up', 'save')->name('save');
    //login view
    Route::get('sign_in', 'login')->name('login');
    //login->auth
    Route::post('sign_in', 'auth')->name('auth');
    //profile view
    Route::get('profile', function (){
        return view('Account.user_profile');
    })->name('profile')->middleware('permission:view_profile');
    //change_profile view
    Route::get('change_info', function(){
        return view('Account.user_profile_change');})->name('change')->middleware('permission:change_profile');
    //logout
    Route::get('logout', 'logout')->name('logout');
    //change_password
    Route::post('profile/change_pas','change_pas')->name('change_pas_save');
    //change_profile
    Route::post('profile/change_info','change_info')->name('change_info_save');
    //change_tel_number
    Route::post('profile/change_phone','change_phone')->name('change_phone_save');
    //change profile_img
    Route::post('profile/upload_image','save_image')->name('save_image');
    //subscribe view
    Route::get('subscribe','subscribe')->name('subscribe')->middleware('permission:subscribe');
    Route::post('subscribe','subscribe_doc')->middleware('permission:subscribe')->name('subscribe_doc');
    //partials_subscribe
    Route::get('profile_services/{name?}','subscribe_services')->name('subscribe_services')->middleware('permission:search_info');
    Route::get('profile_doctors/{name?}','subscribe_doctors')->name('subscribe_doctors')->middleware('permission:search_info');
    Route::get('profile_date/{name?}','subscribe_date')->name('subscribe_date')->middleware('permission:search_info');
    Route::get('profile_time/{name?}/{date?}','subscribe_time')->name('subscribe_time')->middleware('permission:search_info');
    //subscribe save
    Route::post('subscribe/save','subscribe_save')->name('subscribe_save')->middleware('permission:subscribe');
    //get users subscribes
    Route::get('user_records','get_user_subscribe')->name('get_user_subscribe')->middleware('permission:subscribe');
    //get doctor subscribe
    Route::get('doctor_records','get_doctor_subscribe')->name('get_doctor_subscribe')->middleware('permission:doctor_subscribe');

    //Manage
    Route::get('registratura/schedules','schedules_doctors')->name('schedules_doctors')->middleware('permission:manage');
    Route::get('registratura/register','manage_register')->name('manage_register')->middleware('permission:manage');
    Route::get('registratura/user_find','manage_register_found')->name('manage_register_found')->middleware('permission:manage');
    Route::post('manage_subscribe','manage_subscribe')->name('manage_subscribe')->middleware('permission:manage');
});


