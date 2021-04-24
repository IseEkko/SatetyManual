<?php
if (!function_exists('upload')) {
    /***
     *传入图片返回路径
     * @param $email $ce
     * @return int
     */
    function upload($pic)
    {

        $path = $pic->store('public');
        $res = str_replace('public/', 'storage/', $path);

        return "http://127.0.0.1:8000/$res";
    }
}
