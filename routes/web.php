<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
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
Route::get('/', function (){
    return view ('main');
})->name('main');
//home
Route::controller(HomeController::class)->group(function () {
    Route::get('/services', 'services_category')->name('service_category');
    Route::get('/our_specialists', 'doctors')->name('doctors');
    Route::get('/services/{id}', 'service')->name('service');
});
//account
Route::controller(AccountController::class)->group(function () {
    Route::get('sign_up', 'register')->name('register');
    Route::post('sign_up', 'save')->name('save');
    Route::get('sign_in', 'login')->name('login');
    Route::post('sign_in', 'auth')->name('auth');
    Route::get('profile', 'get_profile')->name('profile')->middleware('permission:view_profile');
    Route::get('logout', 'logout')->name('logout');

    Route::post('profile/change_pas','change_pas')->name('change_pas_save');
    Route::post('profile/change_info','change_info')->name('change_info_save');
    Route::post('profile/upload_image','save_image')->name('save_image');
});


