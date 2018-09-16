<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <title ><?php echo C('BRAND_NAME');?></title >
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" >

    <script src="/public/agent/js/jquery-1.7.2.min.js" ></script >
    <!--<link rel="stylesheet" href="/public/agent/css/css_reset.css"/>-->
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/public/3rd/bootstrap/lumen/bootstrap.min.css" />
    <script src="/public/3rd/bootstrap/js/bootstrap.min.js" ></script >

    <link rel="stylesheet" href="/public/agent/css/common.css" >
    <link rel="stylesheet" href="/public/agent/css/user-new.css" >
    <link rel="stylesheet" href="/public/agent/less/index.css" />

    <script src="/public/agent/js/demo1.js" ></script >
    <script src="/public/agent/js/xhr.js" ></script >

    <style >
        /*html{font-size: 62.5%;font-family: "微软雅黑";}*/
    </style >

    <script src="/public/3rd/layer/layer.js" ></script >
    <script src="/public/huoshu/share.js" ></script >
</head >
<body >

<style >
    #header {
        height: 80px;
        background-color: #FFFFFF;
    }

    #header .main {
        margin-top: 0;
    }

    #header .item {
        display: inline-block;
        vertical-align: middle;
        margin-right: 8px;
        text-align: left;
        cursor: default;
    }

    #header .logo {
        width: 100%;
        height: 63px;
        max-width: 188px;
    }

    #header .line {
        height: 80px;
        width: 1px;
        margin-right: -1px;
    }

    #header .platName {
        font-size: 20px;
        height: 24px;
        line-height: 24px;
        margin-top: 3px;
    }

    #header .platUrl {
        font-size: 16px;
        height: 22px;
        line-height: 22px;
    }

    #header .main {
        width: 1200px;
        margin: 0 auto 0 auto;
    }

    #header .main:after {
        display: table;
        content: " ";
        clear: both;
        width: 0;
        height: 0;
        visibility: hidden;
    }

    #header .header_tabs a {
        text-decoration: none;
        /*color:#333;*/
        /*font-size:14px;*/
    }

    #header .header_tabs a:hover {

    }

    #header .login_links a {
        text-decoration: none;
        color: green;
    }
</style >

<header id="header" >
    <div class="main" >
        <span class="line item" ></span >
        <img src="/public/agent/index2/logo.png" class="logo item" onclick='gotoindex();' style="cursor:pointer;" />
        <div class="item" onclick='gotoindex();' style="cursor:pointer;" >
            <p class="platName" ></p >
            <p class="platUrl" ><?php echo C('SDKSITE');?></p >
        </div >
        <div class="header_tabs" style="float:right;margin-top:30px;" >
            <?php if(!empty($user["user_login"])): ?><span class="label label-success"
                      style="margin-right:20px;" >欢迎您：<?php echo ($user["user_login"]); ?> ( <?php echo ($user["user_nicename"]); ?> )</span >
                <!--(ID：<b><?php echo ($user["id"]); ?></b>)-->
                <!--<li class="center"><b></b><em></em><a href="#">消息</a><span> 25</span><b></b></li>-->
                <a class="btn btn-link" href="<?php echo U('Agent/money/recharge_member');?>" style="margin-right:10px;" >个人中心</a >
                <a class="btn btn-link" href="<?php echo U('Front/Api/logout');?>" style="margin-right:10px;color:red;" >退出登录</a ><?php endif; ?>
            <!--<a class="btn btn-link" href="/agent.php/Front/About/notice" >公告中心</a >-->
        </div >
    </div >
</header >

<script >
    var indexurl = "<?php echo U('Front/Index/index2');?>";
</script >
<script src="/public/agent/js/share.js" ></script >
    <?php switch($user_type): case "agent": ?><style >
    .center_left {
        min-height: 200px;
        /*padding-left:40px;*/
    }

    .top_funcs_div {
        width: 100%;
        background-color: #555555;
        margin-top: 0px;
        margin-bottom: 10px;
    }

    .top_funcs_div .row {
        width: 1200px;
        margin: 0 auto;

    }

    .top_funcs_div > .row > .col-md-2 {
        width: 14.2%;
    }

    .top_funcs_div .row div {
        /*                width:16.6%;
                        float:left;*/
        text-align: center;
        font-size: 16px;
        color: #FFFFFF;
        padding: 10px 0;
        cursor: pointer;
    }

    .top_funcs_div .row div:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row .active_func {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row span {
        margin-left: 5px;
    }

    .center_left button {
        width: 50%;
    }

    .center_left .row {
        text-align: center;
        border-bottom: 1px solid #F1F1F1;
        margin: 0px 0 0px 0px;
    }

    .center_left .row[data-customestyle="no-bottom-border"] {

        border-bottom: none;
    }

    .center_left .row a {
        width: 180px;
        float: left;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-right: 10px;
        font-size: 14px;
    }

    .center_left .row a:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }
