<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserArtical extends Model
{
    protected $table = "user_article";
    public $timestamps = true;
    protected $primaryKey = "article_id";
    protected $guarded = [];

    public static function cwp_articleShow($param)
    {
        try {
            $data = self::where('user_id',$param)->select('article_id','tittle','image_url','content','pass')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_articleDelete($param)
    {
        try {
            $data = self::where('article_id',$param)->delete();
            return $data;
        } catch (\Exception $e) {
            logError('删除失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_articleDetail($param)
    {
        try {
            $data = self::where('article_id',$param)->select('article_id','tittle','image_url','content')->get();
            return $data;
        } catch (\Exception $e) {
            logError('失败', [$e->getMessage()]);
            return null;
        }
    }
}
