<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
<head >
    <meta charset="utf-8" >
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" ></script >
    <![endif]-->

    <link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet" >
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet" >
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
    <style >
        .length_3 {
            width: 180px;
        }

        form .input-order {
            margin-bottom: 0px;
            padding: 3px;
            width: 40px;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .select2-container .select2-dropdown {
            z-index: 99999999;
        }
    </style >
    <!--[if IE 7]>
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css" >
    <![endif]-->
    <script type="text/javascript" >
        //全局变量
        var GV = {
            DIMAUB : "/",
            JS_ROOT: "public/js/",
            TOKEN  : ""
        };
    </script >
    <!-- Le javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/jquery.js" ></script >
    <script src="/public/js/wind.js" ></script >
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js" ></script >
    <!--<script src="/public/3rd/datatable/js/jquery.dataTables.js" ></script >-->
    <!--<link href="/public/3rd/datatable/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" >-->
    <?php if(APP_DEBUG): ?><style >
            #think_page_trace_open {
                z-index: 9999;
            }
        </style ><?php endif; ?>

    <link rel="stylesheet" type="text/css" href="/public/select2/css/select2.min.css" />
    <script src="/public/select2/js/select2.min.js" ></script >
    <script type="text/javascript" src="/public/select2/js/i18n/zh-CN.js" ></script >
    <script >
        $(document).ready(function () {
            if($.isFunction($.select2)){
                $(".select_2").select2({
                    language: "zh-CN"
                });
            }

//$('table').dataTable({"info": false,"paging": false,"lengthChange": false,"searching": false,"ordering": false});

            $(".form-search select").change(function () {
//        $("input[name='submit']").click();
                $("input[value='搜索']").click();
            });
        });

    </script >

    <script src="/public/3rd/layer/layer.js" ></script >
    <script src="/public/huoshu/share.js" ></script >

<style >
    .funcs {
        padding: 0 0 10px 0;
    }

    .pop_up_form_div {
        width: 300px;
        padding: 20px 20px 40px 20px;
    }

    .pop_up_form_div .row {
        width: 300px;
        margin: 0;
        padding: 0;
    }

    .pop_up_form_div input[type='text'], .pop_up_form_div input[type='password'] {
        width: 280px;
    }

    .pop_up_form_submit_btn {
        width: 300px;
    }

    input[disabled='disabled'] {
        background-color: #FFFFFF;
        border-bottom: 1px solid #CCCCCC;
    }

</style >