</style >

<div class="container top_funcs_div" >
    <div class="row" >
        <div class="col-md-2" >
            <em class="fa fa-newspaper-o normal" ></em ><span >首页</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/4" class="" ><span >新闻公告</span ></a ></div >
                 <!--<div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/5" class="" >点位通知</a ></div >-->
                <!--<div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/6" class="" >游戏公告</a ></div >-->
            </div >
        </div >
        <div class="col-md-2" >
            <em class="fa fa-file normal" ></em ><span >资源管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' data-customestyle="no-bottom-border" style="padding:10px 0;" >
                    <button class="btn btn-warning"
                            onclick="location.href = '<?php echo U('Agent/money/recharge_member');?>'" >充值</button >
                </div >

                <?php
 if(C("G_WITHDRAW_EN")){ ?>
                <div class='row' data-customestyle="no-bottom-border" style="padding:10px 0;" >
                    <button class="btn btn-info" onclick="location.href = '<?php echo U('Agent/settle/index');?>'" >提现</button >
                </div >
                <?php } ?>
                <div class='row' id="Game_apply_game" ><a href="<?php echo U('Agent/Game/apply_game');?>" ><span >申请游戏</span ></a ></div >
                <div class='row' id="Game_mygames" ><a href="<?php echo U('Agent/Game/mygames');?>" >我的游戏</a ></div >
                <div class='row' id="Benefit_set" ><a href="<?php echo U('Agent/Benefit/set');?>" >我的优惠</a ></div >
                <div class='row' id="Benefit_set_sub" ><a href="<?php echo U('Agent/Benefit/set_sub');?>" >子渠道优惠</a ></div >
            </div >
        </div >
		
		<div class="col-md-2" ><em class="fa fa-money normal" ></em ><span ><?php echo C('CURRENCY_NAME');?>管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataAgentForMem_all" ><a
                        href="<?php echo U('Agent/DataAgentForMem/all');?>" ><span >给玩家充值记录</span ></a ></div >
                <div class='row' id="DataPtbAgentForSub_index" ><a
                        href="<?php echo U('Agent/DataPtbAgentForSub/index');?>" >子渠道发币记录</a ></div >
                <div class='row' id="DataPtbAgentChargeRecords_index" ><a
                        href="<?php echo U('Agent/DataPtbAgentChargeRecords/index');?>" ><?php echo C('CURRENCY_NAME');?>入账记录</a ></div >
            </div >
        </div >
        
        <div class="col-md-2" ><em class="fa fa-bar-chart normal" ></em ><span >数据中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataMemAccount_index" ><a
                        href="<?php echo U('Agent/DataMemAccount/index');?>" ><span >玩家帐号明细</span ></a ></div >
                <div class='row' id="DataMemCharge_index" ><a
                        href="<?php echo U('Agent/DataMemCharge/index');?>" >玩家充值明细</a ></div >
                <div class='row' id="DataReport_index" ><a href="<?php echo U('Agent/DataReport/index');?>" >统计报表</a ></div >
            </div >
        </div >
        <div class="col-md-2" ><em class="fa fa-group normal" ></em ><span >渠道管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="Ucenter_subAgent" ><a
                        href="<?php echo U('Agent/Ucenter/subAgent');?>" ><span >渠道列表</span ></a ></div >
            </div >
        </div >
		
		<div class="col-md-2" >
            <em class="fa fa-sitemap normal" ></em ><span >推广中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="promote_plink" ><a
                        href="<?php echo U('Agent/promote/plink');?>" ><span >推广链接</span ></a ></div >
            </div >
        </div >
		
        
        <div class="col-md-2" ><em class="fa fa-gears normal" ></em ><span >账户管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="Ucenter_security" ><a
                        href="<?php echo U('Agent/Ucenter/security');?>" ><span >安全中心</span ></a ></div >
            </div >
        </div >
    </div >
