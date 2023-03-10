<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"/home/vagrant/Code/crmeb/application/admin/view/system/system_upgradeclient/index.php";i:1545062348;s:68:"/home/vagrant/Code/crmeb/application/admin/view/public/container.php";i:1545062348;s:69:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_head.php";i:1545062348;s:64:"/home/vagrant/Code/crmeb/application/admin/view/public/style.php";i:1545062348;s:71:"/home/vagrant/Code/crmeb/application/admin/view/public/frame_footer.php";i:1545062348;}*/ ?>
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

<style>
    .code{
        color: #97824B;
        font-size: 3em;
        border: 2px solid #ccc;
        padding: 10px;
        width: 50%;
        margin: 0 auto;
        font-weight: 700;
        font-family: 'Raleway', sans-serif;
        visibility: visible;
        animation-duration: 1000ms;
        animation-delay: 500ms;
        text-align: center;
        -webkit-box-shadow:0 0 10px #000;
        -moz-box-shadow:0 0 10px #000;
        box-shadow:0 0 10px #000;
        cursor: pointer;
        border-radius: 2%;
    }
    .colore{
        background-color: #CCCCCC;
    }
    .code:hover{
        background-color:rgba(0,0,0,0.1);
    }
</style>
<div class="row">
    <div class="col-sm-12" id="upgrade">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-md">
                                <h2>???????????? <span style="font-size: 5px;color: red">??????????????????{{version}}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(isset($auth['code']) && $auth['code']==200 && isset($auth['data'])){if($auth['data']==1){?>
                                <div class="col-sm-12">
                                    <h4 class="code" @click="auto_upgrad()" v-text="content">???????????????</h4>
                                </div>
                            <?php }else{?>
                            <div class="col-sm-12">
                                <h4 class="code colore">?????????????????????</h4>
                            </div>
                            <?php }}else{?>
                                <div class="col-sm-12">
                                    <h4 class="code colore"><?php echo isset($auth['msg'])?$auth['msg']:'???????????????';?></h4>
                                </div>
                            <?php }?>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-sm-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li><a href="javascript:;">????????????</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="feed-activity-list">
                                                <div class="feed-element">
                                                    <div class="media-body">
                                                       <div class="col-sm-2">?????????</div>
                                                        <div class="col-sm-8">????????????</div>
                                                        <div class="col-sm-2">????????????</div>
                                                    </div>
                                                    <div  v-for="item in list" v-cloak="">
                                                        <hr>
                                                        <div class="media-body">
                                                            <div class="col-sm-2">{{item.version}}</div>
                                                            <div class="col-sm-8">{{item.content}}</div>
                                                            <div class="col-sm-2">{{item.add_time}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body" style="margin-top: 20px">
                                                    <div class="col-sm-12 text-center" style="font-size: 15px;cursor:pointer;color: #FOF8FF">
                                                        <div>
                                                            <span v-show="load==true" @click="getlist()">????????????</span>
                                                            <div class="sk-spinner sk-spinner-circle" v-show="loading==true">
                                                                <div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div>
                                                            </div>
                                                            <span v-show="load==false && loading==false">???????????????</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    require(['vue','axios','layer'],function(Vue,axios,layer){
        var version_code=<?php echo (int)$version_code;?>,
            version="<?php echo $version;?>";
        new Vue({
            el:"#upgrade",
            data:{
                list:[],
                page:1,
                limit:20,
                version:version,
                version_code:version_code,
                loading:false,
                load:false,
                content:'???????????????',
                count:0
            },
            watch:{
                count:function (n) {
                    console.log(n);
                    if(n<=0){
                        this.content='??????????????????';
                    }else{
                        this.content='??????'+this.count+'?????????????????? ????????????';
                    }
                }
            },
            methods:{
                getList:function () {
                    var that=this;
                    that.loading=true;
                    axios.post("<?php echo Url('get_list'); ?>",{page:this.page,limit:this.limit}).then(function (rem) {
                        var len=rem.data.data.list.length;
                        if(rem.data.code==200){
                            that.list=rem.data.data.list;
                        }
                        that.page=rem.data.data.page;
                        that.loading=false;
                        if(len<that.limit){
                            that.load=false;
                        }else{
                            that.load=true;
                        }
                    });
                },
                auto_upgrad:function () {
                    var that=this;
                    if(this.count<=0) return;
                     that.content='????????????????????????????????????????????????';
                    axios.post("<?php echo Url('auto_upgrad'); ?>",{id:this.version_code}).then(function (rem) {
                        if(rem.data.code==200){
                            that.version_code=rem.data.data.code;
                            that.version=rem.data.data.version;
                            that.count=0;
                        }else{
                            that.content=rem.data.msg;
                        }
                    })
                },
                get_new_version_conte:function (){
                    var that=this;
                    axios.post("<?php echo Url('get_new_version_conte'); ?>",{id:this.version_code}).then(function (rem) {
                        if(rem.data.code=200){
                            that.count=rem.data.data.count;
                            if(that.count==0) that.content='??????????????????';
                        }
                    })
                }
            },
            mounted:function () {
                this.getList()
                this.get_new_version_conte()
            }
        })
    })
</script>




</div>
</body>
</html>
