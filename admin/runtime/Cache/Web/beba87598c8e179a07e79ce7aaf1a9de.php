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
<body >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
		<li class="active"><a href="<?php echo U('Hotkey/index');?>">热词设置</a></li>
		<!-- <li class="active"><a href="<?php echo U('Hotkey/add');?>">添加热词</a></li> -->
    </ul >
    <form action="<?php echo U('Hotkey/editPost');?>" method="post" class="form-horizontal js-ajax-forms"
          enctype="multipart/form-data" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr>
                        <th>热词一</th >
                        <td >
                            <input type="text" name="key_one" value="<?php echo ($items['key_one']); ?>" placeholder="热词一" />
                        </td >
                    </tr>
					<tr>
                        <th>热词二</th >
                        <td >
                            <input type="text" name="key_two" value="<?php echo ($items['key_two']); ?>" placeholder="热词二" />
                        </td >
                    </tr>
					<tr>
                        <th>热词三</th >
                        <td >
                            <input type="text" name="key_three" value="<?php echo ($items['key_three']); ?>" placeholder="热词三" />
                        </td >
                    </tr>
					<tr>
                        <th>热词四</th >
                        <td >
                            <input type="text" name="key_four" value="<?php echo ($items['key_four']); ?>" placeholder="热词四" />
                        </td >
                    </tr>
					
                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >修改</button >
        </div >
    </form >
</div >
<script type="text/javascript" src="/public/js/common.js" ></script >

</body >
</html>