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
<style type="text/css" >
    .pic-list li {
        margin-bottom: 5px;
    }
</style >

<script type="text/html" id="photos-item-wrapper" >
    <li id="savedimage{id}" >
        <input id="photo-{id}" type="hidden" name="photos_url[]" value="{filepath}" >
        <input id="photo-{id}-name" type="text" name="photos_alt[]" value="{name}" style="width: 160px;" title="图片名称" >
        <img id="photo-{id}-preview" src="{url}" style="height:36px;width: 36px;"
             onclick="javascript:image_priview(this.src)" />
        <a href="javascript:upload_one_image('图片上传','#photo-{id}');" >替换</a >
        <a href="javascript:(function(){$('#savedimage{id}').remove();})();" >移除</a >
    </li >
</script >

</head>
<body >
<div class="wrap js-check-wrap" >
    <form action="<?php echo U('Core/Game/edit_post');?>" method="post"
          class="form-horizontal js-ajax-forms" enctype="multipart/form-data" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr >
                        <th >游戏名称</th >
                        <td ><span class="form-required" ><?php echo ($game["name"]); ?></span ></td >
                        <input type="hidden" name="appid" id="appid" value="<?php echo ($game["id"]); ?>" >
                    </tr >
                    <tr >
                        <th width="80" >游戏类型</th >
                        <td >
                            <?php if(is_array($gameparenttypes)): foreach($gameparenttypes as $k=>$v): ?><label class="checkbox inline" >
                                    <?php $type_id_checked=in_array($k,$type_ids)?"checked":""; ?>
                                    <input value="<?php echo ($k); ?>" type="checkbox" name="pgtype[]" <?php echo ($type_id_checked); ?> ><?php echo ($v); ?>
                                </label ><?php endforeach; endif; ?>
                        </td >
                    </tr >
                    <tr >
                        <th width="80" >游戏标签</th >
                        <td id="typetd">
                            <?php if(is_array($gametypes)): foreach($gametypes as $k=>$v): ?><label class="checkbox inline" >
                                    <?php $type_id_checked=in_array($k,$type_ids)?"checked":""; ?>
                                    <input value="<?php echo ($k); ?>" type="checkbox" name="gtype[]" <?php echo ($type_id_checked); ?> ><?php echo ($v); ?>
                                </label ><?php endforeach; endif; ?>
                        </td >
                    </tr >
                    <tr >
                        <th >游戏宣传语</th >
                        <td ><textarea name="oneword" id="oneword" style="width: 60%; height: 50px;"
                                       placeholder="请输入游戏宣传语" ><?php echo ($gameinfo["publicity"]); ?></textarea >
                            *70字以内
                        </td >
                    </tr >
                    <tr >
                        <th >游戏简介</th >
                        <td ><textarea name="description" id="description" style="width: 98%; height: 50px;"
                                       placeholder="请填写游戏简介" ><?php echo ($gameinfo["description"]); ?></textarea >
                        </td >
                    </tr >
                    <?php if(($has_and) == "1"): ?><tr >
                            <th >安卓下载地址</th >
                            <td ><textarea name="androidurl" id="androidurl" style="width: 98%; height: 50px;"
                                           placeholder="请填写下载地址" ><?php echo ($gameinfo["androidurl"]); ?></textarea >
                            </td >
                        </tr >
                        <tr >
                            <th >安卓适用系统</th >
                            <td ><input type="text" name="adxt" id="adxt" value="<?php echo ($gameinfo["adxt"]); ?>" style="width: 400px"
                                        placeholder="请填写安卓适用环境" >*最低适用版本, 例如 4.0以上
                            </td >
                        </tr ><?php endif; ?>
                    <?php if(($has_ios) == "1"): ?><tr >
                            <th >IOS下载地址</th >
                            <td ><textarea name="iosurl" id="iosurl" style="width: 98%; height: 50px;"
                                           placeholder="请填写下载地址" ><?php echo ($gameinfo["yiosurl"]); ?></textarea >
                            </td >
                        </tr >
                        <tr >
                            <th >IOS适用系统</th >
                            <td ><input type="text" name="adxt" id="adxt" value="<?php echo ($gameinfo["adxt"]); ?>" style="width: 400px"
                                        placeholder="请填写IOS适用环境" >*最低适用版本  例如 7.0以上
                            </td >
                        </tr ><?php endif; ?>
                    <tr >
                        <th >游戏大小</th >
                        <td ><input type="text" name="size" id="size" value="<?php echo ($gameinfo["size"]); ?>" style="width: 400px"
                                    placeholder="请输入游戏版本" >*例如: 100M
                        </td >
                    </tr >
                    <tr >
                        <th >游戏版本</th >
                        <input type="hidden" name="verid" value="<?php echo ($verdata["id"]); ?>" >
                        <td ><input type="text" name="version" id="version"
                                    onkeyup="this.value=this.value.replace(/[^\d.]/g,'')"
                                    onafterpaste="this.value=this.value.replace(/[^\d.]/g,'')"
                                    value="<?php echo ($verdata["version"]); ?>" style="width: 400px"
                                    placeholder="请输入游戏版本" >*数字与小数点组合 例如 1.0
                        </td >
                    </tr >

                    <tr >
                        <th >游戏评分</th >
                        <td ><input type="text" name="score" id="score" value="<?php echo ($gameinfo["score"]); ?>" style="width: 400px"
                                    placeholder="请输入游戏评分" >*例如: 9.4
                        </td >
                    </tr >

                    <tr >
                        <th >游戏语言</th >
                        <td ><input type="text" name="lang" id="lang"
                                    value="<?php echo ($gameinfo["lang"]); ?>" style="width: 400px"
                                    placeholder="请输入游戏语言" >*默认为中文
                        </td >
                    </tr >
                    <tr >
                        <th >游戏测试状态</th >
                        <td ><input type="text" name="teststatus" id="teststatus"
                                    value="<?php echo ($game["teststatus"]); ?>" style="width: 400px"
                                    placeholder="请输入游戏上线测试状态" >*例如: 11月2日游戏上线/公测中
                        </td >
                    </tr >
                    <tr >
                        <th >更新信息</th >
                        <td ><input type="text" name="upinfo" id="upinfo"
                                    value="<?php echo ($gameinfo["upinfo"]); ?>" style="width: 400px"
                                    placeholder="更新信息" >*70文字内 例如: 同步更新
                        </td >
                    </tr >
                    <tr >
                        <th >游戏截图 (640*960 )</th >
                        <td >
                            <fieldset >
                                <ul id="photos" class="pic-list unstyled" >
                                <?php $limit = 5; ?>
                                <?php if(!empty($gameinfo['image'])): $smeta = json_decode($gameinfo['image'],true); ?>
                                    <?php if(is_array($smeta)): foreach($smeta as $key=>$vo): $img_url=sp_get_asset_upload_path($vo['url']); ?>
                                        <li id="savedimage<?php echo ($key); ?>" >
                                            <input id="photo-<?php echo ($key); ?>" type="hidden" name="photos_url[]"
                                                   value="<?php echo ($img_url); ?>" >
                                            <input id="photo-<?php echo ($key); ?>-name" type="text" name="photos_alt[]"

                                                   value="<?php echo ($vo["alt"]); ?>" style="width: 200px;" title="图片名称" >
                                            <img id="photo-<?php echo ($key); ?>-preview" src="<?php echo ($img_url); ?>"
                                                 style="height:36px;width: 36px;"
                                                 onclick="javascript:image_priview(this.src)" />
                                            <a href="javascript:upload_one_image('图片上传','#photo-<?php echo ($key); ?>');" >替换</a >
                                            <a href="javascript:(function(){ $('#savedimage<?php echo ($key); ?>').remove();})();" >移除</a >
                                        </li ><?php endforeach; endif; endif; ?>
                            </ul >
                            <a href="javascript:upload_multi_image('图片上传','#photos','photos-item-wrapper',{'limit':<?php echo $limit; ?>});"
                               class="btn btn-small" >选择图片</a >
                        </td >
                    </tr >
                    <?php if($game['classify'] == 4 or $game['classify'] == 401): ?><tr >
                            <th >背景图 ( 720*680)</th >
                            <td >
                                <fieldset >
                                    <input type="hidden" name="bgthumb" id="bgthumb"
                                           value="<?php echo ((isset($gameinfo['bgthumb']) && ($gameinfo['bgthumb'] !== ""))?($gameinfo['bgthumb']):''); ?>" >
                                    <a href="javascript:upload_one_image('图片上传','#bgthumb');" >
                                        <?php if(empty($gameinfo['bgthumb'])): ?><img src="/public/assets/images/default-thumbnail.png"
                                                 id="bgthumb-preview"
                                                 width="135" style="cursor: hand" />
                                            <?php else: ?>
                                            <img src="<?php echo ($gameinfo['bgthumb']); ?>" id="bgthumb-preview"
                                                 width="135" style="cursor: hand" /><?php endif; ?>
                                    </a >
                                    <input type="button" class="btn btn-small"
                                           onclick="$('#bgthumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#bgthumb').val('');return false;"
                                           value="取消图片" >
                            </td >
                        </tr ><?php endif; ?>
                </table >
            </div >
            <div class="span3" >
                <table class="table table-bordered" >
                    <tr >
                        <td ><b >游戏ICON(72*72)</b ></td >
                    </tr >
                    <tr >
                        <td >
                            <div style="text-align: center;" >
                                <?php $logourl = empty($gameinfo[mobile_icon])?$gameinfo[icon]:$gameinfo[mobile_icon]; ?>
                                <input type="hidden" name="thumb" id="thumb" value="<?php echo ((isset($logourl) && ($logourl !== ""))?($logourl):''); ?>" >
                                <a href="javascript:upload_one_image('图片上传','#thumb');" >
                                    <?php if(empty($logourl)): ?><img src="/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                             width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="<?php echo ($logourl); ?>" id="thumb-preview"
                                             width="135" style="cursor: hand" /><?php endif; ?>
                                </a >
                                <input type="button" class="btn btn-small"
                                       onclick="$('#thumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                       value="取消图片" >
                            </div >
                        </td >
                    </tr >
                    <!--<tr >-->
                        <!--<td ><b >游戏网页大图(166*189)</b ></td >-->
                    <!--</tr >-->
                    <!--<tr >-->
                        <!--<td >-->
                            <!--<div style="text-align: center;" >-->
                                <!--<?php $logourl = empty($gameinfo[mobile_icon])?$game[icon]:$gameinfo[mobile_icon]; ?>-->
                                <!--<input type="hidden" name="bigimage" id="bigimage"-->
                                       <!--value="<?php echo sp_get_asset_upload_path($gameinfo[bigimage]);?>" >-->
                                <!--<a href="javascript:upload_one_image('图片上传','#bigimage');" >-->
                                    <!--<?php if(empty($gameinfo['bigimage'])): ?>-->
                                        <!--<img src="/public/assets/images/default-thumbnail.png"-->
                                             <!--id="bigimage-preview"-->
                                             <!--width="135" style="cursor: hand" />-->
                                        <!--<?php else: ?>-->
                                        <!--<img src="<?php echo sp_get_asset_upload_path($gameinfo['bigimage']);?>"-->
                                             <!--id="bigimage-preview"-->
                                             <!--width="135" style="cursor: hand" />-->
                                    <!--<?php endif; ?>-->
                                <!--</a >-->
                                <!--<input type="button" class="btn btn-small"-->
                                       <!--onclick="$('#bigimage-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#bigimage').val('');return false;"-->
                                       <!--value="取消图片" >-->
                            <!--</div >-->

                        <!--</td >-->
                    <!--</tr >-->
                    <tr >
                        <th ><b >下载次数</b ></th >
                    </tr >
                    <tr >
                        <td ><input type="text" name="count"
                                    onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                    onafterpaste="this.value=this.value.replace(/[^0-9]/g,'')"
                                    value="<?php echo ((isset($extdata["down_cnt"]) && ($extdata["down_cnt"] !== ""))?($extdata["down_cnt"]):0); ?>" style="width: 160px;" ></td >
                    </tr >
                    <?php $single_yes=$game['category']==1?"checked":""; $single_no=$game['category']==2?"checked":""; $class_android=$game['classify']==1?"checked":""; $class_other=$game['classify']==4?"checked":""; $hot_yes=$game['is_hot']==2?"checked":""; $hot_no=$game['is_hot']==1?"checked":""; ?>
                    <tr >
                        <td >
                            <label class="radio" > <input type="radio" name="gcategory" value="1" <?php echo ($single_yes); ?> >单机
                            </label >
                            <label class="radio" > <input type="radio" name="gcategory" value="2" <?php echo ($single_no); ?> >网游
                            </label >
                        </td >
                    </tr >
                    <tr >
                        <td >
                            <label class="radio" > <input type="radio" name="hot" value="1" <?php echo ($hot_yes); ?> >热门
                            </label >
                            <label class="radio" > <input type="radio" name="hot" value="0" <?php echo ($hot_no); ?> >普通
                            </label >
                        </td >
                    </tr >
                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >提交</button >
            <a class="btn" href="javascript:history.back(-1);" >返回</a >
        </div >
    </form >
