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


//Frontend Routes



Route::get('/', 'FrontendController@ShowHomepage');
Route::get('/contact', 'FrontendController@ShowContactpage');
Route::get('/handleiding', 'FrontendController@ShowHandleidingpage');

/* voorstelling routes*/
Route::get('/voorstelling/{id}', 'FrontendController@ShowVoorstellingpage');
Route::post('/voorstelling/{id}', 'FrontendController@VoorstellingRequest');
Route::get('/voorstelling/{id}/reserveer', 'FrontendController@ShowVoorstellingReserveerpage');
Route::post('/voorstelling/{id}/reserveer', 'FrontendController@ReserveerRequest');
Route::get('/voorstelling/{id}/reserveerSave', 'FrontendController@ReserveerRequestSave');
Route::get('/reservatie/{token}', 'FrontendController@ShowBevestigingspage');


//Backend Routes
Route::get('/login', 'FrontendController@ShowBeheerLogin');
Route::get('/beheer', 'BackendController@ShowBeheer');

Route::get('/beheer/play', 'BackendController@ShowPlay');
Route::get('/beheer/play/add', 'BackendController@ShowPlayAdd');
Route::get('/beheer/play/{id}', 'BackendController@ShowPlayEdit');

Route::get('/beheer/performance', 'BackendController@ShowPerformance');
Route::get('/beheer/performance/add', 'BackendController@ShowPerformanceAdd');
Route::get('/beheer/performance/{id}', 'BackendController@ShowPerformanceEdit');

Route::get('/beheer/page', 'BackendController@ShowPage');
Route::get('/beheer/page/{id}', 'BackendController@ShowPageEdit');

Route::get('/beheer/reservation', 'BackendController@ShowReservation');
Route::get('/beheer/reservation/add', 'BackendController@ShowPerformanceAdd');
Route::get('/beheer/reservation/performance/{performance_id}', 'BackendController@ShowPerformanceReservation');
Route::get('/beheer/reservation/edit/{reservation_id}', 'BackendController@ShowReservationEdit');

Route::get('/beheer/log', 'BackendController@ShowLog');


//Test Routes
Route::get('/test', 'TestController@test');
Route::get('/test2', 'TestController@test2');
Route::get('/test3', 'TestController@test3');
Route::get('/test4', 'TestController@test4');


Route::get('/home', 'HomeController@index');


// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

