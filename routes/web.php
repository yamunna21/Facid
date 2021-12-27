<?php

use Illuminate\Support\Facades\Route;

// Home Page Routes
Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'DashBoardController@index');

Route::get('/home', 'HomeController@index');

Auth::routes();


// SuperAdmin Routes
Route::group(['middleware' => ['auth', 'sadmin']], function () {
    Route::get('/user-profile', 'ProfileController@index')->name('profile');
    Route::post('/user-profile', 'ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', 'ProfileController@profilePic')->name('profile.pic');
    Route::resource('doctor', 'DoctorController');
    Route::resource('/department', 'DepartmentController');
});
// Institution Director Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/user-profile', 'ProfileController@index')->name('profile');
    Route::post('/user-profile', 'ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', 'ProfileController@profilePic')->name('profile.pic');
    Route::resource('community', 'CommunityController');
    Route::post('community-store', 'CommunityController@store')->name('community');
 });
