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
//Ajax 
Route::get('fetchlga', 'LocalsController@fetchlocal'); //fetch lga
Route::get('validateuser', 'UsersRecordController@loginuser'); //validate user
Route::get('fetchcourts', 'BindCourtsController@fetchcourt'); //fetch bounded courts by lga
Route::resource('tfee', 'TransactionFeeController'); //fetch transaction fee
Route::get('updatetf', 'TransactionFeeController@updatetrfx'); //fetch transaction fee
Route::get('ajaxbindcourtlga','BindCourtsController@store');

Route::resource('users','UsersRecordController');
Route::get('clients','UsersRecordController@fetchclients');
Route::get('userprofile','UsersRecordController@showprofile');
Route::get('submituser','UsersRecordController@store');
Route::get('bindlgacourt','BindCourtsController@create');
Route::get('usercreate','UsersRecordController@create');

//createuser

Route::get('admin', function () {
    return view('dashboards.admin');
});
Route::get('user', function () {
    return view('dashboards.user');
});
Route::get('userDashboard', function () {
    return view('dashboards.udashboard');
});

Route::get('adminDashboard', function () {
    return view('dashboards.adashboard');
});

Route::get('status','CourtsController@status');

Route::resource('courts','CourtsController');
Route::resource('bindcourts','BindCourtsController');
//Load the view
Route::resource('roles','UserDutyController');
