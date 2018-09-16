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

<script src="/public/agent/js/subagent.js" ></script >

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

            <div class="page-right my-game query-records lower-channel-management" >
                <style >
                    #queryForm .row .col-md-4 {
                        text-align: center;
                    }
                </style >
                <form id="queryForm" action="/agent.php/Agent/Ucenter/subAgent" method="get" >
                    <div class="container" style="width:960px;margin-top:20px;margin-bottom:20px;" >
                        <div class="row" >
                            <div class="col-md-2" >
                                <a class=" add_subagent_btn btn btn-success" href="javascript:;" >+添加下级渠道</a >
                            </div >
                            <div class="col-md-3" >
                                <div class="input-group" >
                                    <span class="input-group-addon" >渠道帐号</span >
                                    <input class="form-control" name="user_login" type="text" placeholder=""
                                           value="<?php echo ($formget["user_login"]); ?>" />
                                </div >
                            </div >
                            <div class="col-md-3" >
                                <div class="input-group" >
                                    <span class="input-group-addon" >渠道名称</span >
                                    <input class="form-control" name="user_nicename" type="text" placeholder=""
                                           value="<?php echo ($formget["user_nicename"]); ?>" />
                                </div >
                            </div >
                            <div class="col-md-4" >
                                <button class="btn btn-success" >搜索</button >
                            </div >
                        </div >
                    </div >
                </form >
                <div class="search-results" >

                    <div class="results-header" >
                        <span class="game-num" >共找到<i ><?php echo ($count); ?></i >个渠道</span >

                    </div >
                    <div class="table-content" >
                        <table class="table table-hover" >
                            <tbody >
                            <tr >
                                <!--<th width="80">渠道ID</th>-->
                                <th width="130" >创建时间</th >
                                <th width="110" >渠道帐号</th >
                                <th width="110" >渠道名称</th >
                                <!--<th width="100"><?php echo C(CURRENCY_NAME);?>余额（元）</th>-->

                                <!--<th width="80">状态</th>-->
                                <!--<th width="80">操作</th>-->
                            </tr >

                            <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even" >
                                    <!--<td><?php echo ($vo["id"]); ?></td>-->
                                    <td ><?php echo ($vo["create_time"]); ?></td >
                                    <td ><?php echo ($vo["user_login"]); ?></td >
                                    <td ><?php echo ($vo["user_nicename"]); ?></td >
                                    <!--<td>0.00</td>-->

                                    <!--                                        <td>
                                                                                <?php switch($vo["user_status"]): case "2": ?>正常<?php break;?>
                                                                                    <?php case "3": ?>禁用<?php break; endswitch;?>
                                                                            </td>-->
                                    <!--                                        <td>
                                                                                <a href="<?php echo U('Agent/ucenter/editSub');?>/<?php echo ($vo["id"]); ?>" target="_self" class="edit_a" style="cursor:pointer;color:#00a0e9;">修改</a>
                                                                                &nbsp;&nbsp;
                                                                                <a href="javascript:;" onclick="delsub('<?php echo ($vo["id"]); ?>','<?php echo ($vo["user_nicename"]); ?>');" class="del_a" style="cursor:pointer;">删除</a>
                                                                            </td>-->

                                </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody >
                        </table >

                        <div class="page" style="" >
                            <span class="game-num" >
                                共为您找到 <?php echo ($count); ?> 个渠道
                            </span >
                            <div class="paging" >
                                <?php echo ($page); ?>
                            </div >
                        </div >
                    </div >
                </div >
            </div >
        </div >
    </div >
    </div>
    <style >
        .pop_up_form_div {
            width: 380px;
            padding: 20px 20px 40px 20px;
        }

        .pop_up_form_div .row {
            width: 350px;
            margin: 20px 0;
            padding: 0;
            font-size: 14px;
        }

        .pop_up_form_div input[type='text'], .pop_up_form_div input[type='password'] {
            /*width:280px;*/
        }

        .pop_up_form_submit_btn {
            width: 350px;
        }

        input[disabled='disabled'] {
            background-color: #FFFFFF;
            border-bottom: 1px solid #CCCCCC;
        }

        .pop_up_form_div .input-group-addon {
            width: 100px;
            font-size: 14px;
        }

        .pop_up_form_div .input-group {
            width: 350px;
        }
    </style >

    <div class="pop_up_form_div container" id='add_subagent' style="display:none;" >
        <div class="row" >
            <div class="input-group " >
                <span class="input-group-addon" >渠道名称</span >
                <input class="form-control" type="text" name="name" />
            </div >
        </div >

        <div class="row" >
            <div class="input-group " >
                <span class="input-group-addon" >渠道帐号</span >
                <input class="form-control" type="text" name="user_login" />
            </div >
        </div >
        <!--            <div class="row">
                        <div class="input-group ">
                            <span class="input-group-addon">手机</span>
                            <input class="form-control" type="text" name="phone" />
                        </div>
                    </div>-->

        <!--            <div class="row">
                        <div class="input-group ">
                            <span class="input-group-addon">邮箱</span>
                            <input class="form-control" type="text" name="email" />
                        </div>
                    </div>-->
        <div class="row" >
            <div class="input-group " >
                <span class="input-group-addon" >登录密码</span >
                <input class="form-control" type="password" name="pass" />
            </div >
        </div >
        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn" id='popup_submit_btn' >添加</button >
        </div >
    </div >
</section >

<style >
    .del_a {
        color: red;
    }

    .del_a:hover {
        color: red;
    }
</style >
<script >
    //function delsub(subid,uname){
    //
    //    var con=confirm("真的要删除下级渠道 【"+uname+"】 吗？");
    //
    //    if(!con){
    //       return;
    //    }
    //    $.post("<?php echo U('Agent/ucenter/delSub');?>",{"subid":subid},function(data){
    //        if(data.error==='0'){
    //            location.reload();
    //        }else{
    //            yxalert(data.msg);
    //        }
    //    });
    //}

    $(".add_subagent_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '400px',
            title  : "添加下级渠道",
            content: $('#add_subagent'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $("#popup_submit_btn").click(function () {
        var name = $("#add_subagent input[name='name']").val();
//        var phone=$("input[name='phone']").val();
//        var email=$("input[name='email']").val();
        var pass       = $("#add_subagent input[name='pass']").val();
        var user_login = $("#add_subagent input[name='user_login']").val();
        $.post("<?php echo U('Agent/Ucenter/addSub_post');?>", {"user_login": user_login, "name": name, "pass": pass},
                function (data) {
                    if (data.error === '0') {
                        yxalert(data.msg);
                        reload_delay();
                    } else {
                        yxalert(data.msg);
                    }
                });
    });
</script >

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