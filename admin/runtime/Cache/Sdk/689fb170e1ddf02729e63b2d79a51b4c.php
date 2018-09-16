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
    .fieled_info {
        color: red;
        margin-left: 180px;
        margin-top: 10px;
        width: 100%;
        float: left;
    }
</style >
</head>
<body class="J_scroll_fixed" >
<?php $luxury_yes=$is_luxury==2?"checked":""; $luxury_no=$is_luxury!=2?"checked":""; $rmd_yes=$is_rmd==2?"checked":""; $rmd_no=$is_rmd!=2?"checked":""; $hot_yes=$is_hot==2?"checked":""; $hot_no=$is_hot!=2?"checked":""; ?>
<div class="wrap jj" >
    <ul class="nav nav-tabs" >
        <li ><a href="<?php echo U('Gift/giftList');?>" >礼包列表</a ></li >
        <li class="active" ><a href="#" target="_self" >编辑礼包</a ></li >
    </ul >
    <div class="common-form" >
        <form method="post" class="form-horizontal js-ajax-form" action="<?php echo U('Gift/edit_post');?>" >
            <fieldset >
                <div class="control-group" >
                    <label class="control-label" >游戏:</label >
                    <div class="controls" >
                        <label class="control-label" style="text-align:left" ><?php echo ($games[$app_id]); ?></label >
                    </div >
                </div >

                <div class="control-group" >
                    <label class="control-label" >礼包标题:</label >
                    <div class="controls" >
                         <label class="control-label" style="text-align:left" ><?php echo ($title); ?></label >
                    
					</div >
                </div >        
<?php if(1 == C('G_NEW_APP')): ?><div class="control-group" >
                    <label class="control-label" >所需积分:</label >
                    <div class="controls" >
                        <input type="number" class="input" name="condition" value="<?php echo ($condition); ?>" min="0" ste="1"
                               onkeyup="clearNoNum(this,0,0)" onafterpaste="clearNoNum(this,0,0)"
                               placeholder="请输入所需积分" >
                        <span style="color:red" >填入领取礼包所需积分 0 表示不需要免费礼包</span >
                    </div >
                 </div ><?php endif; ?>
                <div class="control-group" >
                    <label class="control-label" >已有礼包码:</label >
                    <div class="controls" >
                        <textarea id="code" name="code" rows="3" cols="75"
                                  style="width:50%;background:none;color:#333333;border:1px solid #CCCCCC;"
                                  readonly ><?php echo ($code); ?></textarea >
                        <!--<button id="add_more" class="btn btn-success">+添加礼包码</button>-->
                    </div >

                </div >
                <div class="control-group" >
                    <label class="control-label" >添加礼包码:</label >
                    <div class="controls" >
                        <textarea id="code_more" name="code_more" rows="6" cols="75"
                                  style="resize:none;width:50%;" ></textarea >
								   <span style="color:red" >注意：每行一个礼包码，请保证礼包码输入正确</span >
                        <!--<button id="add_more" class="btn btn-success">+添加礼包码</button>-->
                    </div >
                </div >

                <div class="control-group" >
                    <label class="control-label" >礼包内容:</label >
                    <div class="controls" >
                        <textarea class="form-control comment-postbox" name="content"
                                  style="width: 50%;" ><?php echo ($content); ?></textarea >
                        <span style="color:red" >请输入该礼包所包含的物品内容</span >
                    </div >
                </div >
                <div class="control-group" >
                    <label class="control-label" >使用方法:</label >
                    <div class="controls" >
                        <textarea class="form-control comment-postbox" name="func" rows="3" cols="75"
                                  style="width: 50%;" ><?php echo ($func); ?></textarea >
                        <span style="color:red" >请输入该礼包使用方法</span >
                    </div >
                </div >
                <div class="control-group" >
                    <label class="control-label" >兑换期限:</label >
                    <div class="controls" >
                        <input type="text" name="starttime" class="js-datetime"
                               value="<?php echo date('Y-m-d H:i:s',$start_time);?>" style="width: 150px;" autocomplete="off" >--
                        <input type="text" class="js-datetime" name="endtime" value="<?php echo date('Y-m-d H:i:s',$end_time);?>"
                               style="width: 150px;" autocomplete="off" > &nbsp; &nbsp;
                        <span style="color:red" >请选择该礼包的兑换时间期限，确保此期限内礼包兑换在有效期内</span >
					</div >
                </div >
<?php if(1 == C('G_NEW_APP')): ?><div class="control-group" >
                    <label class="control-label" >是否推荐:</label >
                    <div class="controls" >
                         <label class="radio inline" > <input type="radio" name="rmd" value="1" <?php echo ($rmd_no); ?> >不推荐
                            </label >
                            <label class="radio inline" > <input type="radio" name="rmd" value="2" <?php echo ($rmd_yes); ?> >推荐
                            </label >
                    </div >
                </div >
                <div class="control-group" >
                    <label class="control-label" >是否豪华礼包:</label >
                    <div class="controls" >
                         <label class="radio inline" > <input type="radio" name="luxury" value="1" <?php echo ($luxury_no); ?> >普通
                            </label >
                            <label class="radio inline" > <input type="radio" name="luxury" value="2" <?php echo ($luxury_yes); ?> >豪华
                            </label >
                    </div >
                </div >
                <div class="control-group" >
                    <label class="control-label" >是否热门礼包:</label >
                    <div class="controls" >
                         <label class="radio inline" > <input type="radio" name="hot" value="1" <?php echo ($hot_no); ?> >不热门
                            </label >
                            <label class="radio inline" > <input type="radio" name="hot" value="2" <?php echo ($hot_yes); ?> >热门
                            </label >
                    </div >
                </div ><?php endif; ?>
			<div class="control-group" >
                    <label class="control-label" >人气:</label >
                    <div class="controls" >
                        <input type="text" name="hits_cnt" class="form-control comment-postbox" value="<?php echo ($hits_cnt); ?>" style="width: 100px;">
                        <span style="color:red" >人气高优先显示在官网首页 </span >
                    </div >

                </div >
            </fieldset >
            <div class="form-actions" >
                <input type="hidden" name="id" value="<?php echo ($id); ?>" />
                <button type="submit"
                        class="btn btn-primary btn_submit js-ajax-submit" >更新
                </button >
                <a class="btn" href="<?php echo U('Gift/giftList');?>" >返回</a >
            </div >
        </form >

        <div class="more_code_list" style="display:none" >

    </div >
</div >
<script src="/public/js/common.js" ></script >
<script >
    //            $("#code_more").change();
    function show_add_items_list() {
        var code = $("#code_more").val();
        code     = code.replace(/\n/g, "<br />")
        $('.more_code_list').html(code);
        layer.open({
            type   : 1,
            shift  : 7,
            area   : '350px',
            title  : "添加礼包码",
            content: $('.more_code_list'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    }
</script >
</body >
</html>