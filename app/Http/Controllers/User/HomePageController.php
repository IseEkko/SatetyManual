<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function search(Request $request)
    {
       $data =  Article::cwp_search($request['tittle']);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function searchOne(Request $request)
    {
        $data =  Article::cwp_searchOne($request['article_id']);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function carousel()
    {
        $data =  Article::cwp_carousel();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

    public function show(Request $request)
    {
        $data =  Article::cwp_show($request['type']);
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }
}
