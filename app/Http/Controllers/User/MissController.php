<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\uploadMissRequest;
use App\Models\Missing;
use App\Models\User;
use Illuminate\Http\Request;

class MissController extends Controller
{
    /***
     * 走失儿童上传
     */
 public static function uploadMiss(uploadMissRequest $uploadMissRequest){
     $url = upload($uploadMissRequest['image_url']);
     $userid = User::selectuserid($uploadMissRequest['openid']);
     $user = $userid[0]->user_id;
     $uploadMiss = Missing::upload($uploadMissRequest,$url,$user);
     return $uploadMiss?
         json_success('走失儿童上传成功！' , null, '200') :
         json_fail('走失儿童上传失败！' , null, '100');
 }

    /**
     * 展示全部的走失儿童
     */
  public static function showallMiss(Request $request){
      $showMissAll = Missing::showallMiss($request);
      return $showMissAll?
          json_success('走失儿童展示全部成功！' , $showMissAll, '200') :
          json_fail('走失儿童展示全部失败！' , null, '100');
  }
    /**
     * 展示走失儿童详情
     */
    public static function showinfoMiss(Request $request){
        $showMissAll = Missing::showinfoMiss($request);
        return $showMissAll?
            json_success('走失儿童详情展示成功！' , $showMissAll, '200') :
            json_fail('走失儿童详情展示失败！' , null, '100');
    }
}
