<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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
    <form class="well form-search" method="get" action="<?php echo U('Data/Pay/orderindex');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
					<span class="mr20" >
					订单号： 
					<input type="text" name="orderid" style="width: 150px;" value="<?php echo ($formget["orderid"]); ?>"
                           placeholder="请输入订单号..." >
					&nbsp;&nbsp; &nbsp;&nbsp; 

					游戏：
					<select class="select_2" name="gid" id="selected_id" style="width: 200px;" >
                        <?php if(is_array($games)): foreach($games as $k=>$vo): $gid_select=$k==$formget['gid'] ?"selected":""; ?>
                            <option value="<?php echo ($k); ?>" <?php echo ($gid_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                    </select >
					 &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
					 充值账号： 
					<input type="text" name="username"
                           style="width: 150px;" value="<?php echo ($formget["username"]); ?>"
                           placeholder="请输入账号..." >
						
					<br ><br >
					 父渠道：
                                         <?php echo ($parent_agent_select_with_official); ?>
                    <!--<input type="text" name="parent_agentname" style="width: 150px;" value="<?php echo ($formget["parent_agentname"]); ?>" placeholder="请输入父渠道账号...">-->
					 &nbsp;&nbsp;  &nbsp;&nbsp;
                    <!--					 注册渠道号：
                                        <input type="text" name="agentname" style="width: 150px;" value="<?php echo ($formget["agentname"]); ?>" placeholder="请输入注册渠道账号..."> -->
					
					渠道名称 ：	
                                        <?php echo ($agent_select_with_official); ?>
                    <!--<input type="text" name="agentnickname" style="width: 150px;" value="<?php echo ($formget["agentnickname"]); ?>" placeholder="请输入渠道名称...">-->
					</span >
						
					<span >
                                            <br ><br >
					充值方式：					
					<select class="select_2" name="payway" style="width: 150px;" id="selected_id" >
                        <option value="0" >全部</option >
                        <?php $pw_select="-1"==$formget['payway'] ?"selected":""; ?>
                        <option value="-1" <?php echo ($pw_select); ?> >第三方支付渠道</option >
                        <?php $pw_select="-2"==$formget['payway'] ?"selected":""; ?>
                        <option value="-2" <?php echo ($pw_select); ?> >非第三方支付渠道</option >
                        <?php if(is_array($payways)): foreach($payways as $k=>$vo): $pw_select=$k===$formget['payway'] ?"selected":""; ?>
                            <option value="<?php echo ($k); ?>" <?php echo ($pw_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                    </select >
					
					充值状态：	
					<select class="select_2" name="paystatus" style="width: 150px;" id="selected_id" >
                        <?php if(is_array($paystatuss)): foreach($paystatuss as $k=>$vo): $ps_select=$k==$formget['paystatus'] ?"selected":""; ?>
                            <option value="<?php echo ($k); ?>" <?php echo ($ps_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                    </select >
					&nbsp;&nbsp;&nbsp;&nbsp;
					回调状态 
					<select class="select_2" name="cpstatus" style="width: 200px;" id="selected_id" >
                        <?php if(is_array($cpstatuss)): foreach($cpstatuss as $k=>$vo): $ps_select=$k==$formget['cpstatus'] ?"selected":""; ?>
                            <option value="<?php echo ($k); ?>" <?php echo ($ps_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                    </select >
					&nbsp;&nbsp;&nbsp;&nbsp; 
					<br ><br >
				时间：
					<input type="text" name="start_time"
                           class="js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" placeholder="开始时间..."
                           style="width: 100px;" autocomplete="off" >
					- 
					<input type="text" class="js-date" name="end_time" placeholder="时间..."
                           value="<?php echo ($formget["end_time"]); ?>" style="width: 100px;"
                           autocomplete="off" > &nbsp; &nbsp;
					</span >

                <input type="submit" name='submit' class="btn btn-warning" value="今日" />
                <input type="submit" name='submit' class="btn btn-warning" value="昨日" />
                &nbsp; &nbsp;
                <input type="submit" name='submit' class="btn btn-warning" value="本周" />
                <input type="submit" name='submit' class="btn btn-warning" value="上周" />
                &nbsp; &nbsp;
                <input type="submit" name='submit' class="btn btn-warning" value="本月" />
                <input type="submit" name='submit' class="btn btn-warning" value="上月" />
                &nbsp; &nbsp;
                <input type="submit" name='submit' class="btn btn-primary" id='search_btn_default' value="搜索" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo \Huosdk\UI\Pieces::export_excel(); ?>
                <!--<a href="<?php echo U('Data/Pay/export');?>" class="btn btn-success" style='float:right;'>导出数据为EXCEL文件</a>-->
            </div >
        </div >
    </form >
    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th >订单号</th >
                <th >时间</th >
                <th >账号</th >
                <th >游戏</th >
                <th >金额</th >

                <th >实收金额</th >

                <th >充值方式</th >

                <th >父渠道</th >

                <th >渠道名称</th >

                <!--<th>回调状态</th>-->
                <th >状态</th >
                <th >操作</th >
            </tr >
            </thead >

            <tr >
                <th style='color:#FF0000' >汇总</th >
                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' ><?php echo ($sums); ?></th >
                <th style='color:#FF0000' ><?php echo ($realsum); ?></th >

                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' >--</th >
                <th style='color:#FF0000' >--</th >
                <!--<th style='color:#f00'>--</th>-->
                <th style='color:#FF0000' >--</th >
                <!--<th style='color:#f00'>--</th>-->
            </tr >

            <?php if(is_array($orders)): foreach($orders as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["order_id"]); ?></td >
                    <td ><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td >
                    <td ><?php echo ($vo["username"]); ?></td >
                    <td ><?php echo ($vo["gamename"]); ?></td >
                    <td ><?php echo ($vo["amount"]); ?></td >
                    <td ><?php echo ($vo["real_amount"]); ?></td >

                    <td >
                        <?php if( '0' == $vo["payway"] OR '' == $vo["payway"] ): ?>该订单还未支付
                            <?php else: ?>
                            <?php echo ($payways[$vo['payway']]); endif; ?>
                    </td >
                    <!--<td><?php echo ($vo['parent_agentname']); ?></td>-->
                    <td ><?php echo ($vo['parent_agentname']); ?></td >

                    <!--                                    <td>
                                                            <?php if( 0 == $vo['agent_id'] ): ?><span style='color:#000'>default</span>
                                                                <?php else: ?>
                                                                    <span style='color:#000'><?php echo ($vo['agentname']); ?></span><?php endif; ?>
                                                        </td>-->

                    <td >
                        <?php if( 0 == $vo['agent_id'] ): ?><span style='color:#000000' >官包</span >
                            <?php else: ?>
                            <span style='color:#000000' ><?php echo ($vo["agentnickname"]); ?></span ><?php endif; ?>
                    </td >
                    <!--                                    <td>
                                                            <?php if( 2 == $vo['cpstatus'] ): ?><span style='color:#f00'>回调成功</span>
                                                                <?php elseif( ( 2 == $vo['status'] ) and ( 1 == $vo['cpstatus'] OR 3 == $vo['cpstatus']) ): ?>
                                                                    <span style='color:#00f'>回调失败</span>
                                                                <?php else: ?>
                                                                    <span style='color:#000'>待支付</span><?php endif; ?>
                                                        </td>-->
                    <td >
                        <?php if( 2 == $vo["status"] ): ?><span style='color:#FF0000' >成功</span >
                            <?php elseif( 3 == $vo.status): ?>
                            <span style='color:#0000FF' >失败</span >
                            <?php else: ?>
                            <span style='color:#000000' >待支付</span ><?php endif; ?>
                    </td >
                    <td >
                        <?php if( ( 2 == $vo["status"] ) and ( 1 == $vo['cpstatus'] OR 3 == $vo['cpstatus']) ): ?><a href="<?php echo U('Data/Pay/repairorder', array('orderid'=>$vo['order_id']));?>"
                               class="js-ajax-dialog-btn" data-msg="您确定要补单吗？" >补单</a >
                    </td ><?php endif; ?>
                    </td>
                </tr ><?php endforeach; endif; ?>

        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >
        <div >共<?php echo ($total_rows); ?>条记录</div >

    </form >
</div >
<script src="/public/js/common.js" ></script >
<script >
    $(".form-search select").change(function () {
        $("#search_btn_default").click();
    });
</script >
</body >
</html>