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

<style type="text/css" >
    .cuttitle {
        display: inline-block;;
        *display: inline;
        width: 130px;
        overflow: hidden;
        white-space: nowrap;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        cursor: pointer;
    }

    .search-results .table-content table tr th {
        vertical-align: middle;
        font-size: 12px;
    }

    .search-results .table-content table tr td {
        vertical-align: middle;
        font-size: 12px;
    }
</style >
<script src="/public/js/clipboard.min.js" ></script >
<script src="/public/agent/js/demo1.js" ></script >

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

            <div class="page-right my-game" >

                <form id="queryForm" action="/agent.php/Agent/Game/mygames" method="get" >

                    <div class="container" style="width:960px;margin-top:20px;margin-bottom:20px;" >
                        <div class="row" >
                            <div class="col-md-4 col-md-offset-4" >
                                <div class="input-group" >
                                    <span class="input-group-addon" >搜索游戏</span >
                                    <input class="form-control" type="text" name="gamename" placeholder="请输入游戏名称"
                                           value="<?php echo ($formget['gamename']); ?>" />
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
                        <span class="game-num" >共找到<i ><?php echo ($total_count); ?></i >个游戏</span >
                    </div >
                    <div class="table-content" >
                        <table class="table" >
                            <tbody >
                            <tr >
                                <!--<th width="82">游戏ID</th>-->
                                <th width="150" >游戏名称</th >
								<th width="120" >平台</th >
                                <?php if(1 == C('G_VIP')): ?><th width="86" >vip等级表</th ><?php endif; ?>
                                <!--<th width="86">游戏大小</th>-->
                                <th width="154" >添加时间</th >
                                <th width="102" style="display: none;" >下载地址</th >
                                <th width="120" >我的折扣</th >
                                <th width="88" >状态</th >
                                <th width="250" >操作</th >
								<th width="250" >推广链接</th >
                            </tr >
                            <?php if(is_array($games)): $i = 0; $__LIST__ = $games;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even" >
                                    <!--<td><?php echo ($vo["app_id"]); ?></td>-->
                                    <td style="text-align:left" >
                                        <?php if(!empty($vo["icon"])): ?><img src="<?php echo sp_get_asset_upload_path($vo[icon]);?>"
                                                 onerror="imgnofind('/public/<?php echo ($vo[icon]); ?>')" width="50" /><?php endif; ?>
                                        <?php echo ($vo["gamename"]); ?>
                                    </td >
									<td class="" >
                                        <?php if($vo['classify'] == 4 or $vo['classify'] == 401 ): ?>苹果
										<?php elseif($vo['classify'] == 2): ?>H5
										<?php else: ?> 安卓<?php endif; ?>
                                    </td >
                                    <?php if(1 == C('G_VIP')): ?><td class="game-size watchsize" >
                                         <a data-id="<?php echo ($vo['app_id']); ?>"
                                            href="<?php echo U('vip/index',array('app_id'=>$vo['app_id']));?>" >查看等级
                                         </a >
                                     </td ><?php endif; ?>
                                    <td ><?php echo date("Y-m-d H:i:s",$vo['update_time']); ?></td >
                                    <td ><span
                                            class="agent_rate" ><?php echo round($vo['agent_rate'],2); ?></span > &nbsp;&nbsp;
                                                                                                                  <!--<a href="javascript:;" agent_game_id="<?php echo ($vo["id"]); ?>" onclick="setrate(this);">编辑</a>-->
                                    </td >
                                    <td class="" >
                                        <?php echo ($vo["package_status_txt"]); ?>
                                    </td >
                                    <td >
                                        <?php if(empty($vo["url"])): if($vo['classify'] != 4 and $vo['classify'] != 401 ): ?><a href="javascript:;" class="btn subpack_btn btn-sm btn-default"
                                               data-agentgameid="<?php echo ($vo["id"]); ?>" >生成</a >
                                        <?php else: ?>
                                            --<?php endif; endif; ?>
                                        <?php if(!empty($vo["url"])): if($vo['classify'] != 4 and $vo['classify'] != 401 ): ?><a href="javascript:;" class="btn subpack_btn btn-sm btn-default"
                                               data-agentgameid="<?php echo ($vo["id"]); ?>" >更新</a >
                                            &nbsp;&nbsp;
                                            <a href="javascript:;" class="btn btn-default btn-sm link_copy_btn"
                                               data-clipboard-text="<?php echo ($vo["app_fp"]); ?>"
                                               data-link="<?php echo ($vo["app_fp"]); ?>" >复制链接</a ><?php endif; endif; ?>
                                    </td >
									<td>
										<a href="javascript:;" class="btn btn-sm btn-default link_copy_btn" data-clipboard-text="<?php echo ($vo["reg_fp"]); ?>">复制推广链接</a >
									</td>
                                </tr ><?php endforeach; endif; else: echo "" ;endif; ?>

                            <div style="display:none;width:300px;text-align:center;font-size:20px;padding:20px;"
                                 id="domessage" >分包中，请稍等...
                            </div >
                            <script src="/public/js/jquery.blockUI.min.js" ></script >

                            <script src="/public/js/clipboard.min.js" ></script >
                            <script src="/public/huoshu/clipboard.js" ></script >
                            <script >
                                $(document).ajaxStop($.unblockUI);

                                function setrate2(e) {
                                    var r = $(e).siblings(".agent_rate").text();
                                    $(e).siblings(".agent_rate").html("<input class='agent_rate_input' name='agent_rate' type='text' value='" + r + "' />");
                                    $(".agent_rate_input").focus();
                                    $(e).text("提交");
                                    $(e).parent("td").append(" <a href='javascript:;' class='agent_rate_cancel_edit'>取消</a>");
                                    $(e).siblings(".agent_rate_cancel_edit").click(function () {
                                        $(e).siblings(".agent_rate").text(r);
                                        $(e).text("编辑");
                                        $(e).siblings(".agent_rate_cancel_edit").remove();
                                    });
                                }

                                function setrate(e) {
                                    var r             = $(e).siblings(".agent_rate").text();
                                    var agent_game_id = $(e).attr("agent_game_id");
//                                        alert(agent_game_id);
//                                        return;
                                    var r_new = prompt("请输入新的折扣", r);
                                    if (r_new !== null && r_new !== "" && ! isNaN(r_new)) {
                                        $.post("<?php echo U('Agent/game/set_mem_rate');?>", {
                                            "rate"         : r_new,
                                            "agent_game_id": agent_game_id
                                        }, function (data) {
                                            if (data.error === '1') {
                                                yxalert(data.msg);
                                            } else {
                                                location.reload();
                                            }
                                        });
                                    }
                                }
                                function download_app(url, ag_id) {
                                    $.post("<?php echo U('Agent/Game/setDownVer');?>", {"ag_id": ag_id});
                                    window.open(url);
                                    location.reload();
                                }

                                $(".subpack_btn").click(do_pack);
                                function do_pack() {
                                    $.blockUI({message: $('#domessage')});
                                    var id = $(this).attr("data-agentgameid");
                                    $.post("<?php echo U('Agent/Game/pack');?>", {"id": id}, function (data) {
                                        if (data.error === '0') {
                                            yxalert(data.msg);
                                            reload_delay();
                                        } else if (data.error === '1') {
                                            yxalert(data.msg);
                                        }
                                    });
                                }
                            </script >
                            <style >
                                .agent_rate_input {
                                    width: 40px;
                                }
                            </style >
                            </tbody >
                        </table >
                        <div class="page" style="" >
                            <div class="paging" ><?php echo ($Page); ?></div >
                        </div >

                    </div >
                </div >
            </div >
        </div >
    </div >
