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
        <li class="active" ><a href="<?php echo U('Tui/GameBenefit/index');?>"
                               target="_self" >推广游戏管理</a ></li >
        <!--<li><a href="<?php echo U('Tui/Game/add');?>" target="_self">添加游戏</a></li>-->
    </ul >
    <form class="well form-search" method="get" action='/admin.php/Tui/GameBenefit/index/menuid/324.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
					<span class="mr20" >
                        游戏：
                        <?php echo ($app_select); ?>

                        优惠类型:
						<?php echo ($benefit_type_select); ?>

                        推广状态:
						<?php echo ($promote_status_select); ?>
                        <input type="submit"  class="btn btn-primary" value="搜索" />
					</span >
            </div >
        </div >
    </form >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th >游戏</th >
				<th >平台</th >
                <th >渠道折扣</th >
                <?php if(C("G_DISCONT_TYPE")){ ?>
                <th >玩家优惠类型</th >
                <th >玩家首充</th >
                <th >玩家续充</th >
                <?php } ?>
                <th >状态</th >
                <th >操作</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td >
                        <?php if(!empty($vo["icon"])): ?><img src="<?php echo ($vo["icon"]); ?>" onerror="imgnofind('/upload/<?php echo ($vo["icon"]); ?>')" width="50" /><?php endif; ?>
                        <?php echo ($vo["name"]); ?>
                    </td >
					<td ><?php echo ($vo["class_name"]); ?></td >
                    <td >
                        <?php if((floatval($vo[agent_rate])) != "0"): echo (floatval($vo["agent_rate"])); ?>
                            <?php else: ?>
                            --<?php endif; ?>
                    </td >

                    <?php if(C("G_DISCONT_TYPE")){ ?>
                    <td ><?php echo ($vo["benefit_type_txt"]); ?></td >

                    <td >
                        <?php if(!empty($vo[mem_first])): echo ($vo["mem_first"]); ?>
                            <?php else: ?>
                            --<?php endif; ?>
                    </td >
                    <td >
                        <?php if(!empty($vo[mem_refill])): echo ($vo["mem_refill"]); ?>
                            <?php else: ?>
                            --<?php endif; ?>
                    </td >
                    <?php } ?>
                    <td ><?php echo ($vo["promote_status"]); ?></td >
                    <td data-id='<?php echo ($vo["id"]); ?>' ><a href="javascript:;"
                                               class="edit_benefit_btn" data-appid="<?php echo ($vo["id"]); ?>"
                                               data-appname="<?php echo ($vo["name"]); ?>"
                                               data-agentrate="<?php echo (floatval($vo["agent_rate"])); ?>"
                                               data-benefittype="<?php echo ($vo["benefit_type_txt"]); ?>"
                                               data-benefittypeint="<?php echo ($vo["benefit_type"]); ?>"
                                               data-first_mem_rate="<?php echo (floatval($vo["first_mem_rate"])); ?>"
                                               data-mem_rate="<?php echo (floatval($vo["mem_rate"])); ?>"
                                               data-first_mem_rebate="<?php echo (floatval($vo["first_mem_rebate"])); ?>"
                                               data-mem_rebate="<?php echo (floatval($vo["mem_rebate"])); ?>"
                                               data-hint='<?php echo ($vo["hint"]); ?>' >优惠设置</a >
                        |
                        <?php if($vo['promote_switch'] == 2): ?><a
                                href="<?php echo U('Tui/AgentGame/setPormoteStatus',array('app_id'=>$vo['id'],'status'=>'off'));?>"
                                class="js-ajax-dialog-btn" data-msg="确定推广系统中(下架)此游戏吗?" >下架</a >
                            <?php else: ?>
                            <a
                                    href="<?php echo U('Tui/AgentGame/setPormoteStatus',array('app_id'=>$vo['id'],'status'=>'on'));?>"
                                    class="js-ajax-dialog-btn" data-msg="确定推广系统中(上架)此游戏吗?" >上架</a ><?php endif; ?>
                    </td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($page); ?></div >
    </form >
</div >

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

    .pop_up_form_div input[type='text'], .pop_up_form_div input[type='password'],
    .pop_up_form_div input[type='number'] {
        width: 280px;
    }

    .pop_up_form_submit_btn {
        margin-top: 20px;
        width: 300px;
    }

    input[disabled='disabled'] {
        background-color: #FFFFFF;
        border-bottom: 1px solid #CCCCCC;
        color: #333333;
    }

    .benefit_hint {
        color: red;
        margin: 5px 0;
    }
