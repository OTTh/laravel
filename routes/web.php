<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'qnydh'],function(){
    Route::get('index',['uses'=>'QnydhController@index']);
    Route::post('importexcel',['uses'=>'QnydhController@importExcel']);
});

Route::group(['prefix'=>'member'],function(){
    Route::get('index','Member@index');
    Route::get('info','Member@info');
    Route::get('center',['uses'=>'Member@center','as'=>'membercenter']);
});

Route::group(['prefix'=>'student'],function(){
    Route::get('index','Student@index');
    Route::get('add','Student@add');
    Route::get('edit','Student@edit');
    Route::get('section','Student@section');
    Route::get('url',['as'=>'url','uses'=>'Student@urlTest']);
    Route::any('request1',['uses'=>'Student@request1']);
    Route::group(['middleware'=>['web']],function(){
        Route::any('session1',['uses'=>'Student@session1']);
        Route::any('session2',['uses'=>'Studddent@session2']);
    });
    Route::any('response1',['uses'=>'Student@response1']);
    Route::any('redirect1',['uses'=>'Student@redirect1']);
});


//多请求路由
Route::match(['get','post'],'multi1',function(){//指定请求方式
    return 'multi1';
});

Route::any('multi1',function(){//允许所有请求方式
    return 'multi2';
});

//路由参数
Route::get('id/{id}',function($id){
    return 'id:'.$id;
});

Route::get('name/{name?}',function($name='ld'){
    return 'name:'.$name;
});

Route::get('user/{id}/{name?}',function($id,$name='ld'){
    return 'user-id:'.$id." user-name:".$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//路由别名
Route::get('user/center',['as'=>'center',function(){
    return route('center');
}]);

//路由群组
Route::group(['prefix'=>'member'],function(){
    Route::get('user/center',['as'=>'center',function(){
        return route('center');
        //return 'member-center';
    }]);
    Route::get('user/{id}/{name?}',function($id,$name='ld'){
        return 'user-id:'.$id." user-name:".$name;
    })->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
});

//路由输出视图
Route::get('view',function(){
    return view('ld');
});
