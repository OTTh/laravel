<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel - @yield('title','Index')</title>
        <style>
            .header{
                width:100%;
                height: 150px;
                margin:0 auto;
                background: #f5f5f5;
                border:1px solid #ddd;
            }
            .main{
                width:100%;
                height: 450px;
                margin:0 auto;
                margin-top:12px;
                clear:both;
            }
            .main .sidebar{
                float:left;
                width:15%;
                height: inherit;
                background: #f5f5f5;
                border: 1px solid #ddd;
            }
            .main .content{
                float:right;
                width:80%;
                height: inherit;
                background: #f5f5f5;
                border: 1px solid #ddd;
            }
            .main .sidebar{
                float:left;
                width:15%;
                height: inherit;
                background: #f5f5f5;
                border: 1px solid #ddd;
            }
            .footer{
                width:100%;
                height: 150px;
                margin:0 auto;
                margin-top:12px;
                background: #f5f5f5;
                border:1px solid #ddd;
            }
        </style>
    </head>
    <body>
        <div class="header">
            @section('header')
            头部
            @show
        </div>
        <div class="main">
            <div class="sidebar">
                @section('sidebar')
                侧边栏
                @show
            </div>
            <div class="content">
                @yield('content','主内容区域')
            </div>
        </div>
        <div class="footer">
            @section('footer')
            底部
            @show
        </div>
    </body>
</html>