<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('user')->group(function () {

    Route::post('login', 'UserLoginController@getInfo'); //获取用户信息
    Route::post('adduser', 'UserLoginController@addUser'); //增加用户

});//--lzz
Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::post('login', 'AdminLoginController@login'); //管理员登陆
    Route::post('logout', 'AdminLoginController@logout'); //管理员退出登陆
    Route::post('registered', 'AdminLoginController@registered'); //管理员注册

});//--lzz