</section >

<script src="/public/agent/js/autoPage.js" ></script >
<script src="/public/agent/My97DatePicker/WdatePicker.js" ></script >
<script src="/public/agent/js/mygames.js" ></script >
<div class="alertBox" >
	<div id="sizeBox" >
		<b class="closeBtn" ><img src="/public/agent/img/delete-img.png" /></b >
	</div >
</div >
<!-- 弹窗信息开始 -->
<!--<?php if($flag == 1): ?>-->
<div class="agreement-mask" ></div >
<div class="agreement" id="notes" >
<b class="closeBtn" ><img src="/public/agent/img/delete-img.png" /></b >
    <form onsubmit="return false;" >
        <div ><?php echo ($content); ?></div >
        <div class="c" >
            <input value="关闭" type="button" class="bnt" >
        </div >
    </form >
</div >
<!--<?php endif; ?>-->
</body>
<style >
#notes {
    padding: 30px 0px 0px 0px;
}

#notes form {
    padding: 0px 20px;
    overflow-y: scroll;

}

.alertBox {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: rgba(0, 0, 0, .3);
    display: none;
}

#sizeBox {
    width: 800px;
    height: auto;
    min-height: 300px;
    background-color: #FFFFFF;
    position: absolute;
    top: 150px;
    left: 50%;
    margin-left: -400px;
    z-index: 999;
    display: none;
    padding: 20px;
}

