<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\Missing;
use App\Models\User;
use App\Models\UserArtical;
use Illuminate\Http\Request;

class MyCenterController extends Controller
{
    public function articleShow(Request $request)
    {
      $param =  User::cwp_search($request['openid']);
      if($param[0]['user_id']){
         $data =  UserArtical::cwp_articleShow($param[0]['user_id']);
          return $data?
              json_success('成功!',$data,200) :
              json_fail('失败!',null,100);
      }
    }

    public function articleDetail(Request $request)
    {
            $data =  UserArtical::cwp_articleDetail($request['article_id']);
            return $data?
                json_success('成功!',$data,200) :
                json_fail('失败!',null,100);
    }


    public function articleDelete(Request $request)
    {
        $data = UserArtical::cwp_articleDelete($request['article_id']);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

    public function helpShow(Request $request)
    {
        $param =  User::cwp_search($request['openid']);

        if($param[0]['user_id']){
            $data =  Help::cwp_helpShow($param[0]['user_id']);
            return $data?
                json_success('成功!',$data,200) :
                json_fail('失败!',null,100);
        }
    }

    public function helpDetail(Request $request)
    {
        $data =  Help::cwp_helpDetail($request['id']);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function helpDelete(Request $request)
    {
        $data = Help::cwp_helpDelete($request['id']);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }


    public function missingShow(Request $request)
    {
        $param =  User::cwp_search($request['openid']);
        if($param[0]['user_id']){
            $data =  Missing::cwp_missingShow($param[0]['user_id']);
            return $data?
                json_success('成功!',$data,200) :
                json_fail('失败!',null,100);
        }
    }


    public function missingDetail(Request $request)
    {
        $data =  Missing::cwp_missingDetail($request['id']);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function missingDelete(Request $request)
    {
        $data = Missing::cwp_missingDelete($request['id']);
        return $data?
            json_success('成功!',null,200) :
            json_fail('失败!',null,100);
    }

}
