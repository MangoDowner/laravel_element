<?php
/**
 * 大事记标签Controller
 * Created by PhpStorm.
 * User: LiMeng
 * Date: 2017/11/6
 * Time: 10:08
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{


    /**
     * 获取列表
     * @param Request $request
     * @return mixed
     */
    function getList(Request $request) {
        $url = "http://albumneibu.haiziwang.com/admin/v1/tags/lists";
        $result = json_decode(file_get_contents($url), true);
        return $result;
    }
}