</div >

<script >
//    $(".top_funcs_div .row .col-md-2").hover(function(){
//         set_side_nav(this);
//    });
$(".top_funcs_div .row .col-md-2").click(function () {
    set_side_nav(this);

});
function set_side_nav(e) {

    highlight_tab(e);
    $(".center_left a.page_async_link").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function (res) {
//                    var right_content=$(res).find(".page-right");
            var right_content = res;
            $(".page-right").html(right_content);
        });
    });

    //var first_link=$(".center_left .row").children("a").eq(0);
    $(".center_left").children(".row").eq(0).children("a").children("span").click();
    $(".center_left").children(".row").eq(0).children("button").click();
    //$(".platName").click();
    //console.log(first_link);
    //setTimeout(function(){
    //	$(".center_left .row").children("a").eq(0).click();
    //
    //},1000);
}

function highlight_tab(e) {
    $(e).siblings().removeClass("active_func");
    $(e).addClass("active_func");
    var html = $(e).children(".nav_sub_items").html();
    $(".center_left").html(html);
}
$(document).ready(function () {
    var uri_base = "/agent.php";
    var arr      = {
        "/Agent/news/getlist/type/4": "0",
        "/Agent/news/getlist/type/5": "0",
        "/Agent/news/getlist/type/6": "0",

        "/Agent/Game/apply_game": "1",
        "/Agent/Game/mygames"   : "1",
        "/Agent/Benefit/set"    : "1",
        "/Agent/Benefit/set_sub": "1",

        "/Agent/DataAgentForMem/all"            : "2",
        "/Agent/DataPtbAgentForSub/index"       : "2",
        "/Agent/DataPtbAgentChargeRecords/index": "2",

        "/Agent/DataMemAccount/index": "3",
        "/Agent/DataMemCharge/index" : "3",
        "/Agent/DataReport/index"    : "3",

        "/Agent/Ucenter/subAgent": "4",

        "/Agent/promote/plink": "5",

        "/Agent/Ucenter/security"    : "6",
        "/Agent/UserProfile/index"   : "6",
        "/Agent/ucenter/toEditPass"  : "6",
        "/Agent/BindPhone/prev_none" : "6",
        "/Agent/ucenter/toCipherCode": "6",

    };

    var path        = location.pathname;
    var current_uri = path.replace(uri_base, "");
    console.log(current_uri);
    var num = arr[current_uri];
    if (! arr[current_uri]) {
        num = 1;
    }
    console.log(num);
    var now_tab = $(".top_funcs_div .row .col-md-2").eq(num);
    highlight_tab(now_tab);
});
$(".center_left").change(function () {

});