</div >

<script type="text/javascript" src="/public/js/common.js" ></script >
<script type="text/javascript" src="/public/js/content_addtop.js?t=<?php echo time();?>" ></script >
<script type="text/javascript" >
    //编辑器路径定义
    var editorURL = GV.DIMAUB;
</script >
<script type="text/javascript" src="/public/js/ueditor/ueditor.config.js" ></script >
<script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js" ></script >
<script type="text/javascript" >
    $(function () {

        $("input[name='pgtype[]']").change(function() {
            var text="";
            $("input[name='pgtype[]']").each(function() {
                if ($(this).attr("checked")) {
                    text += ","+$(this).val();
                }
            });
            var appid = $("#appid").val();
            $.post("<?php echo U('Sdk/Game/game_label');?>",{ids:text,appid:appid},function(result){
                $("#typetd").empty();
                $("#typetd").html(result);
            });
            //alert($(this).val());
        });

        //setInterval(function(){public_lock_renewal();}, 10000);
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
            //编辑器
            editorcontent = new baidu.editor.ui.Editor();
            editorcontent.render('content');
            try {
                editorcontent.sync();
            } catch (err) {
            }
            //增加编辑器验证规则
            jQuery.validator.addMethod('editorcontent', function () {
                try {
                    editorcontent.sync();
                } catch (err) {
                }
                ;
                return editorcontent.hasContents();
            });

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

            var formloading = false;
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
                    'name': {required: 1}
                },
                //验证未通过提示消息
                messages     : {
                    'name': {required: '请输入游戏名称'}
                },
                //给未通过验证的元素加效果,闪烁等
                highlight    : false,
                //是否在获取焦点时验证
                onfocusout   : false,
                //验证通过，提交表单
                submitHandler: function (forms) {
                    if (formloading)  return;
                    $(forms).ajaxSubmit({
                        //按钮上是否自定义提交地址(多按钮情况)
                        url         : form.attr('action'),
                        dataType    : 'json',
                        beforeSubmit: function (arr, $form, options) {
                            formloading = true;
                        },
                        success     : function (data, statusText, xhr, $form) {
                            formloading = false;
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
                                        button    : [
                                            {
                                                name    : '继续编辑?',
                                                callback: function () {
                                                    reloadPage(window);
                                                    return true;
                                                },
                                                focus   : true
                                            },
                                            {
                                                name    : '返回游戏列表',
                                                callback: function () {
//                                                    location = "<?php echo U('Sdk/Game/index');?>";
                                                    location = document.referrer;
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