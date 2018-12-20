<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"/home/vagrant/Code/crmeb/application/admin/view/system/clear/index.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/inner_footer.php";i:1545062348;}*/ ?>

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



<div class="row" style="width: 100%;margin-top: 50px; text-align: center;">
<button type="button" class="btn btn-w-m btn-primary" data-url="<?php echo Url('system.clear/refresh_cache'); ?>">刷新数据缓存</button>
<button type="button" class="btn btn-w-m btn-primary" data-url="<?php echo Url('system.clear/delete_cache'); ?>">清除缓存</button>
<button type="button" class="btn btn-w-m btn-primary" data-url="<?php echo Url('system.clear/delete_log'); ?>">清除日志</button>
</div>
<script>
    $('button').on('click',function(){
        window.t = $(this);
        var _this = $(this),url =_this.data('url');
        $eb.$swal('delete',function(){
            $eb.axios.get(url).then(function(res){
                if(res.status == 200 && res.data.code == 200) {
                    $eb.$swal('success',res.data.msg);
                }else
                    return Promise.reject(res.data.msg || '操作失败')
            }).catch(function(err){
                $eb.$swal('error',err);
            });
        },{'title':'您确定要进行此操作吗？','text':'操作后runtime目录文件有可能被删除,请谨慎操作！','confirm':'是的，我要操作'})
    })
</script>
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
