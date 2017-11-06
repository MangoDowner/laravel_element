<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('example', function () { return view('example.index'); }); //首页
Route::get('example/getList', ['uses' => 'ExampleController@getList','as'=>'example.getList']); //获取记录列表
