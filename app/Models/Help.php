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

    /***
     * @param $request
     * @param $url
     * @return null
     * 上传大病求助
     */
    public static function upload($request,$url,$user){
        try {
           $data = Help::create([
                'user_id' => $user,
               'name' => $request['name'],
               'identity' => $request['identity'],
               'sex' => $request['nation'],
               'nation' =>$request['nation'],
               'image_url' => $url,
               'address' =>$request['address'],
               'explain' =>$request['explain'],
               'tittle' =>$request['tittle'],
               'number'=>$request['number']
            ]);
            return $data;
        }catch (\Exception $err){
            logError('大病求助上传信息失败！', [$err->getMessage()]);

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

    /***
     * @param $requset
     * @return null
     * 大病求助通过状态查询
     */
    public static function selectpass($requset){
        try {
            $data = Help::where('openid',$requset['openid'])
                ->where('tittle',$requset['tittle'])
            ->select('pass')->get();
            return $data;
        }catch (\Exception $err){
            logError('通过查询失败！', [$err->getMessage()]);
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
    /***
     * 大病求助展示全部
     */
  public static function selecthelp(){
      try {
          $data = Help::where('pass',4)
              ->select()->get();
          return $data;
      }catch (\Exception $err){
          logError('通过查询失败！', [$err->getMessage()]);
          return null;
      }
  }
    /***
     * 大病求助展示详情
     */
    public static function selectall($request){
        try {
            $data = Help::where('user_id',$request['user_id'])
                ->where('tittle',$request['tittle'])
                ->select()->get();
            return $data;
        }catch (\Exception $err){
            logError('通过查询失败！', [$err->getMessage()]);
            return null;
        }
    }

}
