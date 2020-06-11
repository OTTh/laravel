<?php
namespace app\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Student extends BaseController{
    public function index(){
        //$list = Db::select("select name,age,sex,school,grade from ld_student");
        //$list = Db::table("student")->get();
        //$list = Db::table("student")->orderBy('id','desc')->first();
        //$list = Db::table("student")->where('id','>',0)->get();
        //$list = Db::table("student")->whereRaw('id>=? and sex=?',[0,'男'])->get();
        //$list = Db::table("student")->whereRaw('id>=? and sex=?',[0,'男'])->pluck('sex');
        //$list = Db::table("student")->select('id','name','sex')->get();
        // Db::table("student")->orderBy('id','desc')->chunk(1,function($list){
        //     var_dump($list);
        // });
        //$num = Db::table("student")->count();
        //$num = Db::table("student")->max('age');
        //$num = Db::table("student")->min('age');
        //$num = Db::table("student")->avg('age');
        $num = Db::table("student")->sum('age');
        var_dump($num);
    }

    public function add(){
        //$list = Db::insert("insert into ld_student(`name`,`age`,`sex`,`school`,`grade`,`time`) values ('刘调','18','男','社会大学','社会一级','".date('Y-m-d H:i:s')."')");
        //var_dump($list);
    }

    public function edit(){
        //$list = Db::update("update ld_student set age=?,sex=? where id=?",[20,'男',1]);
        //var_dump($list);
    }
}
?>