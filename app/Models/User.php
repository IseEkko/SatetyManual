<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    public $timestamps = true;
    protected $primaryKey = "user_id";
    protected $guarded = [];
    /***
     * 增加用户composer require encore/laravel-admin:1.*
     * @author lizhongzheng <github.com/bixuande>
     * @return null
     */
    public static function addUser($data)
    {
        try {
            $goods = User::create([
                'openid' => $data['openid'],
                'name' => $data['name']
            ]);
            return $goods;
        } catch (\Exception $e) {
            logError('添加用户失败', [$e->getMessage()]);
            return null;
        }
    }
    /***
     * 根据用户openid查询user_id
     */

public static function selectuserid($openid){
    try {
        $goods = User::where('openid',$openid)
            ->select('user_id')->get();
        return $goods;
    } catch (\Exception $e) {
        logError('查询失败', [$e->getMessage()]);
        return null;
    }
}
}