</script >
<?php break;?>
        <?php case "subagent": ?><style >
    .center_left {
        min-height: 200px;
        /*padding-left:40px;*/
    }

    .top_funcs_div {
        width: 100%;
        background-color: #555555;
        margin-top: 0px;
        margin-bottom: 10px;
    }

    .top_funcs_div .row {
        width: 1200px;
        margin: 0 auto;
    }

    .top_funcs_div .row div {
        /*                width:16.6%;
                        float:left;*/
        text-align: center;
        font-size: 16px;
        color: #FFFFFF;
        padding: 10px 0;
        cursor: pointer;
    }

    .top_funcs_div .row div:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row .active_func {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row span {
        margin-left: 5px;
    }

    .center_left .row a {
        font-size: 14px;
        /*padding-left:20px;*/
        width: 100%;

    }

    .center_left button {
        margin-left: 20px;
        width: 60%;
    }

    .center_left .row {
        text-align: center;
        /*border-bottom:1px solid #ccc;*/
        margin: 10px 0 10px 0px;

        /*background-color:#f1f1f1;*/
    }

    .center_left .row a {
        width: 180px;
        float: left;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .center_left .row a:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }
</style >

<div class="container top_funcs_div" >
    <div class="row" >
        <div class="col-md-2" >
            <em class="fa fa-newspaper-o normal" ></em ><span >首页</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/4" class="" ><span >新闻公告</span ></a ></div >
                <!--<div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/5" class="" >点位通知</a ></div >
                <div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/6" class="" >游戏公告</a ></div >-->
            </div >
        </div >
        <div class="col-md-2" >
            <em class="fa fa-file normal" ></em ><span >资源管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' >
                    <button class="btn btn-warning"
                            onclick="location.href = '<?php echo U('Agent/money/recharge_member');?>'" >充值</button >
                </div >

                <?php
 if(C("G_WITHDRAW_EN")){ ?>
                <div class='row' >
                    <button class="btn btn-info" onclick="location.href = '<?php echo U('Agent/settle/index');?>'" >提现</button >
                </div >
                <?php } ?>
                <div class='row' id="Game_apply_game" ><a href="<?php echo U('Agent/Game/apply_game');?>" >申请游戏</a ></div >
                <div class='row' id="Game_mygames" ><a href="<?php echo U('Agent/Game/mygames');?>" >我的游戏</a ></div >
                <div class='row' id="Benefit_set" ><a href="<?php echo U('Agent/Benefit/set');?>" >我的优惠</a ></div >
            </div >
        </div >
		<div class="col-md-2" ><em class="fa fa-money normal" ></em ><span ><?php echo C('CURRENCY_NAME');?>管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataAgentForMem_all" ><a
                        href="<?php echo U('Agent/DataAgentForMem/all');?>" ><span >给玩家充值记录</span ></a ></div >
                <div class='row' id="DataPtbAgentChargeRecords_index" ><a
                        href="<?php echo U('Agent/DataPtbAgentChargeRecords/index');?>" ><?php echo C('CURRENCY_NAME');?>入账记录</a ></div >
            </div >
        </div >
        
        <div class="col-md-2" ><em class="fa fa-bar-chart normal" ></em ><span >数据中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataMemAccount_index" ><a
                        href="<?php echo U('Agent/DataMemAccount/index');?>" ><span >玩家帐号明细</span ></a ></div >
                <div class='row' id="DataMemCharge_index" ><a
                        href="<?php echo U('Agent/DataMemCharge/index');?>" >玩家充值明细</a ></div >
                <div class='row' id="DataReport_index" ><a href="<?php echo U('Agent/DataReport/index');?>" >统计报表</a ></div >
            </div >
        </div >
        
		<div class="col-md-2" >
            <em class="fa fa-sitemap normal" ></em ><span >推广中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="promote_plink" ><a
                        href="<?php echo U('Agent/promote/plink');?>" ><span >推广链接</span ></a ></div >
            </div >
        </div >
		
        <div class="col-md-2" ><em class="fa fa-gears normal" ></em ><span >账户管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="Ucenter_security" ><a
                        href="<?php echo U('Agent/Ucenter/security');?>" ><span >安全中心</span ></a ></div >
            </div >
        </div >
    </div >
</div >

<script >
	function highlight_tab(e) {
        $(e).siblings().removeClass("active_func");
        $(e).addClass("active_func");
        var html = $(e).children(".nav_sub_items").html();
        $(".center_left").html(html);
    }

    $(".top_funcs_div .row .col-md-2").click(function () {
        set_side_nav(this);
    });
    function set_side_nav(e) {
        highlight_tab(e);

        $(".center_left").children(".row").eq(0).children("a").children("span").click();
        $(".center_left").children(".row").eq(0).children("button").click();
    }
    $(document).ready(function () {
        var uri_base = "/agent.php";
        var arr      = {

            "/Agent/news/getlist/type/4": "0",
            "/Agent/news/getlist/type/5": "0",
            "/Agent/news/getlist/type/6": "0",

            "/Agent/Game/apply_game": "1",
            "/Agent/Game/mygames"   : "1",
            "/Agent/Benefit/set"    : "1",

            "/Agent/DataAgentForMem/all"            : "2",
            "/Agent/DataPtbAgentChargeRecords/index": "2",

            "/Agent/DataMemAccount/index": "3",
            "/Agent/DataMemCharge/index" : "3",
            "/Agent/DataReport/index"    : "3",

            "/Agent/promote/plink": "4",

            "/Agent/Ucenter/security"    : "5",
            "/Agent/UserProfile/index"   : "5",
            "/Agent/ucenter/toEditPass"  : "5",
            "/Agent/BindPhone/prev_none" : "5",
            "/Agent/ucenter/toCipherCode": "5",

        };

        var path        = location.pathname;
        var current_uri = path.replace(uri_base, "");
        console.log(current_uri);
        var num = arr[current_uri];
        if (! arr[current_uri]) {
            num = 1;
        }
        var now_tab = $(".top_funcs_div .row .col-md-2").eq(num);
        highlight_tab(now_tab);
    });
    $(".center_left").change(function () {

    });

</script >
<?php break;?>
        <?php default: ?>
            <style >
    .center_left {
        min-height: 200px;
        /*padding-left:40px;*/
    }

    .top_funcs_div {
        width: 100%;
        background-color: #555555;
        margin-top: 0px;
        margin-bottom: 10px;
    }

    .top_funcs_div .row {
        width: 1200px;
        margin: 0 auto;

    }

    .top_funcs_div > .row > .col-md-2 {
        width: 14.2%;
    }

    .top_funcs_div .row div {
        /*                width:16.6%;
                        float:left;*/
        text-align: center;
        font-size: 16px;
        color: #FFFFFF;
        padding: 10px 0;
        cursor: pointer;
    }

    .top_funcs_div .row div:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row .active_func {
        background-color: #00AAEE;
        color: #FFFFFF;
    }

    .top_funcs_div .row span {
        margin-left: 5px;
    }

    .center_left button {
        width: 50%;
    }

    .center_left .row {
        text-align: center;
        border-bottom: 1px solid #F1F1F1;
        margin: 0px 0 0px 0px;
    }

    .center_left .row[data-customestyle="no-bottom-border"] {

        border-bottom: none;
    }

    .center_left .row a {
        width: 180px;
        float: left;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-right: 10px;
        font-size: 14px;
    }

    .center_left .row a:hover {
        background-color: #00AAEE;
        color: #FFFFFF;
    }
</style >

<div class="container top_funcs_div" >
    <div class="row" >
        <div class="col-md-2" >
            <em class="fa fa-newspaper-o normal" ></em ><span >首页</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/4" class="" ><span >新闻公告</span ></a ></div >
                 <!--<div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/5" class="" >点位通知</a ></div >-->
                <!--<div class='row' ><a href="<?php echo U('Agent/news/getlist');?>/type/6" class="" >游戏公告</a ></div >-->
            </div >
        </div >
        <div class="col-md-2" >
            <em class="fa fa-file normal" ></em ><span >资源管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' data-customestyle="no-bottom-border" style="padding:10px 0;" >
                    <button class="btn btn-warning"
                            onclick="location.href = '<?php echo U('Agent/money/recharge_member');?>'" >充值</button >
                </div >

                <?php
 if(C("G_WITHDRAW_EN")){ ?>
                <div class='row' data-customestyle="no-bottom-border" style="padding:10px 0;" >
                    <button class="btn btn-info" onclick="location.href = '<?php echo U('Agent/settle/index');?>'" >提现</button >
                </div >
                <?php } ?>
                <div class='row' id="Game_apply_game" ><a href="<?php echo U('Agent/Game/apply_game');?>" ><span >申请游戏</span ></a ></div >
                <div class='row' id="Game_mygames" ><a href="<?php echo U('Agent/Game/mygames');?>" >我的游戏</a ></div >
                <div class='row' id="Benefit_set" ><a href="<?php echo U('Agent/Benefit/set');?>" >我的优惠</a ></div >
                <div class='row' id="Benefit_set_sub" ><a href="<?php echo U('Agent/Benefit/set_sub');?>" >子渠道优惠</a ></div >
            </div >
        </div >
		
		<div class="col-md-2" ><em class="fa fa-money normal" ></em ><span ><?php echo C('CURRENCY_NAME');?>管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataAgentForMem_all" ><a
                        href="<?php echo U('Agent/DataAgentForMem/all');?>" ><span >给玩家充值记录</span ></a ></div >
                <div class='row' id="DataPtbAgentForSub_index" ><a
                        href="<?php echo U('Agent/DataPtbAgentForSub/index');?>" >子渠道发币记录</a ></div >
                <div class='row' id="DataPtbAgentChargeRecords_index" ><a
                        href="<?php echo U('Agent/DataPtbAgentChargeRecords/index');?>" ><?php echo C('CURRENCY_NAME');?>入账记录</a ></div >
            </div >
        </div >
        
        <div class="col-md-2" ><em class="fa fa-bar-chart normal" ></em ><span >数据中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="DataMemAccount_index" ><a
                        href="<?php echo U('Agent/DataMemAccount/index');?>" ><span >玩家帐号明细</span ></a ></div >
                <div class='row' id="DataMemCharge_index" ><a
                        href="<?php echo U('Agent/DataMemCharge/index');?>" >玩家充值明细</a ></div >
                <div class='row' id="DataReport_index" ><a href="<?php echo U('Agent/DataReport/index');?>" >统计报表</a ></div >
            </div >
        </div >
        <div class="col-md-2" ><em class="fa fa-group normal" ></em ><span >渠道管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="Ucenter_subAgent" ><a
                        href="<?php echo U('Agent/Ucenter/subAgent');?>" ><span >渠道列表</span ></a ></div >
            </div >
        </div >
		
		<div class="col-md-2" >
            <em class="fa fa-sitemap normal" ></em ><span >推广中心</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="promote_plink" ><a
                        href="<?php echo U('Agent/promote/plink');?>" ><span >推广链接</span ></a ></div >
            </div >
        </div >
		
        
        <div class="col-md-2" ><em class="fa fa-gears normal" ></em ><span >账户管理</span >
            <div style="display:none;" class="nav_sub_items" >
                <div class='row' id="Ucenter_security" ><a
                        href="<?php echo U('Agent/Ucenter/security');?>" ><span >安全中心</span ></a ></div >
            </div >
        </div >
    </div >
</div >

<script >
//    $(".top_funcs_div .row .col-md-2").hover(function(){
//         set_side_nav(this);
//    });
$(".top_funcs_div .row .col-md-2").click(function () {
    set_side_nav(this);

});
function set_side_nav(e) {

    highlight_tab(e);
    $(".center_left a.page_async_link").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function (res) {
//                    var right_content=$(res).find(".page-right");
            var right_content = res;
            $(".page-right").html(right_content);
        });
    });

    //var first_link=$(".center_left .row").children("a").eq(0);
    $(".center_left").children(".row").eq(0).children("a").children("span").click();
    $(".center_left").children(".row").eq(0).children("button").click();
    //$(".platName").click();
    //console.log(first_link);
    //setTimeout(function(){
    //	$(".center_left .row").children("a").eq(0).click();
    //
    //},1000);
}

