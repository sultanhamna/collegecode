<?php

use Illuminate\Support\Facades\Route;
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

// ............customer Auth Route................
Route::group(['prefix' => 'customer','namespace' => 'App\Http\Controllers\Customer\Auth'], function () {
    Route::get('customerregister', 'RegisterController@showregistrationform')->name('customer.register');
    Route::post('customerregister', 'RegisterController@register')->name('customer.submit.register');
    Route::get('customerlogin', 'LoginController@showloginform')->name('customer.login');
    Route::post('customerlogin', 'LoginController@login')->name('customer.submit.login');
    Route::post('customerlogout', 'LoginController@logout')->name('customer.logout');
});
// ............customer Dashboard...............
Route::group(['prefix' => 'customer', 'namespace' => 'App\Http\Controllers\Customer', 'middleware' => 'auth:customer'], function () {
    Route::get('customerdashbord', 'CustomerDashbordController@dashbord')->name('customer.dashbord');
});