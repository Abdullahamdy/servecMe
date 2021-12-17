<?php

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

Route::group(['namespace'=>'frontend'],function(){
    Route::get('/','HomeController@index')->name('main');
    Route::post('subscripe','HomeController@subscripe')->name('subscripe');
    Route::get('contact-us','ContactUsController@getForm')->name('contact-us');
    Route::post('contact-us','ContactUsController@subForm')->name('contact-us');

});
Route::get('/client-register','frontend\clientloginController@getFormAccount')->name('client-register');
Route::post('/create-account','frontend\clientloginController@register')->name('create-account');
Route::get('/clientlogin', 'frontend\clientloginController@index')->name('clientlogin');
Route::post('/clientLogin', 'frontend\clientloginController@login')->name('clientLogin');
Route::post('/logout', 'frontend\clientloginController@logout')->name('logout');









