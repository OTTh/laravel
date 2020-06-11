<?php
namespace app\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\MemberModel;
class Member extends BaseController{
    public function index(){
        $info = MemberModel::getMember();
        return view('member/index',['info'=>$info]);
        /*return view('member/index',[
            'name'=>'刘调',
            'sex'=>'男'
        ]);*/
    }

    public function info(){
        return 'member-info';
    }

    public function center(){
        return route('membercenter');
    }
}
?>