</style >

<div class="pop_up_form_div container" id='give_agent'
     style="display: none;" >
    <form id="popup_form" action="post" onsubmit="return false;" >
        <input type="hidden" name="app_id" /> <input type="hidden"
                                                     name="benefit_type" /> <input type="hidden"
                                                                                   name="prev_agent_rate" />
        <div class="row" >
            <div class="col-md-4" >游戏名称</div >
            <div class="col-md-8" >
                <input type="text" name="app_name" disabled="disabled" />
            </div >
        </div >

        <div class="row" >
            <div class="col-md-4" >渠道折扣</div >
            <div class="col-md-8" >
                <input type="text" name="agent_rate" />
            </div >
        </div >

        <?php if(C("G_DISCONT_TYPE")){ ?>

        <div class="row" >
            <div class="col-md-4" >玩家优惠类型</div >
            <ul class="nav nav-pills" id="benefit_type_choose" >
                <li class="active" data-type="0" ><a href="#default"
                                                     data-toggle="pill" >无优惠</a ></li >
                <li data-type="1" ><a href="#discount" data-toggle="pill" >折扣</a ></li >
                <li data-type="2" ><a href="#rebate" data-toggle="pill" >返利</a ></li >
            </ul >
        </div >
        <div class="tab-content benefit_type_choose_content" >
            <div class="tab-pane fade in active" id="default" >
                <div class="row" >
                    <!--玩家充值无优惠-->
                </div >
            </div >
            <div class="tab-pane fade in" id="discount" >
                <div class="row" >
                    <div class="col-md-4" >玩家首充折扣</div >
                    <div class="col-md-12" >
                        <span class="benefit_hint benefit_hint_first_mem_rate" ></span >
                    </div >
                    <div class="col-md-8" >
                        <!--<input type="text" name="first_mem_rate" />-->
                        <input type="text" name="first_mem_rate" />

                    </div >

                </div >
                <br >
                <div class="row" >
                    <div class="col-md-4" >玩家续充折扣</div >
                    <div class="col-md-12" >
                        <span class="benefit_hint benefit_hint_mem_rate" ></span >
                    </div >
                    <div class="col-md-8" >
                        <input type="text" name="mem_rate" />
                    </div >

                </div >
            </div >
            <div class="tab-pane fade" id="rebate" >
                <div class="row" >
                    <div class="col-md-4" >玩家首充返利（%）</div >
                    <div class="col-md-12" >
                        <span class=" benefit_hint benefit_hint_first_mem_rebate" ></span >
                    </div >
                    <div class="col-md-8" >
                        <input type="text" name="first_mem_rebate" />
                    </div >

                </div >
                <div class="row" >
                    <div class="col-md-4" >玩家续充返利（%）</div >
                    <div class="col-md-12" >
                        <span class=" benefit_hint benefit_hint_mem_rebate" ></span >
                    </div >
                    <div class="col-md-8" >
                        <input type="text" name="mem_rebate" />
                    </div >

                </div >
            </div >
        </div >
        <?php } ?>

        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn"
                    id='agent_submit_btn' >保存
            </button >
        </div >
    </form >
</div >

