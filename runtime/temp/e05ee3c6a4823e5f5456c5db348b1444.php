<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/home/vagrant/Code/crmeb/application/admin/view/order/store_order/orderchart.php";i:1545062348;s:68:"/home/vagrant/Code/crmeb/application/admin/view/public/container.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:64:"/home/vagrant/Code/crmeb/application/admin/view/public/style.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_footer.php";i:1545062348;}*/ ?>
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
    
<link rel="stylesheet" href="{__PLUG_PATH}daterangepicker/daterangepicker.css">
<link href="{__FRAME_PATH}css/plugins/footable/footable.core.css" rel="stylesheet">
<script src="{__PLUG_PATH}sweetalert2/sweetalert2.all.min.js"></script>
<script src="{__PLUG_PATH}moment.js"></script>
<script src="{__PLUG_PATH}daterangepicker/daterangepicker.js"></script>
<script src="{__PLUG_PATH}echarts.common.min.js"></script>
<script src="{__FRAME_PATH}js/plugins/footable/footable.all.min.js"></script>

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
                        <form action="" class="form-inline search-form">
                            <div class="search-item" data-name="status">
                                <span>???????????????</span>
                                <button type="button" class="btn btn-outline btn-link" data-value="">??????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="0">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="1">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="2">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="3">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="4">????????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="-1">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="-2">?????????</button>
                                <input class="search-item-value" type="hidden" name="status" value="<?php echo $where['status']; ?>" />
                            </div>
                            <div class="search-item" data-name="combination_id">
                                <span>???????????????</span>
                                <button type="button" class="btn btn-outline btn-link" data-value="">??????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="????????????">????????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="????????????">????????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="????????????">????????????</button>
                                <input class="search-item-value" type="hidden" name="combination_id" value="<?php echo $where['combination_id']; ?>" />
                            </div>
                            <div class="search-item" data-name="data">
                                <span>???????????????</span>
                                <!--                                <button type="button" class="btn btn-outline btn-link" data-value="">??????</button>-->
                                <button type="button" class="btn btn-outline btn-link" data-value="<?php echo $limitTimeList['today']; ?>">??????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="<?php echo $limitTimeList['week']; ?>">??????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="<?php echo $limitTimeList['month']; ?>">??????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="<?php echo $limitTimeList['quarter']; ?>">?????????</button>
                                <button type="button" class="btn btn-outline btn-link" data-value="<?php echo $limitTimeList['year']; ?>">??????</button>
                                <div class="datepicker" style="display: inline-block;">
                                    <button type="button" class="btn btn-outline btn-link" data-value="<?php echo !empty($where['data'])?$where['data']:'no'; ?>">?????????</button>
                                </div>
                                <input class="search-item-value" type="hidden" name="data" value="<?php echo $where['data']; ?>" />
                            </div>
                            <hr>
                            <?php $list_num = $list->toArray(); ?>
                            <div class="col-sm-12" style="padding-bottom: 20px;">
                                <div class="count-price">
                                    <span>???????????????<strong class="h3 text-warning"><?php echo $price['total_num']; ?></strong></span>
                                </div>
                                <div class="count-price">
                                    <span>???????????????<strong class="h3 text-warning"><?php echo $list_num['total']; ?></strong></span>
                                </div>
                                <div class="count-price">
                                    <span>???????????????<strong class="h3 text-warning">???<?php echo $price['pay_price']; ?></strong></span>
                                </div>
                                <div class="count-price">
                                    <span>???????????????<strong class="h3 text-warning">???<?php echo $price['refund_price']; ?></strong></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>??????????????????</h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="ibox-content" id="ec-goods-count" style="height:390px;">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="ibox-content" id="ec-order-count" style="height:390px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    (function(){
                                        var option = {
                                            title: {
                                                text: '????????????'
                                            },
                                            tooltip : {
                                                trigger: 'item',
                                                formatter: "{a} <br/>{b} : {c} ({d}%)"
                                            },
                                            legend: {
                                                orient: 'horizontal',
                                                left: 'left',
                                                top: 25,
                                                data: <?=urldecode(json_encode(array_keys($orderCount)))?>,
                                                selected:<?php
                                                $data = [];
                                                $selected = [];
                                                foreach ($orderCount as $k=>$count){
                                                    $data[] = ['value'=>$count,'name'=>$k];
                                                    $selected[$k] = $count>0;
                                                }
                                                echo urldecode(json_encode($selected));
                                                ?>
                                            },
                                            series : [
                                                {
                                                    name: '????????????',
                                                    type: 'pie',
                                                    radius : '55%',
                                                    center: ['50%', '60%'],
                                                    data:<?=urldecode(json_encode($data))?>,
                                                    itemStyle: {
                                                        emphasis: {
                                                            shadowBlur: 10,
                                                            shadowOffsetX: 0,
                                                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                        }
                                                    }
                                                }
                                            ]
                                        };
                                        var myChart = echarts.init(document.getElementById('ec-order-count'),'light');
                                        myChart.setOption(option);
                                    })();
                                    (function(){
                                        var option = {
                                            title: {
                                                text: '????????????'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            xAxis: {
                                                data: <?=json_encode($orderDays)?>
                                            },
                                            yAxis: {
                                                splitLine: {
                                                    show: false
                                                }
                                            },
                                            legend: {
                                                orient: 'horizontal',
                                                left: 'center',
                                                top: 25,
                                                data: ['?????????','?????????','????????????','????????????']
                                            },
                                            toolbox: {
                                                left: 'right',
                                                feature: {
                                                    restore: {},
                                                    saveAsImage: {}
                                                }
                                            },
                                            dataZoom: [{
                                                startValue: '<?php
                                                    $index = count($orderDays) > 30 ? count($orderDays)-30 : 0;
                                                    if(isset($orderDays[$index]))
                                                        echo $orderDays[$index];
                                                    ?>'
                                            }, {
                                                type: 'inside'
                                            }],
                                            visualMap: {
                                                top: 10,
                                                right: 10,
                                                pieces: [{
                                                    gt: 0,
                                                    lte: 50,
                                                    color: '#096'
                                                }, {
                                                    gt: 50,
                                                    lte: 100,
                                                    color: '#ffde33'
                                                }, {
                                                    gt: 100,
                                                    lte: 150,
                                                    color: '#ff9933'
                                                }, {
                                                    gt: 150,
                                                    lte: 200,
                                                    color: '#cc0033'
                                                }, {
                                                    gt: 200,
                                                    lte: 300,
                                                    color: '#660099'
                                                }, {
                                                    gt: 300,
                                                    color: '#7e0023'
                                                }],
                                                outOfRange: {
                                                    color: '#999'
                                                }
                                            },
                                            series: <?= json_encode($orderCategory)?>
                                        };
                                        var myChart = echarts.init(document.getElementById('ec-goods-count'),'light');
                                        myChart.setOption(option);
                                    })();
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(function init(){
        $('.search-item>.btn').on('click',function(){
            var that = $(this),value = that.data('value'),p = that.parent(),name = p.data('name'),form = p.parents();
            form.find('input[name="'+name+'"]').val(value);
            $('input[name=export]').val(0);
            form.submit();
        });
        $('.search-item-value').each(function(){
            var that = $(this),name = that.attr('name'), value = that.val(),dom = $('.search-item[data-name="'+name+'"] .btn[data-value="'+value+'"]');
            dom.eq(0).removeClass('btn-outline btn-link').addClass('btn-primary btn-sm')
                .siblings().addClass('btn-outline btn-link').removeClass('btn-primary btn-sm')
        });
    });
    $('.btn-order').on('click',function(){
        var that = $(this),value = that.data('value');
        $('input[name=order]').val(value);
        $('input[name=export]').val(0);
        $('form').submit();
    });
    var dateInput =$('.datepicker');
    dateInput.daterangepicker({
        autoUpdateInput: false,
        "opens": "center",
        "drops": "down",
        "ranges": {
            '??????': [moment(), moment().add(1, 'days')],
            '??????': [moment().subtract(1, 'days'), moment()],
            '??????': [moment().subtract(6, 'days'), moment()],
            '???30???': [moment().subtract(29, 'days'), moment()],
            '??????': [moment().startOf('month'), moment().endOf('month')],
            '??????': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        "locale"??:??{
            applyLabel??:??'??????',
            cancelLabel??:??'??????',
            fromLabel??:??'????????????',
            toLabel??:??'????????????',
            format : 'YYYY/MM/DD',
            customRangeLabel??:??'?????????',
            daysOfWeek??:??[??'???',??'???',??'???',??'???',??'???',??'???',??'???'??],
            monthNames??:??[??'??????',??'??????',??'??????',??'??????',??'??????',??'??????',
                '??????',??'??????',??'??????',??'??????',??'?????????',??'?????????'??],
            firstDay??:??1
        }
    });

    dateInput.on('cancel.daterangepicker', function(ev, picker) {
        //$("input[name=limit_time]").val('');
    });
    dateInput.on('apply.daterangepicker', function(ev, picker) {
        $("input[name=data]").val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        $('input[name=export]').val(0);
        $('form').submit();
    });
</script>


</div>
</body>
</html>
