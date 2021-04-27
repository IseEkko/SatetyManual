<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserArtical extends Model
{
    protected $table = "user_article";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];
    /***
     * 用户文章上传
     */
   public static function upload($request,$user,$url){
       try {
           $data = UserArtical::create([
               'user_id' => $user,
               'content' => $request['content'],
               'image_url' => $url,
               'tittle' =>$request['tittle'],
               'type' =>$request['type']
           ]);
           return $data;
       }catch (\Exception $err){
           logError('用户文章上传失败！', [$err->getMessage()]);
           return null;
       }
   }
   /***
    * 查询用户自己文章 pass
    */
   public static function selectpass($request,$user){
       try {
           $data = UserArtical::where('user_id',$user)
               ->where('pass',4)
               ->select()->get();
           return $data;
       }catch (\Exception $err){
           logError('查询自己文章失败！', [$err->getMessage()]);
           return null;
       }
   }
   /***
    * 查询用户自己的文章详情
    */
public static function selectuserinfo($request){
    try {
        $data = UserArtical::where('user_id',$request['user_id'])
            ->where('tittle',$request['tittle'])
            ->select()->get();
        return $data;
    }catch (\Exception $err){
        logError('查询用户文章详情失败！', [$err->getMessage()]);
        return null;
    }
}
/***
 * 查询所有的用户文章
 */
public static function showUserAtAll(){
    try {
        $data = UserArtical::where('pass',4)
            ->select()->get();
        return $data;
    }catch (\Exception $err){
        logError('查询所有的用户文章失败！', [$err->getMessage()]);
        return null;
    }
}
}
