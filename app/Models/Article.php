<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];

    public static function cwp_search($param)
    {
        try {
            $data = self::where('tittle','like','%'.$param.'%')
                ->select('article_id','tittle')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_searchOne($param)
    {
        try {
            $data = self::where('article_id',$param)->select('tittle','image_url','content')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_carousel()
    {
        try {
            $data = self::select('article_id','image_url')->take(4)->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_show($param)
    {
        try {
            $data = self::where('type',$param)->select('tittle','image_url','content')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }
}
