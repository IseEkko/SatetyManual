<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];


    public static function upload($request,$url){
        try {
            $data = Article::create([
                'type' => $request['type'],
                'content' => $request['content'],
                'image_url' => $url,
                'tittle' =>$request['tittle']
            ]);
            return $data;
        }catch (\Exception $err){
            logError('文章上传失败！', [$err->getMessage()]);
            return null;
        }
    }
}
