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

    .pop_up_form_div input {
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
        <li class="active" ><a href="#" target="_self" >渠道平台币扣回记录</a ></li >
        <li ><a href="<?php echo U('Tui/AgentPtb/official_deduct_member');?>" target="_self" >玩家清风币扣回记录</a ></li >
    </ul >
    <form class="well form-search" method="get" action='/admin.php/Tui/AgentPtb/official_deduct/menuid/266.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                    <span class="mr20" >
                        渠道名称：
                        <?php echo ($agent_select); ?>
                        <input type="submit" class="btn btn-primary" value="搜索" />                        
                    </span >
            </div >
        </div >
    </form >
    <div class='funcs' >
        <a class='btn btn-success give_coin_btn' href="javascript:;" >渠道平台币扣回</a >
    </div >
    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width="50" >操作时间</th >
                <th width="50" >渠道名称</th >
                <th width="50" >扣回数量</th >
                <th width="50" >备注</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td >
                    <td ><?php echo ($vo["agent_name"]); ?></td >
                    <td ><?php echo ($vo["backptb_cnt"]); ?></td >
                    <td ><?php echo ($vo["remark"]); ?></td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($page); ?></div >
    </form >

    <div class="pop_up_form_div container" style="display:none;" >
        <div class="row" >
            <div class="col-md-4" >渠道名称</div >
            <div class="col-md-8" >
                <!--<input type="text" name="user_login" />-->
                <?php echo ($agent_select); ?>
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >平台币余额</div >
            <div class="col-md-8" >
                <input type="text" name="ptb_remain" disabled="disabled" />
            </div >
        </div >
        <div class="row" >
            <div class="col-md-4" >扣回数量</div >
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
            <button class="btn btn-success pop_up_form_submit_btn" >确认</button >
        </div >
    </div >
</div >
<script src="/public/js/common.js" ></script >
<script >

    $(".give_coin_btn").click(function () {

        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "渠道平台币扣回",
            content: $('.pop_up_form_div'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $(".pop_up_form_submit_btn").click(function () {
        var paypwd     = $("input[name='paypwd']").val();
        var agent_id   = $(".pop_up_form_div select[name='agent_id']").val();
        var amount     = $("input[name='amount']").val();
        var remark     = $("input[name='remark']").val();
        var ptb_remain = $("input[name='ptb_remain']").val();

        // 这里要加上parseInt，不然可能比较的是字符串，那样就算余额充足也会说余额不足
        // 需要parseFloat
        // 2016-12-21 18:00:45
        // 严旭
        if (parseFloat(ptb_remain) < parseFloat(amount)) {
            yxalert("渠道用户账户余额不足");
            return;
        }

        var data = {"paypwd": paypwd, "agent_id": agent_id, "amount": amount, "remark": remark};
        var url  = "<?php echo U('Tui/AgentPtb/deduct_agent_post');?>";
        $.post(url, data, function (data) {
            yxalert(data.msg);
            if (data.error === '0') {
                reload_delay();
            }
        });
    });

    $(".pop_up_form_div select[name='agent_id']").change(function () {
        var agent_id = $(".pop_up_form_div select[name='agent_id']").val();
        get_remain(agent_id);
    });

    function get_remain(agent_id) {
        var url = "<?php echo U('Tui/Api/getAgentPtbRemain');?>";
        $.post(url, {"agent_id": agent_id}, function (data) {
            if (data.error === '0') {
                $("input[name='ptb_remain']").val(data.msg);
            } else if (data.error === '1') {
                yxalert(data.msg);
            }
        });
    }

</script >
</body >
</html>