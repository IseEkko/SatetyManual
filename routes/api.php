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


Route::prefix('user')->namespace('User')->group(function () {

    Route::get('search', 'HomePageController@search'); //首页搜索框
    Route::get('searchone', 'HomePageController@searchOne'); //查看某一篇文章
    Route::get('carousel', 'HomePageController@carousel'); //首页轮播图
    Route::get('show', 'HomePageController@show'); //首页分类的那些文章

    Route::get('articleshow', 'MyCenterController@articleShow'); //我的文章进度查看
    Route::get('articledetail', 'MyCenterController@articleDetail'); //我的文章详情
    Route::post('articledelete', 'MyCenterController@articleDelete'); //我的文章进度删除
    Route::get('helpshow', 'MyCenterController@helpShow'); //我的求助进度查看
    Route::get('helpdetail', 'MyCenterController@helpDetail'); //我的求助详情
    Route::post('helpdelete', 'MyCenterController@helpDelete'); //我的求助进度删除
    Route::get('missingshow', 'MyCenterController@missingShow'); //我的丢失进度查看
    Route::get('missingdetail', 'MyCenterController@missingDetail'); //我的丢失详情
    Route::post('missingdelete', 'MyCenterController@missingDelete'); //我的丢失进度删除

});//--cwp
