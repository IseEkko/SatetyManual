<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = "help";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function cwp_helpShow($param)
    {
        try {
            $data = self::where('user_id',$param)->select('id','tittle','image_url','explain','pass')->get();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败', [$e->getMessage()]);
            return null;
        }
    }


    public static function cwp_helpDetail($param)
    {
        try {
            $data = self::where('id',$param)->select('id','name','identity','sex','nation','image_url','address','explain','tittle','number')->get();
            return $data;
        } catch (\Exception $e) {
            logError('失败', [$e->getMessage()]);
            return null;
        }
    }

    public static function cwp_helpDelete($param)
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