function highlight_tab(e) {
    $(e).siblings().removeClass("active_func");
    $(e).addClass("active_func");
    var html = $(e).children(".nav_sub_items").html();
    $(".center_left").html(html);
}
$(document).ready(function () {
    var uri_base = "/agent.php";
    var arr      = {
        "/Agent/news/getlist/type/4": "0",
        "/Agent/news/getlist/type/5": "0",
        "/Agent/news/getlist/type/6": "0",

        "/Agent/Game/apply_game": "1",
        "/Agent/Game/mygames"   : "1",
        "/Agent/Benefit/set"    : "1",
        "/Agent/Benefit/set_sub": "1",

        "/Agent/DataAgentForMem/all"            : "2",
        "/Agent/DataPtbAgentForSub/index"       : "2",
        "/Agent/DataPtbAgentChargeRecords/index": "2",

        "/Agent/DataMemAccount/index": "3",
        "/Agent/DataMemCharge/index" : "3",
        "/Agent/DataReport/index"    : "3",

        "/Agent/Ucenter/subAgent": "4",

        "/Agent/promote/plink": "5",

        "/Agent/Ucenter/security"    : "6",
        "/Agent/UserProfile/index"   : "6",
        "/Agent/ucenter/toEditPass"  : "6",
        "/Agent/BindPhone/prev_none" : "6",
        "/Agent/ucenter/toCipherCode": "6",

    };

    var path        = location.pathname;
    var current_uri = path.replace(uri_base, "");
    console.log(current_uri);
    var num = arr[current_uri];
    if (! arr[current_uri]) {
        num = 1;
    }
    console.log(num);
    var now_tab = $(".top_funcs_div .row .col-md-2").eq(num);
    highlight_tab(now_tab);
});
$(".center_left").change(function () {

});

