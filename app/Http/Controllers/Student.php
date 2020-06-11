<?php
namespace app\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
class Student extends BaseController{
    public function index(){
        var_dump(Redis::info());
        Redis::set('name','liudiao');
        Redis::mset(['name'=>'liudiao','sex'=>'男','age'=>18]);
        echo Redis::get('name');
        ///echo Redis::get('name');
        //var_dump(Redis::get('info'));die();
        //$students = StudentModel::all();
        //$students = StudentModel::get();
        //$students  = StudentModel::where('age','>=',18)->orderBy("age",'desc')->first();
        //$students = StudentModel::findOrFail(2);
        /*$student = new StudentModel();
        $student->name="测试";
        $student->sex="男";
        $student->age=18;
        $student->school="测试学校";
        $student->grade="测试年级";
        $res = $student->save();
        //$students = $student->all();
        //$res = $student->firstOrCreate(['name'=>'刘调']);
        dd($res);*/
        
    }

    public function section(){
        $students = StudentModel::get();
        return view('student.section',['students'=>$students]);
    }

    public function urlTest(){
        return 'urlTest';
    }

    public function request1(Request $request){
        //取值
        if($request->has('name')){
            echo $name = $request->input("name",null);
        }else{
            echo "无该参数";
        }

        $con = $request->all();
        var_dump($con);

        //判断请求类型
        //echo $request->method();

        if($request->isMethod('POST')){
            echo $request->method();
        }else{
            echo '非法请求';
        }

        echo $request->url();
        $res = $request->ajax();
        var_dump($res);

        if($request->is('student/*')){
            echo $request->method();
        }else{
            echo $request->url();
        }
    } 

    public function session1(Request $request){
        $request->session()->put('name','liudiao');
        session()->put("sex",'男');
        Session::put('age',18);
        Session::put(['school'=>'测试学校','grade'=>'测试年级']);
    }

    public function session2(Request $request){
        //echo $request->session()->get('name');
        echo session()->get('sex');
        echo Session::get('age');
        echo Session::get('school');
        echo Session::pull('grade');//取出后删除
        echo Session::get('grade');
        
        
        Session::forget('name');
        if(Session::has('name')){
            echo Session::get('name');
        }else{
            $session = Session::all();//取出所有session值
            dd($session);
        }
        Session::flush();
    }

    public function response1(Request $request){
        $msg = Session::get('msg');
        $data = ['code'=>200,'msg'=>$msg];
        return response()->json($data);
    }

    public function redirect1(){
        return redirect('student/response1')->with('msg','刘志真是SB');
        return redirect()->route('student/response1');//路由跳转
        return redirect()->back();//返回上一级
    }
 
}

?>