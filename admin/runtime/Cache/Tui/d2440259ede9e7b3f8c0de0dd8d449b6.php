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
</head>
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Tui/Settle/check');?>" target="_self" >提现审核</a ></li >
    </ul >
    <form class="well form-search" method="get" action='/admin.php/Tui/Settle/check/menuid/286.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                    <span class="mr20" >
                        渠道账号：
                        <?php echo ($agent_select); ?>
                        &nbsp;&nbsp; 
                        <input type="submit" class="btn btn-primary" value="搜索" />
                    </span >
            </div >
        </div >
    </form >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width="20" >ID</th >
                <th width="50" >渠道名</th >
                <th width="50" >联系人</th >
                <th width="50" >qq</th >
                <th width="50" >电话</th >
                <th width="50" >金额</th >
                <th width="50" >银行名称</th >
                <th width="50" >支行名</th >
                <th width="50" >提现帐号</th >
                <th width="50" >持卡人</th >
                <!--<th width="50">提现方式</th>-->

                <th width="50" >申请时间</th >
                <!--<th width="50">财务审核时间</th>-->
                <!--<th width="50">结算时间</th>-->

                <th width="50" >状态</th >
                <th width="60" >审核操作</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["id"]); ?></td >
                    <td ><?php echo ($vo["user_login"]); ?></td >
                    <td ><?php echo ((isset($vo["linkman"]) && ($vo["linkman"] !== ""))?($vo["linkman"]):$vo['d_linkman']); ?></td >
                    <td ><?php echo ($vo["qq"]); ?></td >
                    <td ><?php echo ($vo["mobile"]); ?></td >
                    <td ><?php echo ($vo["money"]); ?></td >
                    <td ><?php echo ((isset($vo["bankname"]) && ($vo["bankname"] !== ""))?($vo["bankname"]):$vo['d_bankname']); ?></td >
                    <td ><?php echo ((isset($vo["branchname"]) && ($vo["branchname"] !== ""))?($vo["branchname"]):$vo['d_branchname']); ?></td >
                    <td ><?php echo ((isset($vo["banknum"]) && ($vo["banknum"] !== ""))?($vo["banknum"]):$vo['d_banknum']); ?></td >
                    <td ><?php echo ((isset($vo["cardholder"]) && ($vo["cardholder"] !== ""))?($vo["cardholder"]):$vo['d_linkman']); ?></td >
                    <!--                        <td>
                                                <?php switch($vo["payway"]): case "zfb": ?>支付宝<?php break;?>
                                                    <?php case "bank": ?>银行卡<?php break; endswitch;?>
                                            </td>-->
                    <td ><?php echo ($vo["create_time_txt"]); ?></td >
                    <!--<td><?php echo ($vo["check_time_txt"]); ?></td>-->
                    <!--<td><?php echo ($vo["settle_time_txt"]); ?></td>-->
                    <td ><?php echo ($vo["settle_status_txt"]); ?></td >
                    <td >
                        <?php switch($vo["status"]): case "2": ?><a href="<?php echo U('Tui/Settle/pass',array('id'=>$vo['id']));?>"
                                   class="js-ajax-dialog-btn" data-msg="确定要设为审核通过吗？" >通过</a > |
                                <a href="<?php echo U('Tui/Settle/notpass',array('id'=>$vo['id']));?>"
                                   class="js-ajax-dialog-btn" data-msg="确定要设为审核不通过吗？" >不通过</a ><?php break;?>
                            <!--                                <?php case "2": ?><a href="<?php echo U('Tui/Settle/giveMoney',array('id'=>$vo['id']));?>"
                                                                   class="js-ajax-dialog-btn"  data-msg="确定要标记为已打款吗？" >打款</a><?php break;?>--><?php endswitch;?>
                    </td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >
    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>