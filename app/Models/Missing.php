<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    protected $table = "missing_persons";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function cwp_missingShow($param)
    {
        try {
            $data = self::where('user_id',$param)->select('id','name','image_url','feature','pass')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_missingDetail($param)
    {
        try {
            $data = self::where('id',$param)->select('id','address','date','name','sex','age','height','feature','process','postscript','image_url','tele')->get();
            return $data;
        } catch (\Exception $e) {
            logError('失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_missingDelete($param)
    {
        try {
            $data = self::where('id',$param)->delete();
            return $data;
        } catch (\Exception $e) {
            logError('删除失败', [$e->getMessage()]);
            return null;
        }
    }
}