</head>
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Tui/AgentPtb/official_give');?>" target="_self" >官方给渠道发平台币统计</a ></li >
        <li ><a href="<?php echo U('Tui/AgentPtb/official_give_member');?>" target="_self" >官方给玩家发游戏统计</a ></li >
    </ul >
    <form class="well form-search" method="get" action='/admin.php/Tui/AgentPtb/official_give/menuid/263.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                    <span class="mr20" >
                        收币渠道名称：
                        <?php echo ($agent_select); ?>
                        渠道等级：
                        <?php echo ($agent_level_select); ?>
                        <br /><br />
                        时间：
                        <?php echo ($time_choose); ?>
                        <input type="submit" class="btn btn-primary" value="搜索" />                        
                    </span >
            </div >
        </div >
    </form >
    <div class='funcs' >
        <a class='btn btn-success give_agent_coin_btn' href="javascript:;" >给一级渠道发平台币</a >
        &nbsp;&nbsp;
        <a class='btn btn-success give_sub_coin_btn' href="javascript:;" >给二级渠道发平台币</a >
        <!-- <a class='btn btn-success set_self_help_pay' href="javascript:;" >官方设置自助平台币充值时间段</a > -->
    </div >
    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width="50" >操作时间</th >
                <th width="50" >渠道等级</th >
                <th width="50" >收币渠道名称</th >
                <th width="50" >发放数量</th >
                <th width="50" >备注</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td >
                    <td ><?php echo ($vo["agent_type"]); ?></td >
                    <td ><?php echo ($vo["agent_name"]); ?></td >
                    <td ><?php echo ($vo["ptb_cnt"]); ?></td >
                    <td ><?php echo ($vo["remark"]); ?></td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($page); ?></div >
    </form >

    <div class="pop_up_form_div container" id='give_agent' style="display:none;" >
        <!--            <div class="row">
                        <div class="col-md-4">账号类型</div>
                        <div class="col-md-8">
                            <input type="radio" name="user_type" value="6" />一级渠道
                            <input type="radio" name="user_type" value="7" />二级渠道
                        </div>
                    </div>-->
        <div class="row" >
            <div class="col-md-4" >一级渠道名称</div >
            <div class="col-md-8" >
                <!--<input type="text" name="user_login" />-->
                <?php echo ($agent_select_Level_one); ?>
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >发放数量</div >
            <div class="col-md-8" >
                <input type="text" name="amount" />
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >备注</div >
            <div class="col-md-8" >
                <input type="text" name="remark" />
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >二级密码</div >
            <div class="col-md-8" >
                <input type="password" name="paypwd" />
            </div >
        </div >
        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn" id='agent_submit_btn' >确认</button >
        </div >
    </div >

    <div class="pop_up_form_div container" id='give_sub' style="display:none;" >
        <div class="row" >
            <div class="col-md-4" >二级渠道名称</div >
            <div class="col-md-8" >
                <!--<input type="text" name="user_login" />-->
                <?php echo ($agent_select_Level_two); ?>
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >发放数量</div >
            <div class="col-md-8" >
                <input type="text" name="amount" />
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >备注</div >
            <div class="col-md-8" >
                <input type="text" name="remark" />
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >二级密码</div >
            <div class="col-md-8" >
                <input type="password" name="paypwd" />
            </div >
        </div >
        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn" id='sub_submit_btn' >确认</button >
        </div >
    </div >

    <div class="pop_up_form_div container" id='self_pay' style="display:none;" >
        <div class="row" >
            <div class="col-md-12" >设置自助充值时间段</div >
        </div >
        <div class="row" >
            <div class="col-md-8" >
                开始时间： <input name="start_time" id="pay_start_time" type="text" placeholder="例如：9:00"
                             value="<?php echo ($pay_start_time); ?>" style="width: 110px;" autocomplete="off" >
            </div >
            <div class="col-md-8" >
                结束时间： <input name="end_time" id="pay_end_time" type="text" placeholder="例如：21:00"
                             value="<?php echo ($pay_end_time); ?>" style="width: 110px;" autocomplete="off" >
            </div >
        </div >
        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn" id='pay_submit_btn' >确认</button >
        </div >
    </div >

</div >
<script src="/public/js/common.js" ></script >
<script >

    $(".give_agent_coin_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "给一级渠道发平台币",
            content: $('#give_agent'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $(".give_sub_coin_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "给二级渠道发平台币",
            content: $('#give_sub'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $(".set_self_help_pay").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "设置自助充值平台币时间段",
            content: $('#self_pay'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $("#sub_submit_btn").click(function () {
        var id_txt   = "#give_sub ";
        var paypwd   = $(id_txt + "input[name='paypwd']").val();
        var agent_id = $(id_txt + "select[name='agent_id']").val();
        var amount   = $(id_txt + "input[name='amount']").val();
        var remark   = $(id_txt + "input[name='remark']").val();

        var url  = "<?php echo U('Tui/GiveCoin/sub');?>";
        var data = {"paypwd": paypwd, "agent_id": agent_id, "amount": amount, "remark": remark};

        $.post(url, data, function (res) {
            if (res.error === '0') {
                yxalert(res.msg);
                reload_delay();
            } else if (res.error === '1') {
                yxalert(res.msg);
            }
        });
    });
    $("#agent_submit_btn").click(function () {
        var id_txt   = "#give_agent ";
        var paypwd   = $(id_txt + "input[name='paypwd']").val();
        var agent_id = $(id_txt + "select[name='agent_id']").val();
        var amount   = $(id_txt + "input[name='amount']").val();
        var remark   = $(id_txt + "input[name='remark']").val();

        var url  = "<?php echo U('Tui/GiveCoin/agent');?>";
        var data = {"paypwd": paypwd, "agent_id": agent_id, "amount": amount, "remark": remark};

        $.post(url, data, function (res) {
            if (res.error === '0') {
                yxalert(res.msg);
                reload_delay();
            } else if (res.error === '1') {
                yxalert(res.msg);
            }
        });

    });

    $("#pay_submit_btn").click(function () {
        var start_time = $("#pay_start_time").val();
        var end_time   = $("#pay_end_time").val();

        var url  = "<?php echo U('Tui/AgentPtb/setPayTime');?>";
        var data = {"start_time": start_time, "end_time": end_time};

        $.post(url, data, function (res) {
            if (res.error === '0') {
                yxalert(res.msg);
                reload_delay();
            } else if (res.error === '1') {
                yxalert(res.msg);
            }
        });

    });
</script >
</body >
</html>