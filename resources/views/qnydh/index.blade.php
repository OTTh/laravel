<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>批量生成系统</title>
    <link rel="stylesheet" href="/css/weui/style/weui.css" />
    <style>
        body {
            background: #f9f9f9;
        }
        
        .weui-cells {
            margin: 0 auto;
        }
        
        .weui-select {
            padding: 0;
            height: 1.47058824em;
            line-height: 1.47058824em
        }
        
        .container {
            width: 100%;
            margin: 0 auto;
            margin-top: 60px;
        }
        
        .logo {
            text-align: center;
            width: 100%;
            margin: 28px 0 auto;
        }
        
        .logo img {
            width: 110px;
        }
        
        .title {
            width: 100%;
            margin: 0px auto;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 20px;
            font-size: 16px;
            color: #555;
            font-weight: bold;
        }
        
        .weui-label {
            text-align: center;
        }
        
        .footer {
            width: 100%;
            text-align: center;
            height: 50px;
            line-height: 50px;
            background: #f9f9f9;
            color: #aaa;
            font-size: 14px;
        }
        
        #container {
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="logo">
            <img src="/images/logo.png" />
        </div>
        <p style="margin:10px auto;color:#1AAD19;width:92%;height:28px;line-height: 28px;font-size:14px;">只能上传Excel表格且第一行必须为字段名，否则第一条数据无法生成</p>
    </div>
    <form id="form" enctype="multipart/form-data" action="{{ url('qnydh/importexcel') }}" method="POST">
        @csrf
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">上传文件</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="file" type="file" />
                </div>
                <div class="weui-cell__ft" style="display: none">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
            <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">生成并下载</a>
        </div>
    </form>
    <div id="loadingToast" style="display:none;">
        <div class="weui-mask_transparent"></div>
        <div class="weui-toast">
            <i class="weui-loading weui-icon_toast"></i>
            <p class="weui-toast__content"></p>
        </div>
    </div>
    <script src="/css/weui/js/weui.min.js"></script>
    <script src="/css/weui/js/jweixin-1.0.0.js"></script>
    <script src="/css/weui/js/zepto.min.js"></script>
    <div class="footer">©新东方南昌学校 版权所有</div>
    <script>
        $(".weui-btn_primary").click(function() {
            $("#form").submit();
        });
    </script>
</body>

</html>