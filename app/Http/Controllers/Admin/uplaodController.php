<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\uploadarRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class uplaodController extends Controller
{
   /***
    * 文章上传
    */
public static function upload(uploadarRequest $request){
    $url = upload($request['image_url']);
    $data = Article::upload($request,$url);
    return $data?
        json_success('文章上传成功！' , null, '200') :
        json_fail('文章上传失败！' , null, '100');
}
}
