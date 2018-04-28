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

Route::get('/home', 'HomeController@index')->name('home');

route::get('/auth/activate', 'Auth\ActivationController@activation')->name('auth.activate');
route::get('/auth/activate/resend', 'Auth\ActivationController@showResendForm')->name('auth.resend');
Route::post('/auth/activate/resend', 'Auth\ActivationController@resend');

//Retrieve and download messages
Route::get('/message/download', 'DownloadController@index')->name('download');
Route::post('/message/download', 'DownloadController@download')->middleware('throttle:60,1');
Route::get('/message/secret/{salt}', 'DownloadController@secret')->name('secret');
Route::get('/message/file/{fileid}', 'DownloadController@filedownload')->name('filedownload');

Route::get('/form/{company}', 'FormController@show');
Route::post('/api/sendform', 'FormController@store')->name('sendform');

// about pages

Route::view('/privacy', 'about.privacy');
Route::view('/security', 'about.security');
Route::view('/support', 'about.support');
Route::view('/prices', 'about.prices');
Route::view('/why', 'about.why');
Route::get('/help', function () {
    return redirect()->away('https://heisann.netlify.com');
});
Route::view('/gdpr', 'about.gdpr');
Route::view('/video', 'about.video_guides');
Route::view('/terms', 'about.terms');
Route::view('/about', 'about.about');
Route::view('/contact', 'about.contact');


