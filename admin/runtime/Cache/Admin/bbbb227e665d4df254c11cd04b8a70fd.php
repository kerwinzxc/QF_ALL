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
        <li ><a href="<?php echo U('Admin/SlideMultiImage/index',array('cat_name'=>$catname));?>" ><?php echo L('ADMIN_SLIDE_INDEX');?></a ></li >
        <!--<li ><a href="<?php echo U('Admin/SlideMultiImage/add',array('cat_name'=>$catname));?>" ><?php echo L('ADMIN_SLIDE_ADD');?></a ></li >-->
        <li class="active" ><a href="/admin.php/Admin/SlideMultiImage/edit/id/86/cat_name/indexrecmd.html" >编辑</a ></li >
    </ul >
    
    <form action="<?php echo U('Admin/SlideMultiImage/edit_post');?>" method="post" class="form-horizontal js-ajax-forms"
          enctype="multipart/form-data" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr >
                        <th width="80" >分类</th >
                        <td >
                            <select name="slide_cid" id="slide_cid">
                                <?php if(is_array($categorys)): foreach($categorys as $key=>$vo): $cid_selected=$slide_cid==$vo['cid']?"selected":""; ?>
                                    <option value="<?php echo ($vo["cid"]); ?>" <?php echo ($cid_selected); ?> ><?php echo ($vo["cat_name"]); ?></option ><?php endforeach; endif; ?>
                            </select >
                        </td >
                    </tr >

                    <!--<tr >
                        <th width="80" >目标类型</th >
                        <td >
                            <input type="radio" name="type_id" value="1" checked="checked" />链接
                            <input type="radio" name="type_id" value="2" />游戏
                            <input type="radio" name="type_id" value="3" />礼包
                            <input type="radio" name="type_id" value="4" />代金卷
                        </td >
                    </tr >-->



                    <!--<tr class="target_content_area" >
                            <th >链接</th >
                            <td ><input type="text" name="slide_url" value="<?php echo ($slide_url); ?>" style="width: 400px" ></td >
                        </tr >-->

                    <input type="hidden" name="type_id" value="2" />
                        <tr class="target_content_area" >
                            <th width="80" >游戏</th >
                            <td >
                                <?php echo ($app_select_area); ?>

                            </td >
                        </tr >
                    <!--<tr class="target_content_area" style="display:none;" >
                        <th width="80" >礼包</th >
                        <td >
                            <?php echo ($gift_select_area); ?>
                        </td >
                    </tr >
                     <tr class="target_content_area" style="display:none;" >
                        <th width="80" >代金卷</th >
                        <td >
                            <?php echo ($coupon_select_area); ?>
                        </td >
                    </tr >-->

                <tr >
                    <th width="80" >标题</th >
                    <td >
                        <input type="text" style="width: 400px;" name="slide_name" value="<?php echo ($slide_name); ?>"
                               placeholder="请输入轮播标题" />
                        <input type="hidden" name="slide_id" value="<?php echo ($slide_id); ?>" />
                    </td >
                </tr >
            </table >
        </div >
        <div class="span3" >
            <table class="table table-bordered" >
                    <tr >
                        <th >广告图 <p id="gimage">(宽高比=2:1  推荐<?php echo ($pic_size); ?>)</p ></th >
                    </tr >
                    <tr >
                        <td >
                            <div style="text-align: center;" >
                                <input type="hidden" name="slide_pic" id="thumb" value="<?php echo ($slide_pic); ?>" >
                                 <a href="javascript:upload_one_image('图片上传','#thumb');" >
                                    <?php if(empty($slide_pic)): ?><img src="/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                             width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="<?php echo ($slide_pic); ?>" id="thumb-preview" width="135"
                                             style="cursor: hand" /><?php endif; ?>
                                </a >
                                <input type="button" class="btn btn-small"
                                       onclick="$('#thumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                       value="取消图片" >
                            </div >
                        </td >
                </tr >
            </table >
        </div >
    </div >
    <div class="form-actions" >
        <button class="btn btn-primary js-ajax-submit" type="submit" >提交</button >
        <a class="btn" href="<?php echo U('Admin/SlideMultiImage/index',array('cat_name'=>$catname));?>" >返回</a >
    </div >