<script src="/public/js/common.js" ></script >
<script >
    var v_rate       = parseFloat($("#popup_form input[name='agent_rate']").val());
    var v_fm_rate    = parseFloat($("#popup_form input[name='first_mem_rate']").val());
    var v_fm_rebate  = parseFloat($("#popup_form input[name='first_mem_rebate']").val());
    var v_fm_rebate  = parseFloat($("#popup_form input[name='first_mem_rebate']").val());
    var v_fm_rebate  = parseFloat($("#popup_form input[name='first_mem_rebate']").val());
    var v_rebate_top = parseFloat((1 / v_rate - 1) * 100);
    var mrt_bottom   = v_rate;

    function getparam() {
        v_rate       = parseFloat($("#popup_form input[name='agent_rate']").val());
        v_fm_rate    = parseFloat($("#popup_form input[name='first_mem_rate']").val());
        v_m_rate     = parseFloat($("#popup_form input[name='mem_rate']").val());
        v_fm_rebate  = parseFloat($("#popup_form input[name='first_mem_rebate']").val());
        v_m_rebate   = parseFloat($("#popup_form input[name='mem_rebate']").val());
        v_rebate_top = parseFloat((1 / v_rate - 1) * 100);
        mrt_bottom   = v_rate;
        if (v_rebate_top > v_fm_rebate) {
            v_rebate_top = v_fm_rebate;
        }

        if (v_rate < v_fm_rate) {
            mrt_bottom = v_fm_rate;
        }
    }

    $(".promote_on_btn").click(function () {
        var app_id = $(this).parent("td").attr("data-id");
        setPromoteStatus(app_id, "on");
    });
    $(".promote_off_btn").click(function () {
        var app_id = $(this).parent("td").attr("data-id");
        setPromoteStatus(app_id, "off");
    });

    function clearNoNum(obj, min, max, fix) {
        if (! fix) {
            fix = 4;
        }
        if (obj.value.indexOf(".") == 0) {
            //首位为小数点，自动补齐0
            obj.value = "0" + obj.value;
        }
        obj.value = obj.value.replace(/[^\d.]/g, ""); // 清除“数字”和“.”以外的字符
        obj.value = obj.value.replace(/\.{2,}/g, "."); //只保留第一个. 清除多余的
        obj.value = obj.value.replace(".", "$#$").replace(/\./g, "").replace("$#$", ".");
        if (4 == fix) {
            obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d\d\d).*$/, "$1$2.$3");//只能输入四个小数
        } else {
            obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/, "$1$2.$3");//只能输入两位小数
        }

        if (obj.value.indexOf(".") < 0 && obj.value != "") {
            //以上已经过滤，此处控制的是如果没有小数点，首位不能为类似于 01、02的金额
            obj.value = parseFloat(obj.value);
        }

        if (obj.value < min) {
            obj.value = min;
        }
        if (obj.value > max) {
            obj.value = max;
        }
    }

    function setPromoteStatus(app_id, status) {
        var url  = "<?php echo U('Tui/AgentGame/setPormoteStatus');?>";
        var data = {
            "app_id": app_id,
            "status": status
        };
        $.post(url, data, function (res) {
            if (res.error == "0") {
                yxalert(res.msg);
                reload_delay();
            } else if (res.error == "1") {
                yxalert(res.msg);
            }

        });
    }
    var benefit_type = 0;
    $("#benefit_type_choose li").click(function () {
        benefit_type = $(this).attr("data-type");
        $(".pop_up_form_div input[name='benefit_type']").val(benefit_type);
        //            alert(benefit_type);
    });

    function handle_tabs(benefit_type) {
        $("#benefit_type_choose li").removeClass("active");
        $("#benefit_type_choose li").eq(benefit_type).addClass("active");
        $(".benefit_type_choose_content .tab-pane")
        .removeClass("in active");
        $(".benefit_type_choose_content .tab-pane").eq(benefit_type)
        .addClass("in active");
    }

    $(".edit_benefit_btn")
    .click(
        function () {
            var t_benefit_type = $(this).attr(
                "data-benefittypeint");
            benefit_type       = t_benefit_type;
            $(".pop_up_form_div input[name='benefit_type']")
            .val(benefit_type);
            //            alert(benefit_type);
            handle_tabs(benefit_type);

            $("#benefit_type_choose li").eq(0).show();
            $("#benefit_type_choose li").eq(1).show();
            $("#benefit_type_choose li").eq(2).show();

            if (1 == benefit_type) {
                $("#benefit_type_choose li").eq(0).show();
                $("#benefit_type_choose li").eq(1).show();
                $("#benefit_type_choose li").eq(2).hide();
            } else if (2 == benefit_type) {
                $("#benefit_type_choose li").eq(0).show();
                $("#benefit_type_choose li").eq(1).hide();
                $("#benefit_type_choose li").eq(2).show();
            }

            var app_name = $(this).attr("data-appname");
            $(".pop_up_form_div input[name='app_name']").val(
                app_name);
            var app_id = $(this).attr("data-appid");
            $(".pop_up_form_div input[name='app_id']").val(
                app_id);
            var agent_rate = $(this).attr("data-agentrate");
            $(".pop_up_form_div input[name='agent_rate']").val(
                agent_rate);
            $(".pop_up_form_div input[name='prev_agent_rate']")
            .val(agent_rate);

            $(".pop_up_form_div input[name='first_mem_rate']")
            .val($(this).attr("data-first_mem_rate"));
            $(".pop_up_form_div input[name='mem_rate']").val(
                $(this).attr("data-mem_rate"));
            $(".pop_up_form_div input[name='first_mem_rebate']")
            .val(
                $(this).attr(
                    "data-first_mem_rebate") * 100);
            $(".pop_up_form_div input[name='mem_rebate']").val(
                $(this).attr("data-mem_rebate") * 100);

            var hint_txt = $(this).attr("data-hint");
            //            alert(hint_txt);
            //            return;
            /* 					var hint = $.parseJSON(hint_txt);
             $(".benefit_hint_first_mem_rate").text(
             hint.first_mem_rate);
             $(".benefit_hint_mem_rate").text(hint.mem_rate);
             $(".benefit_hint_first_mem_rebate").text(
             hint.first_mem_rebate);
             $(".benefit_hint_mem_rebate").text(hint.mem_rebate); */
            ratechange();

            layer.open({
                type   : 1,
                shift  : 2,
                area   : '350px',
                title  : "编辑优惠信息",
                content: $('#give_agent'),
                cancel : function (index) {
                    layer.close(index);
                }
            });

        });

    $(".pop_up_form_submit_btn").click(function () {
        var data = $("#popup_form").serialize();
        //            var dataarr=$("#popup_form").serializeArray();
        //            console.log(data);
        getparam();
        if (1 == benefit_type && (v_m_rate < mrt_bottom || v_m_rate > 1)) {
            yxalert("续充折扣" + v_m_rate + "填写不正确<br>要求为" + mrt_bottom + '<=续充折扣<=1');
            return;
        }

        if (2 == benefit_type && (v_m_rebate > v_rebate_top || v_m_rebate < 0)) {
            yxalert("续充返利" + v_m_rebate + "填写不正确<br>要求为0<=续充返利<=" + v_rebate_top);
            return;
        }

        var url = "<?php echo U('Tui/GameBenefit/edit_post');?>";
        $.post(url, data, function (res) {
            if (res.error === '0') {
                yxalert("保存成功");
                reload_delay();
            } else if (res.error === '1') {
                yxalert(res.msg);
            }
        });
    });

    function ratechange() {
        getparam();
        var frt_txt = "0< 首充折扣 <=1";
        var rt_txt  = mrt_bottom + "<= 续充折扣 <=1";
        var frb_txt = "(首充返利>= 0)%";
        var rb_txt  = "(0<=续充返利<=" + v_rebate_top + ")%";
        $(".benefit_hint_first_mem_rate").text(frt_txt);
        $(".benefit_hint_mem_rate").text(rt_txt);
        $(".benefit_hint_first_mem_rebate").text(frb_txt);
        $(".benefit_hint_mem_rebate").text(rb_txt);
    }

    $("#popup_form input[name='agent_rate']").bind("keyup afterpaste", function () {
        clearNoNum(this, 0, 1);
        ratechange();
    });

    $("#popup_form input[name='first_mem_rate']").bind("keyup afterpaste", function () {
        clearNoNum(this, 0, 1);
        ratechange();
    });
    $("#popup_form input[name='mem_rate']").bind("blur afterpaste", function () {
        getparam();
        if (v_m_rate < mrt_bottom || v_m_rate > 1) {
            yxalert("续充折扣" + v_m_rate + "填写不正确<br>要求为" + mrt_bottom + '<=续充折扣<=1');
        }
        clearNoNum(this, mrt_bottom, 1);
    });
    $("#popup_form input[name='first_mem_rebate']").bind("keyup afterpaste", function () {
        clearNoNum(this, 0, 990, 2);
        ratechange();
    });
    $("#popup_form input[name='mem_rebate']").bind("blur afterpaste", function () {
        getparam();
        if (v_m_rebate > v_rebate_top || v_m_rebate < 0) {

            yxalert("续充返利" + v_m_rebate + "%填写不正确<br>要求为0<=续充返利<=" + v_rebate_top + '%');
        }
        clearNoNum(this, 0, v_rebate_top, 2);
    });
</script >
</body >
</html>