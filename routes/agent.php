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

// ............agent Auth Route................
Route::group(['prefix' => 'agent','namespace' => 'App\Http\Controllers\Agent\Auth'], function () {
    Route::get('agentregister', 'RegisterController@showregistrationform')->name('agent.register');
    Route::post('agentregister', 'RegisterController@register')->name('agent.submit.register');
    Route::get('agentlogin', 'LoginController@showloginform')->name('agent.login');
    Route::post('agentlogin', 'LoginController@login')->name('agent.submit.login');
    Route::post('agentlogout', 'LoginController@logout')->name('agent.logout');
});
// ............agent Dashboard...............
Route::group(['prefix' => 'agent', 'namespace' => 'App\Http\Controllers\Agent', 'middleware' => 'auth:agent'], function () {
    Route::get('agentdashbord', 'AgentDashbordController@dashbord')->name('agent.dashbord');
});