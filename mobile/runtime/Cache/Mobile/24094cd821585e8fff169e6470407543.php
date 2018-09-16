<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head >
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <title >
        <?php echo C('BRAND_NAME');?>
    </title >
    <script type="text/javascript" src="/public/wap/js/jquery-1.8.2.min.js" ></script >
    <script type="text/javascript" src="/public/wap/js/jweixin-1.0.0.js" ></script >
    <meta name="viewport" content="width=320, user-scalable=no" >
    <script >
        function doLocation(url) {
            var uaa = navigator.userAgent.toLowerCase();
            if (uaa.indexOf('micromessenger') > 0) {
                $("#zhezhao").show();
                $("#zhezhao").click(function () {
                    $("#zhezhao").hide();
                })
            }
            var a = document.createElement("a");

            if (! a.click) {
                window.location = url;
                return;
            }
            a.setAttribute("href", url);
            a.style.display = "none";
            document.body.appendChild(a);
            a.click();
        }
        function dlll() {
            var url = '<?php echo ($gameinfo[yiosurl]); ?>';
            doLocation(url);
        }
    </script >
    <style type="text/css" >
        body {
            font-family: microsoft yahei;
            margin: 0
        }

        p, h1, h2 {
            margin: 0;
            padding: 0
        }

        ul, li {
            list-style: none;
            padding: 0;
            margin: 0
        }

        a {
            text-decoration: none
        }

        .banner {
            width: 320px;
            margin: 0 auto;
            text-align: center;
            color: #fff;
            font-size: 20px;
            background-color:#5c87af;
        }

        .cont {
            width: 320px;
            margin: 5px auto
        }

        .app_info {
            width: 300px;
            height: 80px;
            padding: 0px 10px
        }

        .app_icon {
            width: 50px;
            height: 50px;
            float: left
        }

        .app_icon img {
            width: 50px;
            height: 50px;
        }

        .a_info {
            width: 140px;
            height: 60px;
            float: left;
            margin-left: 10px;
        }

        .a_download a {
            display: block;
            width: 60px;
            background-color: #2EB1AA;
            color: #FFFFFF;
            font-size: 11px;
            line-height: 26px;
            text-align: center;
            border-radius: 16px;
            margin-top: 10px;
            padding: 1px 1px 0px 0px
        }

        .warning {
            float: left;
            font-size: 11px;
            color: red
        }

        .intro {
            float: left;
        }

        .intro p {
            font-size: 11px;
            color: #666666
        }

        .app_title {
            width: 200px;
            height: 25px;
            line-height: 25px;
            font-size: 16px;
            color: #000000;
            overflow: hidden
        }

        .app_size {
            width: 220px;
            height: 25px;
            line-height: 25px;
            color: #666666
        }

        .app_size b {
            color: #FFFFFF;
            background-color: #0CC5B4;
            font-weight: normal;
            font-size: 11px;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .app_size span {
            color: #666666;
            font-size: 11px;
        }

        .jietu {
            width: 302px;
            padding: 9px 9px 74px 9px;
            border-top: #CCCCCC solid 0.8px
        }

        .jietu_box {
            width: 302px;
        }

        .jietu_box ul {
            width: 100%;
        }

        .jietu_box ul li {
            width: 240px;
            vertical-align: middle;
            text-align: center;
            margin: 0 5px;
            float: left;
            display: block;
            overflow: hidden;
        }

        .jietu_box ul li:first-child {
            margin-left: 0px
        }

        .jietu_box ul li div {
            width: 240px;
            vertical-align: middle;
        }

        .jietu_box img {
            vertical-align: middle;
            width: 240px;
        }
        .foot a {
            float: right;
            margin-right: 10px;
            padding: 0px 10px;
            margin-top: 10px;
            display: block;
            text-align: center;
            line-height: 22px;
            border-radius: 3px;
            background-color: #0CC5B4;
            color: #FFFFFF;
            font-size: 12px
        }

        .foot li {
            float: left;
            font-size: 12px;
            color: #FFFFFF;
            line-height: 17px;
            width: 170px;
            padding-top: 4px;
            margin-left: 0px;
        }

        .anniu {
            width: 200px;
            height: 40px;
            margin: 0 auto;
            background: #FA903E;
            border-radius: 4px;
        }

        .anniu1 {
            width: 200px;
            height: 40px;
            margin: 0 auto;
            border-radius: 4px;
            background: #F8F8F8;
            border: #FD862A dashed 1px
        }

        .anniu a, .anniu1 a {
            display: block;
            line-height: 38px;
            text-align: center;
            color: #FFFFFF;
            font-size: 16px
        }

        .complete {
            width: 100px;
            height: 36px;
            background: url("/public/wap/images/arrow.png") no-repeat;
            background-size: 22%;
            margin: 0 auto;
            padding-left: 40px
        }

        .complete h2 {
            line-height: 35px;
            color: #333333;
            font-weight: normal
        }

        .bottom {
            width: 320px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.8);
            position: fixed;
            bottom: 0px;
            padding: 10px 0px
        }

    </style >
    <script src="/public/wap/js/iscroll_lite.js" ></script >

    <script type="text/javascript" >
        function GetRequestValue(strParame) {
            var args  = new Object();
            var query = location.search.substring(1);

            var pairs = query.split("&");
            for (var i = 0; i < pairs.length; i ++) {
                var pos = pairs[i].indexOf('=');
                if (pos == - 1) continue;
                var argname   = pairs[i].substring(0, pos);
                var value     = pairs[i].substring(pos + 1);
                args[argname] = value;
            }
            return args[strParame];
        }
        var c  = GetRequestValue("c");
        var t  = GetRequestValue("t");
        var sw = GetRequestValue("sw");
        var ua = navigator.userAgent.toLowerCase();

    </script >
