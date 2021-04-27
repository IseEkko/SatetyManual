<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\uploadHelpRequest;
use App\Models\Help;
use App\Models\User;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /***
     * 用于大病上传
     */
   public static function lzz_uploadhelp(uploadHelpRequest $request){
       $url = upload($request['image_url']);
       $userid = User::selectuserid($request['openid']);
       $user = $userid[0]->user_id;
        $uploadhelp = Help::upload($request,$url,$user);
       return $uploadhelp?
           json_success('大病求助成功！' , null, '200') :
           json_fail('大病求助失败！' , null, '100');
   }

    /***
     * 大病求助展示全部
     */
    public static function lzz_showall(Request $request){

        $da = Help::selecthelp();
        return $da?
            json_success('展示大病求助成功！' , $da, '200') :
            json_fail('展示大病求助失败！' , null, '100');
    }
   /***
    * 大病求助展示详情
    */
  public static function lzz_showhelp(Request $request){

    $da = Help::selectall($request);
      return $da?
          json_success('展示大病求助成功！' , $da, '200') :
          json_fail('展示大病求助失败！' , null, '100');
  }


}
