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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/showpage/{id}','HomeController@show');

Route::resource('home', 'ArticleUserController');

Route::resource('admin/page','ArticleAdminController');

Route::get('admin/page/app-article/{id}','ArticleAdminController@approve');
Route::get('admin/page/reject-article/{id}','ArticleAdminController@reject');

Route::get('home/post-article/{id}','ArticleUserController@post');

Route::get('admin','admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','admin\LoginController@login');
route::get('admin-register','admin\RegisterController@showRegistrationForm')->name('admin.register');
route::post('admin-register','admin\RegisterController@register');

Route::post('admin-password/email','admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
route::get('admin-password/reset','admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
route::post('admin-password/reset','admin\ResetPasswordController@reset');
route::get('admin-password/reset/{token}','admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
