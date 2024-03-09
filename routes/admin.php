<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\Auth\LoginController;
//use App\Http\Controllers\Admin\Auth\RegisterController;
use app\Http\Controllers;

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

// ............Admin Auth Route................
Route::group(['prefix' => 'admin','namespace' => 'App\Http\Controllers\Admin\Auth'], function () {
    Route::get('adminregister', 'RegisterController@showregistrationform')->name('admin.register');
    Route::post('adminregister', 'RegisterController@register')->name('admin.submit.register');
    Route::get('adminlogin', 'LoginController@showloginform')->name('admin.login');
    Route::post('adminlogin', 'LoginController@login')->name('admin.submit.login');
    Route::post('adminlogout', 'LoginController@logout')->name('admin.logout');
});
// ............Admin Dashboard...............
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('admindashbord', 'AdminDashbordController@dashbord')->name('admin.dashbord');
});