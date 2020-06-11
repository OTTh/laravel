<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class QnydhController extends Controller{
    public function index(){
        return view('qnydh/index');
    }

    public function importExcel(Request $request){
        set_time_limit(0);
        $file = $request->file("file");
        //$path = $request->file('file')->storeAs('public/excel',date("YmdHis").rand(1,1000).".".$file->getClientOriginalExtension());
        $realPath = $file->getRealPath();
        //上传文件的后缀.
        //$entension = $file->getClientOriginalExtension();
        //  获取上传的文件缓存在tmp文件夹下的绝对路径
        //$newpath = $file->getRealPath();
        //$filePath = 'storage/excel/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
        $import = new ExcelImport;
        Excel::import($import,$realPath);
        //$array = Excel::toCollection(new ExcelImport,$realPath);
        //dd($import);
        //var_dump($rows);die();
    }
}
?>