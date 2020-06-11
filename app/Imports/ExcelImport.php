<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Intervention\Image\Facades\Image;

class ExcelImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        unset($rows[0]);
        set_time_limit(0);
        $this->createData($rows);
        //return $rows;
    }

    public function createData($rows){
        set_time_limit(0);
        $src = "images/qnydh.png";
        $path = "storage/qnydh/";
        foreach($rows as $k=>$v){
            $img = Image::make($src);
            $img->text($v[2], 610, 218, function($font) {
                $font->file('D:/phpstudy/WWW/laravel/public/ttf/lth.ttf');
                $font->size(58);
                $font->color('#000');
                $font->align('left');
                $font->valign('bottom');
                $font->angle(0);
            });
            $len = mb_strlen($v[0]);
            $x = 615+(364/2)-30*$len;
            $img->text($v[0], $x, 1424, function($font) {
                $font->file('D:/phpstudy/WWW/laravel/public/ttf/lth.ttf');
                $font->size(66);
                $font->color('#000');
                $font->align('left');
                $font->valign('bottom');
                $font->angle(0);
            });
            $img->text('五', 1792, 1570, function($font) {
                $font->file('D:/phpstudy/WWW/laravel/public/ttf/lth.ttf');
                $font->size(66);
                $font->color('#000');
                $font->align('left');
                $font->valign('bottom');
                $font->angle(0);
            });
            $img->save($path.$v[2].".png");
            $img->destroy();
            //ImagePng($image, $filename);	
            //显示在浏览器------------------------------------
            /*header('Content-type: image/png');
            ImagePng($image);
            imagedestroy($image);*/
            //---------------------------------------------
            //下载-------------------------------------
            /*保存在web服器--------------------------*/
        }
    }
}