</form >
</div >
<script type="text/javascript" src="/public/js/common.js" ></script >
<script type="text/javascript" src="/public/js/content_addtop.js" ></script >
<script type="text/javascript" >

$("#slide_cid").change(function () {
    var index = $("#slide_cid").val();
    $.ajax({
        type:'POST',
        url:"<?php echo U('Admin/SlideMultiImage/imagedesc');?>",
        data: {cid:index},
        dataType:"json",
        success: function(data){
            $("#gimage").empty();
            $("#gimage").append(data.msg);
        },
        error: function(){
            alert("网络异常");
        }
    });

});

$("input[name='type_id']").change(function () {
var index = $(this).index();
$(".target_content_area").hide();
$(".target_content_area").eq(index).show();

$(".target_content_area").eq(1).children("td").children("select").attr("name", "app_id");
$(".target_content_area").eq(2).children("td").children("select").attr("name", "gift_id");
$(".target_content_area").eq(3).children("td").children("select").attr("name", "coupon_id");

$(".target_content_area").eq(index).children("td").children("select").attr("name", "target_id");
});

var type_id = "<?php echo ($type_id); ?>";
console.log(type_id);
if (type_id >= 2) {
$("input[name='type_id']").eq(type_id - 1).click();
}

$(function () {
$(".js-ajax-close-btn").on('click', function (e) {
    e.preventDefault();
    Wind.use("artDialog", function () {
        art.dialog({
            id        : "question",
            icon      : "question",
            fixed     : true,
            lock      : true,
            background: "#CCCCCC",
            opacity   : 0,
            content   : "您确定需要关闭当前页面嘛？",
            ok        : function () {
                setCookie("refersh_time", 1);
                window.close();
                return true;
            }
        });
    });
});
/////---------------------
Wind.use('validate', 'ajaxForm', 'artDialog', function () {
    //javascript

    var form = $('form.js-ajax-forms');
    //ie处理placeholder提交问题
    if ($.browser.msie) {
        form.find('[placeholder]').each(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        });
    }
    //表单验证开始
    form.validate({
        //是否在获取焦点时验证
        onfocusout   : false,
        //是否在敲击键盘时验证
        onkeyup      : false,
        //当鼠标掉级时验证
        onclick      : false,
        //验证错误
        showErrors   : function (errorMap, errorArr) {
            //errorMap {'name':'错误信息'}
            //errorArr [{'message':'错误信息',element:({})}]
            try {
                $(errorArr[0].element).focus();
                art.dialog({
                    id        : 'error',
                    icon      : 'error',
                    lock      : true,
                    fixed     : true,
                    background: "#CCCCCC",
                    opacity   : 0,
                    content   : errorArr[0].message,
                    cancelVal : '确定',
                    cancel    : function () {
                        $(errorArr[0].element).focus();
                    }
                });
            } catch (err) {
            }
        },
        //验证规则
        rules        : {
            'slide_name': {
                required: 1
            }
        },
        //验证未通过提示消息
        messages     : {
            'slide_name': {
                required: '请输入名称'
            }
        },
        //给未通过验证的元素加效果,闪烁等
        highlight    : false,
        //是否在获取焦点时验证
        onfocusout   : false,
        //验证通过，提交表单
        submitHandler: function (forms) {
            $(forms).ajaxSubmit({
                url         : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                dataType    : 'json',
                beforeSubmit: function (arr, $form, options) {

                },
                success     : function (data, statusText, xhr, $form) {
                    if (data.status) {
                        setCookie("refersh_time", 1);
                        //添加成功
                        Wind.use("artDialog", function () {
                            art.dialog({
                                id        : "succeed",
                                icon      : "succeed",
                                fixed     : true,
                                lock      : true,
                                background: "#CCCCCC",
                                opacity   : 0,
                                content   : data.info,
                                button    : [{
                                    name    : '继续编辑？',
                                    callback: function () {
                                        reloadPage(window);
                                        return true;
                                    },
                                    focus   : true
                                }, {
                                    name    : '返回列表',
                                    callback: function () {
                                        location.href = "<?php echo U('Admin/SlideMultiImage/index',array('cat_name'=>$catname));?>";
                                        return true;
                                    }
                                }]
                            });
                        });
                    } else {
                        isalert(data.info);
                    }
                }
            });
        }
    });
});
////-------------------------
});
</script >
</body >
</html>