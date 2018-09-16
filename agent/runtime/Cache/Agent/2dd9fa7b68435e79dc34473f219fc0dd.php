<?php if (!defined('THINK_PATH')) exit();?><html >
<head >
    <title >title</title >
    <script src="/public/agent/js/jquery-1.7.2.min.js" ></script >
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/public/3rd/bootstrap/lumen/bootstrap.min.css" />
    <script src="/public/3rd/bootstrap/js/bootstrap.min.js" ></script >

    <script src="/public/agent/My97DatePicker/WdatePicker.js" ></script >
    <link rel="stylesheet" href="/public/share/paging.css" />
    <style >
        #queryForm input {
            width: 150px;
        }

        table {
            font-size: 14px;
        }
    </style >
</head >
<body >
<div class="container" style="margin-top:20px;" >
    <form id="queryForm" action="<?php echo U('Agent/settle/records');?>" method="get" >
        <div class="row" >
            <div class="col-md-6" >
                <div class="input-group" >
                    <span class="input-group-addon" >申请时间</span >
                    <input id="stime" class="form-control" name="start_time"
                           placeholder="开始时间"
                           type="text" value="<?php echo ($formget["start_time"]); ?>" onClick="WdatePicker()" />
                    <input id="etime" class="form-control" name="end_time"
                           placeholder="结束时间"
                           type="text" value="<?php echo ($formget["end_time"]); ?>" onClick="WdatePicker()" />
                </div >
            </div >
            <div class="col-md-6" >
                <button class="btn btn-success" >搜 &nbsp;索</button >
            </div >
        </div >
    </form >
</div >
<div class="container" style="margin-top:20px;" >
    <table class="table table-hover table-bordered" >
        <tbody >
        <tr >
            <th width="150" >提现帐号</th >
            <th width="80" >金额</th >

            <th width="100" >申请时间</th >
            <th width="100" >更新时间</th >
            <th width="100" >打款时间</th >
            <th width="100" >状态</th >
        </tr >
        <tr style="color:#00AAEE;" >
            <td >汇总</td >
            <td ><?php echo ($sumitems[0]['sum_amount']); ?> 元</td >
            <td >--</td >
            <td >--</td >
            <td >--</td >
            <td >--</td >
        </tr >
        <?php if(is_array($records)): $i = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                <td ><?php echo ($vo["banknum"]); ?></td >
                <td ><?php echo ($vo["money"]); ?> 元</td >
                <td ><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td >
                <td >
                    <?php if(!empty($vo["check_time"])): echo (date("Y-m-d H:i:s",$vo["check_time"])); endif; ?>
                    <?php if(empty($vo["check_time"])): ?>--<?php endif; ?>
                </td >
                <td >
                    <?php if(!empty($vo["settle_time"])): echo (date("Y-m-d H:i:s",$vo["settle_time"])); endif; ?>
                    <?php if(empty($vo["settle_time"])): ?>--<?php endif; ?>
                </td >
                <td >
                    <?php switch($vo["status"]): case "1": ?>待审核<?php break;?>
                        <?php case "2": ?>审核通过<?php break;?>
                        <?php case "3": ?>已打款<?php break;?>
                        <?php case "4": ?><span style="color:green;" >审核不通过</span ><?php break; endswitch;?>
                </td >
            </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody >
    </table >
</div >
<div class="container paging" >
    <?php echo ($page); ?>
</div >
</body >
</html >