<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:80:"/home/vagrant/Code/crmeb/application/admin/view/ump/store_coupon_issue/index.php";i:1545062348;s:68:"/home/vagrant/Code/crmeb/application/admin/view/public/container.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:64:"/home/vagrant/Code/crmeb/application/admin/view/public/style.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/inner_page.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_footer.php";i:1545062348;}*/ ?>
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
<!--????????????https://daneden.github.io/animate.css/?-->
<div class="wrapper wrapper-content animated ">

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="m-b m-l">

                        <form action="" class="form-inline">
                            <select name="status" aria-controls="editable" class="form-control input-sm">
                                <option value="">??????</option>
                                <option value="1" <?php if($where['status'] == '1'): ?>selected="selected"<?php endif; ?>>??????</option>
                                <option value="0" <?php if($where['status'] == '0'): ?>selected="selected"<?php endif; ?>>?????????</option>
                                <option value="2" <?php if($where['status'] == '2'): ?>selected="selected"<?php endif; ?>>?????????</option>
                                <option value="2" <?php if($where['status'] == '2'): ?>selected="selected"<?php endif; ?>>?????????</option>
                            </select>
                            <div class="input-group">
                                <input type="text" name="coupon_title" value="<?php echo $where['coupon_title']; ?>" placeholder="????????????????????????" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search" ></i>??????</button> </span>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>

                            <th class="text-center">??????</th>
                            <th class="text-center">???????????????</th>
                            <th class="text-center">????????????</th>
                            <th class="text-center">????????????</th>
                            <th class="text-center">??????</th>
                            <th class="text-center">??????</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-center">
                                <?php echo $vo['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $vo['title']; ?>
                            </td>
                            <td class="text-center">
                                <?php if(empty($vo['start_time']) || (($vo['start_time'] instanceof \think\Collection || $vo['start_time'] instanceof \think\Paginator ) && $vo['start_time']->isEmpty())): ?>
                                ?????????
                                <?php else: ?>
                                <?php echo date("Y/m/d H:i",$vo['start_time']); ?> - <?php echo date("Y/m/d H:i",$vo['end_time']); endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(empty($vo['total_count']) || (($vo['total_count'] instanceof \think\Collection || $vo['total_count'] instanceof \think\Paginator ) && $vo['total_count']->isEmpty())): ?>
                                ?????????
                                <?php else: ?>
                                <b style="color: #0a6aa1">??????:<?php echo $vo['total_count']; ?></b>
                                    <br/>
                                <b style="color:#ff0000;">??????:<?php echo $vo['remain_count']; ?></b>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(!$vo['status']){ ?>
                                <span class="label label-warning">?????????</span>
                                <?php }elseif(-1 == $vo['status']){ ?>
                                    <span class="label label-danger">?????????</span>
                                <?php }elseif(1 == $vo['status']){ ?>
                                <span class="label label-primary">??????</span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('????????????','<?php echo Url('issue_log',array('id'=>$vo['id'])); ?>')"><i class="fa fa-commenting-o"></i> ????????????</button>
                                <?php if($vo['status'] != '-1'): ?>
                                <button class="btn btn-primary btn-xs" type="button"  onclick="$eb.createModalFrame('????????????','<?php echo Url('edit',array('id'=>$vo['id'])); ?>',{w:400,h:170})"><i class="fa fa-paste"></i> ????????????</button>
                                <?php endif; ?>
                                <button class="btn btn-danger btn-xs" data-url="<?php echo Url('delete',array('id'=>$vo['id'])); ?>" type="button"><i class="fa fa-warning"></i> ??????
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <link href="{__FRAME_PATH}css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">??? <?php echo $total; ?> ???</div>
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
</div>
<script>
    $('.btn-danger').on('click',function(){
        var _this = $(this),url =_this.data('url');
        $eb.$swal('delete',function(){
            $eb.axios.get(url).then(function(res){
                if(res.status == 200 && res.data.code == 200) {
                    $eb.$swal('success',res.data.msg);
                        _this.parents('tr').remove();
                }else
                    return Promise.reject(res.data.msg || '????????????')
            }).catch(function(err){
                $eb.$swal('error',err);
            });
        },{'title':'??????????????????????????????????????????','text':'????????????????????????,??????????????????','confirm':'?????????????????????'})
    });
</script>




</div>
</body>
</html>
