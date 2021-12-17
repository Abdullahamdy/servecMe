<?php
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/login', 'AuthController@viewLogin')->name('admin.login');
    Route::post('/login', 'AuthController@login');
});
 Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', 'HomeController@index');

    Route::get('home', 'HomeController@index')->name('adminlogout');

    Route::get('home', 'HomeController@index')->name('admin.home');
    Route::post('admin-logout', 'AuthController@adminLogout')->name('admin.logout');
    Route::get('settings', 'SettingController@view');
    Route::post('settings', 'SettingController@update');
    Route::resource('developer/settings/categories', 'SettingCategoryController');
    Route::resource('users', 'UserController');
    Route::get('users/toggle-boolean/{id}/{action}', 'UserController@toggleBoolean')->name('facilities.users.toggleBoolean');

    Route::resource('social-media', 'SocialController');
    Route::resource('contact-us', 'ContactusController');
    Route::resource('clients', 'ClientController');
    Route::resource('advertising', 'AdvertisingController');
    Route::resource('application-feature', 'AplicationFeatureController');
    Route::resource('application-screen', 'AplicationScreenController');
     Route::resource('who-are', 'WhoAreController');


Route::get('clients/toggle-boolean/{id}/{action}', 'ClientController@toggleBoolean')->name('facilities.users.toggleBoolean');


     Route::get('show-AdvertisingAttachment/{id}', 'AdvertisingController@getAttachment')->name('show-AdvertisingAttachment');
     Route::delete('delete-advertisingAttachment/{id}', 'AdvertisingController@deleteAttachment')->name('delete-advertisingAttachment');
     Route::delete('edit-advertisingAttachment/{id}', 'AdvertisingController@editAttachment')->name('edit-advertisingAttachment');


Route::get('show-applicationFeature/{id}', 'AplicationFeatureController@getAttachment')->name('show-applicationFeature');
Route::delete('delete-applicationFeature/{id}', 'AplicationFeatureController@deleteAttachment')->name('delete-applicationFeature');
Route::delete('edit-applicationFeature/{id}', 'AplicationFeatureController@editAttachment')->name('edit-applicationFeature');

     Route::get('show-who-are/{id}', 'WhoAreController@getAttachment')->name('show-who-are');
     Route::delete('delete-who-are/{id}', 'WhoAreController@deleteAttachment')->name('delete-who-are');
     Route::delete('edit-who-are/{id}', 'WhoAreController@editAttachment')->name('edit-who-are');


Route::get('show-applicationScreen/{id}', 'AplicationScreenController@getAttachment')->name('show-applicationScreen');
Route::delete('delete-applicationScreen/{id}', 'AplicationScreenController@deleteAttachment')->name('delete-applicationScreen');
Route::delete('edit-applicationScreen/{id}', 'AplicationScreenController@editAttachment')->name('edit-applicationScreen');


});
