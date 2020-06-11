<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model{
    //指定表名
    protected $table = "student";
    //指定主键
    protected $primaryKey = "id";
    const UPDATED_AT = null;
    const CREATED_AT = 'time';
}

?>