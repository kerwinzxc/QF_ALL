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
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Gift/giftList');?>" >礼包列表</a ></li >
    </ul >

    <form class="well form-search" method="get" action="<?php echo U('Gift/giftList');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
					<span class="mr20" >
					    	 礼包名： 
						<input type="text" name="title" style="width: 200px;" value="<?php echo ($title); ?>" placeholder="请输入礼包名..." >
						&nbsp;&nbsp;
						游戏： 
						<select class="select_2" name="appid" id="selected_id" >
                            <?php if(is_array($games)): foreach($games as $k=>$vo): $g_select=$k==$appid ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($g_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >
						&nbsp;&nbsp;
						<input type="submit" class="btn btn-primary" value="搜索" />
					</span >
            </div >
        </div >
    </form >
    <button class="btn btn-success" onclick="location.href='<?php echo U('Gift/add');?>'" style="margin:10px 0;" >添加礼包</button >
    <form class="js-ajax-form" action="" method="post" >
        <?php if(1 == C('G_NEW_APP')): ?><div class="table-actions" >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/luxury',array('is_luxury'=>2));?>" data-subcheck="true" >豪华
            </button >
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/luxury',array('is_luxury'=>1));?>" data-subcheck="true" >取消豪华
            </button >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/hot',array('is_hot'=>2));?>" data-subcheck="true" >热门
            </button >
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/hot',array('is_hot'=>1));?>" data-subcheck="true" >取消热门
            </button >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/recommend',array('is_rmd'=>2));?>" data-subcheck="true" >推荐</button >
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/recommend',array('is_rmd'=>1));?>"
                    data-subcheck="true" >取消推荐</button >
        </div ><?php endif; ?>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/hot',array('is_hot'=>2));?>" data-subcheck="true" >热门
            </button >
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Sdk/Gift/hot',array('is_hot'=>1));?>" data-subcheck="true" >取消热门
            </button >

        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                 <th width="15" ><label >
                     <input type="checkbox" class="js-check-all" data-direction="x"
                            data-checklist="js-check-x" ></label ></th >
                <th >创建时间</th >
                <th >礼包名</th >
                <th >游戏名</th >
                <th >兑换开始时间</th >
                <th >兑换结束时间</th >
                <?php if(1 == C('G_NEW_APP')): ?><th >状态</th ><?php endif; ?>
				<th >状态</th >
                <th >剩余数量/总数</th >
                <th width="150" >管理操作</th >
            </tr >
            </thead >

            <?php if(is_array($giftlist)): foreach($giftlist as $key=>$vo): ?><tr >
                      <td ><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x"
                                  name="ids[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>" ></td >
                    <td ><?php echo date('Y年m月d日 H:i',$vo['create_time']);?></td >
                    <td ><?php echo ($vo["title"]); ?></td >
                    <td ><?php echo ($games[$vo['app_id']]); ?></td >
                    <td ><?php echo date('Y年m月d日 H:i',$vo['start_time']);?></td >
                    <td ><?php echo date('Y年m月d日 H:i',$vo['end_time']);?></td >
                    <?php if(1 == C('G_NEW_APP')): ?><td >
                        <?php if(($vo["is_luxury"]) == "2"): ?><a data-toggle="tooltip" title="豪华" ><i class="fa fa-check" ></i ></a >
                            <?php else: ?>
                            <a data-toggle="tooltip" title="非豪华" ><i class="fa fa-close" style="color:gray" ></i ></a ><?php endif; ?>
                        <?php if(($vo["is_hot"]) == "2"): ?><a data-toggle="tooltip" title="热门" ><i class="fa fa-arrow-up" ></i ></a >
                            <?php else: ?>
                            <a data-toggle="tooltip" title="非热门" ><i class="fa fa-arrow-down" style="color:gray" ></i ></a ><?php endif; ?>
                        <?php if(($vo["is_rmd"]) == "2"): ?><a data-toggle="tooltip" title="已推荐" ><i class="fa fa-thumbs-up" ></i ></a >
                            <?php else: ?>
                            <a data-toggle="tooltip" title="未推荐" ><i class="fa fa-thumbs-down" style="color:gray" ></i ></a ><?php endif; ?>
                    </td ><?php endif; ?>
					<td >
					<?php if(($vo["is_hot"]) == "2"): ?><a data-toggle="tooltip" title="热门" ><i class="fa fa-arrow-up" ></i ></a >
                            <?php else: ?>
                            <a data-toggle="tooltip" title="非热门" ><i class="fa fa-arrow-down" style="color:gray" ></i ></a ><?php endif; ?>
                    </td >
                    <td ><?php echo ($vo["remain"]); ?>/<?php echo ($vo["total"]); ?></td >
                    <td >
                        <a href="<?php echo U('Gift/edit',array('id'=>$vo['id']));?>" >修改</a >
                        <a href="<?php echo U('Gift/del',array('id'=>$vo['id']));?>" class="js-ajax-delete" >删除</a ></td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >
    </form >
</div >
<script src="/public/js/common.js" ></script >
<script >
    $(function () {

        $("#navcid_select").change(function () {
            $("#mainform").submit();
        });

    });
</script >
</body >
</html>