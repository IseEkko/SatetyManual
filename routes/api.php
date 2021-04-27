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
Route::prefix('user')->namespace('User')->group(function () {

    Route::post('login', 'UserLoginController@getInfo'); //获取用户信息
    Route::post('adduser', 'UserLoginController@addUser'); //增加用户
    Route::post('uploadhelp', 'HelpController@lzz_uploadhelp'); //上传大病求助
    Route::post('showinfo', 'HelpController@lzz_showhelp'); //展示大病求助详情
    Route::post('showall', 'HelpController@lzz_showall'); //展示全部大病求助
    Route::post('uploadmiss', 'MissController@uploadMiss'); //上传走失儿童求助
    Route::post('showmissall', 'MissController@showallMiss'); //展示全部走失儿童
    Route::post('showmissinfo', 'MissController@showinfoMiss'); //展示走失儿童详情
    Route::post('uploaduseratical', 'UserAticalController@uploadUserAtical'); //用户文章上传
    Route::post('selectuseratical', 'UserAticalController@showUserall'); //用户自己文章查询全部
    Route::post('showuseraticalinfo', 'UserAticalController@showUserAticalInfo'); //用户文章查询详情
    Route::post('showuseratall', 'UserAticalController@showUserAtAll'); //用户所有文章查询
});//--lzz
Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::post('login', 'AdminLoginController@login'); //管理员登陆
    Route::post('logout', 'AdminLoginController@logout'); //管理员退出登陆
    Route::post('registered', 'AdminLoginController@registered'); //管理员注册
    Route::post('upload', 'uplaodController@upload'); //管理员上传文章
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
