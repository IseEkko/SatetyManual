<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    protected $table = "missing_persons";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    /***
     * @param $request
     * @param $url
     * @return null
     * 儿童走失上传
     */
    public static function upload($request,$url,$user){
        try {
            $data = Missing::create([
                'user_id' => $user,
                'name' => $request['name'],
                'address' =>$request['address'],
                'date' => $request['date'],
                'sex' => $request['sex'],
                'age' =>$request['age'],
                'image_url' => $url,
                'height' =>$request['height'],
                'feature' =>$request['feature'],
                'process'=>$request['process'],
                'postscript'=>$request['postscript'],
                'tele' =>$request['tele']
            ]);
            return $data;
        }catch (\Exception $err){
            logError('走失儿童上传信息失败！', [$err->getMessage()]);
            return null;
        }
    }

    /***
     * 展示全部的走失儿童
     */
public static function showallMiss($request){
    try {
        $data = Missing::where('pass',4)
            ->select()->get();
        return $data;
    }catch (\Exception $err){
        logError('走失儿童信息查询失败！', [$err->getMessage()]);
        return null;
    }
}

    /***
     * @param $request
     * @return null
     * 展示走失儿童详情
     */
public static function showinfoMiss($request){
    try {
        $data = Missing::where('user_id',$request['user_id'])
            ->where('name',$request['name'])
            ->select()->get();
        return $data;
    }catch (\Exception $err){
        logError('展示走失儿童详情查询失败！', [$err->getMessage()]);
        return null;
    }
}
}
