<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/inicio', 'EcommerceController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'administrator'], function () {
  Route::get('/login', 'AdministratorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdministratorAuth\LoginController@login');
  Route::post('/logout', 'AdministratorAuth\LoginController@logout')->name('logout');


  Route::post('/password/email', 'AdministratorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdministratorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdministratorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdministratorAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'instructor'], function () {
  Route::get('/login', 'InstructorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'InstructorAuth\LoginController@login');
  Route::post('/logout', 'InstructorAuth\LoginController@logout')->name('logout');

  Route::post('/password/email', 'InstructorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'InstructorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'InstructorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'InstructorAuth\ResetPasswordController@showResetForm');
});