#sizeBox.noteData {
    text-align: center;
    line-height: 300px;
}

.closeBtn {
    width: 20px;
    height: 20px;
    border-radius: 10px;
    position: absolute;
    top: 10px;
    cursor: pointer;
    z-index: 9999999999;
}

#notes .closeBtn {
    left: 10px;
}

.alertBox .closeBtn {
    right: 10px;
}

.closeBtn > img {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
}

h1, p.time {
    max-width: 100%;
    box-sizing: border-box;
}

p {
    margin: 0px;
}

.agreement-mask {
    position: fixed !important;
}

.agreement-mask {
    position: absolute;
    background: #000000;
    width: 100%;
    height: 100%;
    opacity: 0.5;
    top: 0;
    left: 0;
    z-index: 9998;
    display: none;
}

.agreement {
    position: fixed;
    width: 600px;
    height: auto;
    top: 150px;
    left: 50%;
    margin-left: -300px;
    background: #FFFFFF;
    z-index: 9999;
    text-align: left;
    font-family: '\5b8b\4f53';
    display: none;
}

.agreement h3 {
    background: #F7F7F7;
    font-size: 14px;
    height: 47px;
    line-height: 47px;
    font-weight: bold;
    text-align: center;
}

.agreement h3 .close {
    font-size: 24px;
    float: right;
    padding-right: 15px;
    color: #CCCCCC;
    font-weight: normal;
    cursor: pointer;
}

.agreement p.tips {
    font-size: 12px;
    height: 18px;
    padding: 10px 0 10px 15px;
    color: #999999;
}

.agreement form {
    padding: 0 20px;
}

.agreement form div {
    margin-bottom: 15px;
}

.agreement form .a p {
    line-height: 30px;
}

.agreement form .bnt {
    display: block;
    border: none;
    background: #E4393C;
    height: 40px;
    line-height: 40px;
    width: 120px;
    cursor: pointer;
    font-size: 16px;
    color: #FFFFFF;
    font-family: '\5b8b\4f53';
    font-weight: bold;
    margin: 0px auto;
}

.agreement form .b {
    text-align: center;
}

.agreement form .c {
}
</style >

<script >
    $(function () {
        showBox()
    })
    $("#notes .close").click(function () {
        closeBox()
    });
    $("#notes .closeBtn").click(function () {
        closeBox()
    });
    $("#notes .bnt").click(function () {
        closeBox()
    });
    function closeBox() {
        $(".agreement-mask").fadeOut();
        $("#notes").fadeOut();
    }
    function showBox() {
        $(".agreement-mask").fadeIn();
        $("#notes").fadeIn();
    }
    $(".search-results").delegate(".watchsize>a", "click", function (e) {
        e.preventDefault();

        sendData("<?php echo U('vip/index');?>", {"app_id": $(this).attr("data-id")}, function (result) {
            if (result.status == 1) {
                $("#sizeBox").removeClass("noteData").html($("#sizeBox").html() + result.content);
            } else {
                $("#sizeBox").addClass("noteData").html($("#sizeBox").html() + "暂无数据。。。。");
            }
            $(".alertBox").css("height", $("html").css("height")).fadeIn();
            $("#sizeBox").fadeIn();
        });
    })
    $("#sizeBox").delegate(".closeBtn", "click", function () {
        $("#sizeBox").fadeOut();
        $(".alertBox").fadeOut();
        $("#sizeBox").html('<b class="closeBtn"><img src="/public/agent/img/delete-img.png" /></b>');
    });
</script >
<!-- 弹窗信息结束 -->
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