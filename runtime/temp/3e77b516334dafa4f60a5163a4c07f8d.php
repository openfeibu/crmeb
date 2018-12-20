<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/vagrant/Code/crmeb/application/admin/view/ump/store_coupon_issue/issue_log.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/inner_page.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/inner_footer.php";i:1545062348;}*/ ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(empty($is_layui) || (($is_layui instanceof \think\Collection || $is_layui instanceof \think\Paginator ) && $is_layui->isEmpty())): ?>
    <link href="{__FRAME_PATH}css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <?php endif; ?>
    <link href="{__PLUG_PATH}layui/css/layui.css" rel="stylesheet">
    <link href="{__ADMIN_PATH}css/layui-admin.css" rel="stylesheet"></link>
    <link href="{__FRAME_PATH}css/font-awesome.min.css?v=4.3.0" rel="stylesheet">
    <link href="{__FRAME_PATH}css/animate.min.css" rel="stylesheet">
    <link href="{__FRAME_PATH}css/style.min.css?v=3.0.0" rel="stylesheet">
    <script src="{__FRAME_PATH}js/jquery.min.js"></script>
    <script src="{__FRAME_PATH}js/bootstrap.min.js"></script>
    <script src="{__PLUG_PATH}layui/layui.all.js"></script>
    <script>
        $eb = parent._mpApi;
        // if(!$eb) top.location.reload();
        window.controlle="<?php echo strtolower(trim(preg_replace("/[A-Z]/", "_\\0", think\Request::instance()->controller()), "_"));?>";
        window.module="<?php echo think\Request::instance()->module();?>";
    </script>



<style type="text/css" media="screen">
    td img{width: 35px; height: 35px;}
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">用户名</th>
                            <th class="text-center">用户头像</th>
                            <th class="text-center">领取时间</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-center"><?php echo $vo['nickname']; ?></td>
                            <td class="text-center"><img src="<?php echo $vo['avatar']; ?>" class="head_image" data-image="<?php echo $vo['avatar']; ?>" width="35" height="35"></td>
                            <td class="text-center"><?php echo $vo['add_time']; ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <link href="{__FRAME_PATH}css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">共 <?php echo $total; ?> 项</div>
    </div>
    <div class="col-sm-6">
        <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
            <?php echo $page; ?>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
    <script>
        $('td img').on('click',function (e) {
            var image = $(this).attr("src");
            $eb.openImage(image);
        })
    </script>
</div>
<script src="{__FRAME_PATH}js/content.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/chosen/chosen.jquery.js"></script>
<script src="{__FRAME_PATH}js/plugins/jsKnob/jquery.knob.js"></script>
<script src="{__FRAME_PATH}js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="{__FRAME_PATH}js/plugins/prettyfile/bootstrap-prettyfile.js"></script>
<script src="{__FRAME_PATH}js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/switchery/switchery.js"></script>
<script src="{__FRAME_PATH}js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/iCheck/icheck.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{__FRAME_PATH}js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/clockpicker/clockpicker.js"></script>
<script src="{__FRAME_PATH}js/plugins/cropper/cropper.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/peity/jquery.peity.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