</head >
<body onload="javascript:dlll()" >
<div style="display:none;display: none;width: 100%; height: 100%;background:rgba(0,0,0,.8); position: fixed; left: 0; top: 0;z-index:10000"
     id="zhezhao" >
    <img src='/public/wap/images/wx.png' style='width:100%' />
</div >

<?php if(!empty($accode)): ?><div class="banner">
        <div style="padding:10px 0;" >
            您的邀请码为： <span style="font-size:24px; color:#d6ff00"><?php echo ($accode); ?></span>
        </div >
    </div ><?php endif; ?>

<div class="main" style="width:320px;margin:0 auto" >

    <!-- <div class="banner" ></div >-->
    <div class="cont" >
        <div class="app_info" >
            <div class="app_icon" >
                <img src="<?php echo ($gameinfo['mobile_icon']); ?>" />
            </div >
            <div class="a_info" >
                <div class="app_title" >
                    <div class="app_name" ><?php echo ($game['name']); ?></div >

                </div >
                <div class="app_size" ><b >版本：<?php echo ($gameversion["version"]); ?></b > | <span >大小:<?php echo ($gameinfo["size"]); ?></span ></div >
            </div >
            <div style="clear:both" ></div >
            <div class="warning" >若无法安装，请删除旧版本，再重试</div >
            <br >
            <div class="intro" ><p >游戏简介：<?php echo ($gameinfo["description"]); ?></p >
            </div >

        </div >
        <div style="clear:both" ></div >

    </div >
    <div class="jietu clearfix" >
        <!--<h3>截图</h3>-->
        <div class="ui-horscroll1_e jietu_box clearfix" >
            <div class="ui-horscroll-wrap_e" id="wrapper_e" style="overflow: hidden;" >
                <div id="scroller_e" class="ui-horscroll-box js_auto_w"
                     style="width: 1024px; -webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate3d(-1024px, 0px, 0px) scale(1);" >
                    <ul id="thelist_e" class="ui-horscroll-list1 ms-cf" >
                        <?php if(is_array($images)): $i = 0; $__LIST__ = $images;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li >
                                <div class='img' ><img src="<?php echo ($vo["url"]); ?>" width="300" /></div >
                            </li ><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul >
                </div >
                <div id="postipper_e" class="hscrollTip" style="display: block;" >
                    <div style="margin-left: 248px;" ></div >
                </div >
            </div >
        </div >
    </div >


    </div >
    <div class="bottom" id="bottom" >
        <div class="anniu" ><a href="javascript:dlll()" >安装游戏</a ></div >
        <div class="complete" ><h2 style="font-size:16px" >安装完成后</h2 ></div >
        <div class="anniu1" id="xinren" ><a href="javascript:xinren()"
                                            style="color:#333333" >信任证书</a ></div >
    </div >
</div >
<script type="text/javascript" >

    var libiao      = document.getElementById("thelist_e");
    var zcd         = document.getElementById("scroller_e");
    var ss_w        = 250 * libiao.children.length;
    zcd.style.width = ss_w + "px";

    var myScroll;
    var myScroll_e;
    function loaded() {
        myScroll_e = new iScroll('wrapper_e', {
            hScroll : true,
            vScroll : false,
            pullLock: true,
            needTip : true
        });

    }
    window.addEventListener("DOMContentLoaded", loaded, false);

    function xinren() {
        var url = "<?php echo DOWNIP;?>/embedded.mobileprovision";
        doLocation(url);
        setTimeout('trustlocate()', 1000);
        /* window.location.href = "<?php echo U('Game/trust');?>"; */
    }
    function trustlocate() {
        window.location.href = "<?php echo U('Game/trust');?>";
    }

    function onSuccess() {
        var isSuccess = 1;
    }
    function onFail() {
        window.location.href = "<?php echo WEBSITE;?>"
    }
</script >

</body >
</html >