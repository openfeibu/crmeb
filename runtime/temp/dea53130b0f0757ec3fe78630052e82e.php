<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:78:"/home/vagrant/Code/crmeb/application/admin/view/system/system_file/opendir.php";i:1545062348;s:68:"/home/vagrant/Code/crmeb/application/admin/view/public/container.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:64:"/home/vagrant/Code/crmeb/application/admin/view/public/style.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_footer.php";i:1545062348;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    
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



    <title></title>
    
    <!--<script type="text/javascript" src="/static/plug/basket.js"></script>-->
<script type="text/javascript" src="{__PLUG_PATH}requirejs/require.js"></script>
<?php /*  <script type="text/javascript" src="/static/plug/requirejs/require-basket-load.js"></script>  */ ?>
<script>
    requirejs.config({
        map: {
            '*': {
                'css': "{__PUBLIC_PATH}static/plug/requirejs/require-css.js"
            }
        },
        shim:{
            'iview':{
                deps:['css!iviewcss']
            },
            'layer':{
                deps:['css!layercss']
            }
        },
        baseUrl:'//'+location.hostname+"{__PUBLIC_PATH}",
        paths: {
            'static':'static',
            'system':'system',
            'vue':'static/plug/vue/dist/vue.min',
            'axios':'static/plug/axios.min',
            'iview':'static/plug/iview/dist/iview.min',
            'iviewcss':'static/plug/iview/dist/styles/iview',
            'lodash':'static/plug/lodash',
            'layer':'static/plug/layer/layer',
            'layercss':'static/plug/layer/theme/default/layer',
            'jquery':'static/plug/jquery/jquery.min',
            'moment':'static/plug/moment',
//            'mpBuilder':'system/util/mpBuilder',
            'sweetalert':'static/plug/sweetalert2/sweetalert2.all.min'

        },
        basket: {
            excludes:['system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
//            excludes:['system/util/mpFormBuilder','system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
        }
    });
</script>
<script type="text/javascript" src="{__ADMIN_PATH}util/mpFrame.js"></script>
    
</head>
<body class="gray-bg">
<!--演示地址https://daneden.github.io/animate.css/?-->
<div class="wrapper wrapper-content animated ">

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>文件管理</h5>
            </div>
            <div class="ibox-content  no-padding">
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>
                            <th class="text-left" width="20%">列表</th>
                            <th class="text-left">文件大小</th>
                            <th class="text-left">更新时间</th>
                            <th class="text-center" width="30%">操作</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        <tr>
                            <td class="text-left" colspan="3">
                                <span> <i class="fa fa-folder-o"></i> <a href="<?php echo Url('opendir'); ?>?dir=<?php echo $dir; ?>&superior=1">返回上级</a></span>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                        <?php if(is_array($fileAll['dir']) || $fileAll['dir'] instanceof \think\Collection || $fileAll['dir'] instanceof \think\Paginator): $i = 0; $__LIST__ = $fileAll['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-left">
                                <span> <i class="fa fa-folder-o"></i> <a href="<?php echo Url('opendir'); ?>?dir=<?php echo $dir; ?>&filedir=<?php echo $vo['filename']; ?>"><?php echo $vo['filename']; ?></a></span>
                            </td>
                            <td class="text-left">
                                <span> <?php echo $vo['size']; ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php echo date('Y-m-d H:i:s',$vo['mtime']); ?></span>
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info btn-xs" href="<?php echo Url('opendir'); ?>?dir=<?php echo $dir; ?>&filedir=<?php echo $vo['filename']; ?>"><i class="fa fa-paste"></i> 打开</a>

                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; if(is_array($fileAll['file']) || $fileAll['file'] instanceof \think\Collection || $fileAll['file'] instanceof \think\Paginator): $i = 0; $__LIST__ = $fileAll['file'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-left">
                                <span onclick="$eb.createModalFrame('<?php echo $vo['filename']; ?>','<?php echo Url('openfile'); ?>?file=<?php echo $dir; ?>/<?php echo $vo['filename']; ?>',{w:1260,h:600})"> <i class="fa fa-file-text-o"></i> <?php echo $vo['filename']; ?></span>
                            </td>
                            <td class="text-left">
                                <span> <?php echo $vo['size']; ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php echo date('Y-m-d H:i:s',$vo['mtime']); ?></span>
                            </td>

                            <td class="text-center">
                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo $vo['filename']; ?>','<?php echo Url('openfile'); ?>?file=<?php echo $dir; ?>/<?php echo $vo['filename']; ?>',{w:1260,h:660})"><i class="fa fa-paste"></i> 编辑</button>
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo $vo['filename']; ?>','<?php echo Url('openfile'); ?>?file=<?php echo $vo['filename']; ?>&dir=<?php echo $dir; ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 重命名</button>-->
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo $vo['filename']; ?>','<?php echo Url('openfile'); ?>?file=<?php echo $vo['filename']; ?>&dir=<?php echo $dir; ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 删除</button>-->
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo $vo['filename']; ?>','<?php echo Url('openfile'); ?>?file=<?php echo $vo['filename']; ?>&dir=<?php echo $dir; ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 下载</button>-->

                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $('.btn-warning').on('click',function(){
        var _this = $(this),url =_this.data('url');
        $eb.$swal('delete',function(){
            $eb.axios.get(url).then(function(res){
                console.log(res);
                if(res.status == 200 && res.data.code == 200) {
                    $eb.$swal('success',res.data.msg);
                    _this.parents('tr').remove();
                }else
                    return Promise.reject(res.data.msg || '删除失败')
            }).catch(function(err){
                $eb.$swal('error',err);
            });
        })
    });
</script>


</div>
</body>
</html>
