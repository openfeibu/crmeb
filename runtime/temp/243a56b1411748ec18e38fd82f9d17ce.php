<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"/home/vagrant/Code/crmeb/application/admin/view/order/store_order/index.php";i:1545062348;s:68:"/home/vagrant/Code/crmeb/application/admin/view/public/container.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:64:"/home/vagrant/Code/crmeb/application/admin/view/public/style.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_footer.php";i:1545062348;}*/ ?>
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

<div class="layui-fluid">
    <div class="layui-row layui-col-space15"  id="app">
        <!--????????????-->
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">????????????</div>
                <div class="layui-card-body">
                    <div class="layui-carousel layadmin-carousel layadmin-shortcut" lay-anim="" lay-indicator="inside" lay-arrow="none" style="background:none">
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space10 layui-form-item">
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">????????????:</label>
                                    <div class="layui-input-block" v-cloak="">
                                        <button class="layui-btn layui-btn-sm" :class="{'layui-btn-primary':where.status!==item.value}" @click="where.status = item.value" type="button" v-for="item in orderStatus">{{item.name}}
                                            <span v-if="item.count!=undefined" :class="item.class!=undefined ? 'layui-badge': 'layui-badge layui-bg-gray' ">{{item.count}}</span></button>
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">????????????:</label>
                                    <div class="layui-input-block" v-cloak="">
                                        <button class="layui-btn layui-btn-sm" :class="{'layui-btn-primary':where.type!=item.value}" @click="where.type = item.value" type="button" v-for="item in orderType">{{item.name}}
                                            <span v-if="item.count!=undefined" class="layui-badge layui-bg-gray">{{item.count}}</span></button>
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">????????????:</label>
                                    <div class="layui-input-block" data-type="data" v-cloak="">
                                        <button class="layui-btn layui-btn-sm" type="button" v-for="item in dataList" @click="setData(item)" :class="{'layui-btn-primary':where.data!=item.value}">{{item.name}}</button>
                                        <button class="layui-btn layui-btn-sm" type="button" ref="time" @click="setData({value:'zd',is_zd:true})" :class="{'layui-btn-primary':where.data!='zd'}">?????????</button>
                                        <button type="button" class="layui-btn layui-btn-sm layui-btn-primary" v-show="showtime==true" ref="date_time"><?php echo $year['0']; ?> - <?php echo $year['1']; ?></button>
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">?????????:</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_name" style="width: 50%" v-model="where.real_name" placeholder="???????????????????????????????????????" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <div class="layui-input-block">
                                        <button @click="search" type="button" class="layui-btn layui-btn-sm layui-btn-normal">
                                            <i class="layui-icon layui-icon-search"></i>??????</button>
                                        <button @click="excel" type="button" class="layui-btn layui-btn-warm layui-btn-sm export" type="button">
                                            <i class="fa fa-floppy-o" style="margin-right: 3px;"></i>??????</button>
                                        <button @click="refresh" type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                                            <i class="layui-icon layui-icon-refresh" ></i>??????</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end-->
        <!-- ??????????????????-->
        <div :class="item.col!=undefined ? 'layui-col-sm'+item.col+' '+'layui-col-md'+item.col:'layui-col-sm6 layui-col-md3'" v-for="item in badge" v-cloak="" v-if="item.count > 0">
            <div class="layui-card">
                <div class="layui-card-header">
                    {{item.name}}
                    <span class="layui-badge layuiadmin-badge" :class="item.background_color">{{item.field}}</span>
                </div>
                <div class="layui-card-body">
                    <p class="layuiadmin-big-font">{{item.count}}</p>
                    <p v-show="item.content!=undefined">
                        {{item.content}}
                        <span class="layuiadmin-span-color">{{item.sum}}<i :class="item.class"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <!--enb-->
    </div>
    <!--??????-->
    <div class="layui-row layui-col-space15" >
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">????????????</div>
                <div class="layui-card-body">
                    <table class="layui-hide" id="List" lay-filter="List"></table>
                    <!--??????-->
                    <script type="text/html" id="order_id">
                       <h4>{{d.order_id}}</h4>
                       <span style="color: {{d.color}};">{{d.pink_name}}</span>??????
                    </script>
                    <!--????????????-->
                    <script type="text/html" id="userinfo">
                       {{d.nickname==null ? '????????????':d.nickname}}/{{d.uid}}
                    </script>
                    <!--????????????-->
                    <script type="text/html" id="paid">
                        {{#  if(d.pay_type==1){ }}
                                <p>{{d.pay_type_name}}</p>
                        {{#  }else{ }}
                            {{# if(d.pay_type_info!=undefined){ }}
                                <p><span>????????????</span></p>
                                <p><button type="button" class="btn btn-w-m btn-white">????????????</button></p>
                            {{# }else{ }}
                                <p>{{d.pay_type_name}}</p>
                            {{# } }}
                        {{# }; }}
                    </script>
                    <!--????????????-->
                    <script type="text/html" id="status">
                       {{d.status_name}}
                    </script>
                    <!--????????????-->
                    <script type="text/html" id="info">
                        {{#  layui.each(d._info, function(index, item){ }}
                        {{#  if(item.cart_info.productInfo.attrInfo!=undefined){ }}
                        <p>
                            <span>
                                <img style="width: 30px;height: 30px;cursor: pointer;" src="{{item.cart_info.productInfo.attrInfo.image}}">
                            </span>
                            <span>{{item.cart_info.productInfo.store_name}}&nbsp;{{item.cart_info.productInfo.attrInfo.suk}}</span>
                            <span> | ???{{item.cart_info.truePrice}}??{{item.cart_info.cart_num}}</span>
                        </p>
                        {{#  }else{ }}
                        <p>
                            <span><img style="width: 30px;height: 30px;cursor: pointer;" src="{{item.cart_info.productInfo.image}}"></span>
                            <span>{{item.cart_info.productInfo.store_name}}</span><span> | ???{{item.cart_info.truePrice}}??{{item.cart_info.cart_num}}</span>
                        </p>
                        {{# } }}
                        {{#  }); }}
                    </script>
                    <!--??????-->
                    <script type="text/html" id="order_info">
                        <button class="btn btn-white btn-bitbucket btn-xs" onclick="$eb.createModalFrame('{{d.nickname}}-????????????','<?php echo Url('order_info'); ?>?oid={{d.id}}')">
                            <i class="fa fa-file-text"></i> ????????????
                        </button>
                    </script>
                    <script type="text/html" id="act">
                        {{#  if(d._status==1){ }}
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('edit'); ?>?id={{d.id}}')">
                                    <i class="fa fa-file-text"></i> ????????????
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);" >
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==2){ }}
                        <button class="btn btn-primary btn-xs" type="button" onclick="$eb.createModalFrame('?????????','<?php echo Url('deliver_goods'); ?>?id={{d.id}}',{w:400,h:300})">
                            <i class="fa fa-cart-plus"></i> ?????????</button>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a  href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('delivery'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-motorcycle"></i> ?????????
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);" >
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            {{#  if(d.pay_price!=d.refund_price){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('??????','<?php echo Url('refund_y'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-history"></i> ????????????
                                </a>
                            </li>
                            {{#  }else if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('integral_back'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ?????????
                                </a>
                            </li>
                            {{# } ;}}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==3){ }}
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a  href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('delivery'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-motorcycle"></i> ?????????
                                </a>
                            </li>
                            {{#  if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('integral_back'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-history"></i> ?????????
                                </a>
                            </li>
                            {{# }else if(d.pay_price != d.refund_price){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('??????','<?php echo Url('refund_y'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-history"></i>????????????
                                </a>
                            </li>
                            {{# } ;}}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('refund_n'); ?>?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-openid"></i> ?????????
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==4){ }}
                        <button class="btn btn-default btn-xs" type="button" onclick="$eb.createModalFrame('????????????','<?php echo Url('distribution'); ?>?id={{d.id}}')">
                            <i class="fa fa-cart-arrow-down"></i> ????????????</button>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a lay-event='marke' href="javascript:void(0);" >
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            <li>
                                <a lay-event='danger' href="javascript:void(0);">
                                    <i class="fa fa-cart-arrow-down"></i> ?????????
                                </a>
                            </li>
                            {{#  if(d.pay_price != d.refund_price){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('??????','<?php echo Url('refund_y'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ????????????
                                </a>
                            </li>
                            {{# }else if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('integral_back'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ?????????
                                </a>
                            </li>
                            {{# } }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==5 || d._status==6){ }}
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a lay-event='marke' href="javascript:void(0);" >
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            {{#  if(d.pay_price != d.refund_price){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('??????','<?php echo Url('refund_y'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ????????????
                                </a>
                            </li>
                            {{# }else if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('integral_back'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ?????????
                                </a>
                            </li>
                            {{# } }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==7){ }}
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">?????? <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a lay-event='marke' href="javascript:void(0);" >
                                    <i class="fa fa-paste"></i> ????????????
                                </a>
                            </li>
                            {{# if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('?????????','<?php echo Url('integral_back'); ?>?id={{d.id}}')">
                                    <i class="fa fa-history"></i> ?????????
                                </a>
                            </li>
                            {{# } }}
                            <li>
                                <a href="javascript:void(0);" onclick="$eb.createModalFrame('????????????','<?php echo Url('order_status'); ?>?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> ????????????
                                </a>
                            </li>
                        </ul>
                        {{#  }; }}
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!--end-->
</div>
<script src="{__ADMIN_PATH}js/layuiList.js"></script>



<script>
    layList.tableList('List',"<?php echo Url('order_list',['real_name'=>$real_name]); ?>",function (){
        return [
            {field: 'order_id', title: '?????????', sort: true,event:'order_id',width:'12%',templet:'#order_id'},
            {field: 'nickname', title: '????????????',templet:'#userinfo',width:'10%'},
            {field: 'info', title: '????????????',templet:"#info",width:'36%'},
            {field: 'pay_price', title: '????????????',width:'8%'},
            {field: 'paid', title: '????????????',templet:'#paid',width:'8%'},
            {field: 'status', title: '????????????',templet:'#status',width:'8%'},
            {field: 'order_info', title: '??????',templet:'#order_info',width:'8%'},
            {field: 'right', title: '??????',align:'center',toolbar:'#act',width:'10%'},
        ];
    });
    layList.tool(function (event,data,obj) {
        switch (event) {
            case 'marke':
                var url =layList.U({c:'order.store_order',a:'remark'}),
                    id=data.id,
                    make=data.remark;
                $eb.$alert('textarea',{title:'???????????????',value:make},function (result) {
                    if(result){
                        $.ajax({
                            url:url,
                            data:'remark='+result+'&id='+id,
                            type:'post',
                            dataType:'json',
                            success:function (res) {
                                if(res.code == 200) {
                                    $eb.$swal('success',res.msg);
                                }else
                                    $eb.$swal('error',res.msg);
                            }
                        })
                    }else{
                        $eb.$swal('error','???????????????????????????');
                    }
                });
                break;
            case 'danger':
                var url =layList.U({c:'order.store_order',a:'take_delivery',p:{id:data.id}});
                $eb.$swal('delete',function(){
                    $eb.axios.get(url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                        }else
                            return Promise.reject(res.data.msg || '????????????')
                    }).catch(function(err){
                        $eb.$swal('error',err);
                    });
                },{'title':'????????????????????????????????????','text':'????????????????????????,??????????????????','confirm':'?????????????????????'})
                break;
        }
    })
    //?????????
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    function dropdown(that){
        var oEvent = arguments.callee.caller.arguments[0] || event;
        oEvent.stopPropagation();
        var offset = $(that).offset();
        var top=offset.top-$(window).scrollTop();
        var index = $(that).parents('tr').data('index');
        $('.layui-nav-child').each(function (key) {
            if (key != index) {
                $(this).hide();
            }
        })
        if($(document).height() < top+$(that).next('ul').height()){
            $(that).next('ul').css({
                'padding': 10,
                'top': - ($(that).parents('td').height() / 2 + $(that).height() + $(that).next('ul').height()/2),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }else{
            $(that).next('ul').css({
                'padding': 10,
                'top':$(that).parents('td').height() / 2 + $(that).height(),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }
    }
    var real_name='<?=$real_name?>';
    var orderCount=<?=json_encode($orderCount)?>;
    require(['vue'],function(Vue) {
        new Vue({
            el: "#app",
            data: {
                badge: [],
                orderType: [
                    {name: '??????', value: ''},
                    {name: '????????????', value: 1,count:orderCount.general},
                    {name: '????????????', value: 2,count:orderCount.pink},
                    {name: '????????????', value: 3,count:orderCount.seckill},
                ],
                orderStatus: [
                    {name: '??????', value: ''},
                    {name: '?????????', value: 0,count:orderCount.wz},
                    {name: '?????????', value: 1,count:orderCount.wf,class:true},
                    {name: '?????????', value: 2,count:orderCount.ds},
                    {name: '?????????', value: 3,count:orderCount.dp},
                    {name: '????????????', value: 4,count:orderCount.jy},
                    {name: '?????????', value: -1,count:orderCount.tk,class:true},
                    {name: '?????????', value: -2,count:orderCount.yt},
                ],
                dataList: [
                    {name: '??????', value: ''},
                    {name: '??????', value: 'yesterday'},
                    {name: '??????', value: 'today'},
                    {name: '??????', value: 'week'},
                    {name: '??????', value: 'month'},
                    {name: '?????????', value: 'quarter'},
                    {name: '??????', value: 'year'},
                ],
                where:{
                    data:'',
                    status:'',
                    type:'',
                    real_name:real_name || '',
                    excel:0,
                },
                showtime: false,
            },
            watch: {

            },
            methods: {
                setData:function(item){
                    var that=this;
                    if(item.is_zd==true){
                        that.showtime=true;
                        this.where.data=this.$refs.date_time.innerText;
                    }else{
                        this.showtime=false;
                        this.where.data=item.value;
                    }
                },
                getBadge:function() {
                    var that=this;
                    layList.basePost(layList.Url({c:'order.store_order',a:'getBadge'}),this.where,function (rem) {
                        that.badge=rem.data;
                    });
                },
                search:function () {
                    this.getBadge();
                    layList.reload(this.where);
                },
                refresh:function () {
                    layList.reload();
                    this.getBadge();
                },
                excel:function () {
                    this.where.excel=1;
                    location.href=layList.U({c:'order.store_order',a:'order_list',q:this.where});
                }
            },
            mounted:function () {
                var that=this;
                that.getBadge();
                layList.laydate.render({
                    elem:this.$refs.date_time,
                    trigger:'click',
                    eventElem:this.$refs.time,
                    range:true,
                    change:function (value){
                        that.where.data=value;
                    }
                });
            }
        })
    });
</script>


</div>
</body>
</html>