</script >
<?php endswitch;?>

<!--主题内容区域-->
<section >
    <div class="user_center main" >
        <div class="banner_1" >

        </div >
        <div class="user_center_main page-content" >
            <?php switch($user_type): case "agent": ?><div class="center_left" >

</div >
<?php break;?>
    <?php case "subagent": ?><div class="center_left" >

</div ><?php break;?>
    <?php default: ?>
    <div class="center_left" >

</div >
<?php endswitch;?>

            <div class="page-right my-game query-records individual-account" >
                <style >
    .finance_values .col-md-4 {

        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px 50px;

    }

    .finance_values .col-md-4 .row {
        border: 1px solid;
        padding: 20px;
        /*height:80px;*/
        text-align: center;
        border-radius: 10px;
        color: #FFFFFF;
    }

    .finance_values .col-md-4 .row p {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .finance_values .col-md-4 .row span {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .finance_values .fa-info-circle {
        position: absolute;
        top: 30px;
        right: 45px;
        font-size: 16px;
        cursor: pointer;
    }

    .custom_class .layui-layer-content {
        background-color: #FFFFFF;
        color: #333333;
    }
</style >

<div class="container finance_values" style="width:996px;" >
    <div class="row" >
        <div class="col-md-4" >
            <div class="row" style="border-color:#61B364;background-color:#61B364;" >
                <p ><?php echo ($ptb_remain); ?></p >
                <span >平台币余额</span >
                <i class="fa fa-normal fa-info-circle finance_hint_1" ></i >
            </div >
        </div >
        <?php
 if(C("G_WITHDRAW_EN")){ ?>
        <div class="col-md-4" >
            <div class="row" style="border-color:#2196F3;background-color:#2196F3;" >
                <p ><?php echo ($account_remain); ?></p >
                <span >账户余额</span >

                <a style="position:absolute;top:75px;right:45px;" class="agent_btn btn btn-sm btn-danger"
                   href="<?php echo U('Agent/Settle/bank_ok');?>" >
                    立即提现>>
                </a >

                <i class="fa fa-normal fa-info-circle finance_hint_2" ></i >
            </div >
        </div >
        <div class="col-md-4" >
            <div class="row" style="border-color:#FD9D7E;background-color:#FD9D7E;" >
                <p ><?php echo ($account_freeze); ?></p >
                <span >账户冻结金额</span >
                <i class="fa fa-normal fa-info-circle finance_hint_3" ></i >
            </div >
        </div >
        <?php } ?>
    </div >

</div >

<script >
    $(".finance_hint_1").click(function () {
        layer.tips(
                "1、给玩家充值需要使用平台币，给下级渠道转账也需要使用平台币；<br />" +
                "2、平台币余额不足时，可自助充值平台币余额，也可联系平台客服人员线下充值；<br />" +
                "3、给玩家充值时，充值的平台币会绑定某游戏，除该游戏外，其余游戏均无法使用；<br />", this, {
                    tips      : [1, '#fff'],
                    time      : 400000,
                    skin      : 'custom_class',
                    closeBtn  : 1,
                    shade     : [0.2, '#333'],
                    shadeClose: true
                });
    });
    $(".finance_hint_2").click(function () {
        layer.tips(
                "1、账户金额为推广获得的收益，玩家在游戏内自然充值时，可获得收益；<br />" +
                "2、账户余额可以提现，请完善您的结算账户信息；<br />" +
                "3、当平台币余额不足时，可通过账户余额充值；<br />", this, {
                    tips      : [1, '#fff'],
                    time      : 400000,
                    skin      : 'custom_class',
                    closeBtn  : 1,
                    shade     : [0.2, '#333'],
                    shadeClose: true
                });
    });
    $(".finance_hint_3").click(function () {
        layer.tips(
                "1、账户余额提现状态下，申请提现的资金会被冻结；<br />" +
                "2、提现申请被拒绝的情况下，冻结资金将返还至账户余额；<br />", this, {
                    tips      : [3, '#fff'],
                    time      : 400000,
                    skin      : 'custom_class',
                    closeBtn  : 1,
                    shade     : [0.2, '#333'],
                    shadeClose: true
                });
    });
</script >
                <div class="search-results" >
                    <div class="input-tab" >
                        <ul >
                            <li class="on" ><a href="javascript:;" data-url="<?php echo U('Agent/settle/records');?>"
                                               class="settle_tab" >提现记录</a ></li >
                            <li ><a href="javascript:;" data-url="<?php echo U('Agent/DataMemRechargeRecords/getList');?>"
                                    class="settle_tab" >玩家充值收益明细</a ></li >
                            <?php switch($user_type): case "agent": ?><li ><a href="javascript:;" data-url="<?php echo U('Agent/AgentGainFromSub/index');?>"
                                            class="settle_tab" >子渠道代充收益明细</a ></li ><?php break; endswitch;?>

                        </ul >
                    </div >
                    <div class="item-tab-all" >
                        <div class="item-tab-con" >
                            <iframe id="iframe4" src="<?php echo U('Agent/settle/records');?>" frameborder="0" width="100%"
                                    height="800px" >
                                抱歉！您的浏览器不支持，请升级您的浏览器以便正常访问。
                            </iframe >
                        </div >
                    </div >
                </div >
            </div >
        </div >
        <!--余额提现弹窗-->
        <div id="balance-withdrawal-pop" >
            <div id="balance-withdrawal-pop-header" >
                <span >请选择提取方式</span >
                <img src="/public/agent/img/pop-closed.png" style="cursor:pointer;"
                     onclick="closebox('#balance-withdrawal-pop')" >
            </div >
            <div id="balance-withdrawal-pop-content" >
                <div class="to-aliPay" onclick="selectWithdraw('zfb')" ></div >
                <div class="to-bank-card" onclick="selectWithdraw('bank')" ></div >
            </div >
        </div >
</section >
<!--页脚-->
<!--<div class="page-footer">
    <div class="footer-content">
        <ul>
            <li class="liebao" onclick="location = '<?php echo U('front/index/index');?>'"><?php echo C('COMPANY_SHORTNAME');?></li>
            <li onclick="location = '<?php echo U('front/about/aboutus');?>'">关于我们</li>
            <li onclick="location = '<?php echo U('front/about/business');?>'">商务合作</li>
            <li class="help-center" onclick="location = '<?php echo U('front/Account/login');?>'">推广平台</li>
        </ul>
        <span class="copyright">
            <p><span>版权所有：<?php echo C('COMPANY_NAME');?> 网站备案/许可证号： <?php echo C('WEB_ICP');?> 联系电话：<?php echo C('COMPANY_PHONE');?></span></p>
        </span>
    </div>
</div>-->

<div class="container" style="width:1000px;margin-top:40px;margin-bottom:40px;text-align:center;" >
    <p ><?php echo $company_info['COPYRIGHT'];?></p >
    <p ><?php echo $company_info['WEB_ICP'];?></p >
    <p >公司名称：<?php echo $company_info['COMPANY_NAME'];?></p >
</div >
</body>
</html>

<div id="cover"
     style="position: absolute;top: 0px; left: 0px;width:100%;  height: 1624px; z-index: 8888; opacity: 0.8; display: none; background: rgb(37, 33, 48);" >
    <iframe id="if" name="if"
            style="position:absolute;top:-5px;left:0;border:none;width:100%;height:100%;filter:alpha(opacity=0);" ></iframe >
</div >
</div>
<div id="_my97DP" style="position: absolute; top: -1970px; left: -1970px;" >
</div >

<script >
    function popupbox(id) {
        if ($(id).css("display") === "none") {
            $(id).css("display", "block")
            $("#cover").css("display", "block");
        } else {
            $(id).css("display", "none");
            $("#cover").css("display", "none");
        }
    }
    function closebox(id) {
        $(id).css("display", "none");
        $("#cover").css("display", "none");
    }
    function selectWithdraw(ways) {
        if (ways === "zfb") {
            window.location.href = "<?php echo U('Agent/settle/zfb');?>"
        } else if (ways === "bank") {
            window.location.href = "<?php echo U('Agent/settle/bank');?>"
        }
    }

    $(".settle_tab").click(function () {
        var url = $(this).attr("data-url");
        $("#iframe4").attr("src", url);
//        alert(url);
//        $.get(url,function(res){
//            $("#iframe4").html(res);
//        });
//        $(".item-tab-con").html(url);
    });

    //	$(".search-results").children(".input-tab").find("li").click(function(){
    //		$(this).addClass("on").siblings("li").removeClass("on");
    //		var flag= $(this).index();
    //		$(this).parent().parent().parent().find(".item-tab-con").eq(flag).show().siblings(".item-tab-con").hide();
    //	})

    $(".input-tab li").click(function () {
        $(".input-tab li").removeClass("on");
        $(this).addClass("on");
    });
</script >