<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\uploadUserAticalRequest;
use App\Models\User;
use App\Models\UserArtical;
use Illuminate\Http\Request;

class UserAticalController extends Controller
{
    /***
     * 用户文章上传
     *
     */
   public static function uploadUserAtical(uploadUserAticalRequest $request){
       $url = upload($request['image_url']);
       $userid = User::selectuserid($request['openid']);
       $user = $userid[0]->user_id;
       $showMissAll = UserArtical::upload($request,$user,$url);
       return $showMissAll?
           json_success('用户文章上传成功！' , null, '200') :
           json_fail('用户文章上传失败！' , null, '100');
   }
   /***
    * 展示用户自己全部文章
    */
public static function showUserall(Request $request){
    $userid = User::selectuserid($request['openid']);
    $user = $userid[0]->user_id;
    $pass = UserArtical::selectpass($request,$user);
    return $pass?
        json_success('查询用户自己全部文章成功！' , $pass, '200') :
        json_fail('查询用户自己全部文章失败！' , null, '100');
}
    /***
     * 展示用户文章详情
     */
    public static function showUserAticalInfo(Request $request){

        $pass = UserArtical::selectuserinfo($request);
        return $pass?
            json_success('查询用户文章详情成功！' , $pass, '200') :
            json_fail('查询用户文章详情失败！' , null, '100');
    }
    /***
     * 展示全部用户文章
     */
    public static function showUserAtAll(){
        $pass = UserArtical::showUserAtAll();
        return $pass?
            json_success('查询用户全部文章成功！' , $pass, '200') :
            json_fail('查询用户全部文章失败！' , null, '100');
    }

}
