{extend name="public/container"}
{block name="content"}

<div class="layui-fluid">
    <div class="layui-row layui-col-space15"  id="app">
        <!--列表-->
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">商品类型列表</div>
                <div class="layui-card-body">
                    <div class="layui-btn-container">
                        <a class="layui-btn layui-btn-sm" href="{:Url('index')}">商品类型首页</a>
                        <button type="button" class="layui-btn layui-btn-sm" onclick="$eb.createModalFrame(this.innerText,'{:Url('create')}')">添加商品类型</button>
                    </div>
                    <table class="layui-hide" id="List" lay-filter="List"></table>

                    <script type="text/html" id="act">
                        <button class="layui-btn layui-btn-xs" onclick="javascript:window.location.href='{:Url('attribute_index')}?type_id={{d.id}}'">
                            属性列表
                        </button>
                        <button class="layui-btn layui-btn-xs" onclick="$eb.createModalFrame('编辑','{:Url('edit')}?id={{d.id}}')">
                            <i class="fa fa-paste"></i> 编辑
                        </button>
                        <button class="layui-btn layui-btn-xs" lay-event='delstor'>
                            <i class="fa fa-warning"></i> 删除
                        </button>
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{__ADMIN_PATH}js/layuiList.js"></script>
{/block}
{block name="script"}
<script>
    setTimeout(function () {
        $('.alert-info').hide();
    },3000);
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('List',"{:Url('type_ist')}",function (){
        return [
            {field: 'id', title: 'ID', sort: true,event:'id',width:'6%'},
            {field: 'type_name', title: '商品类型名称',edit:'type_name'},
            {field: 'right', title: '操作',align:'center',toolbar:'#act',width:'20%'},
        ];
    });

    //自定义方法
    var action= {
        set_type: function (field, id, value) {
            layList.baseGet(layList.Url({
                c: 'store.store_product_type',
                a: 'set_type',
                q: {field: field, id: id, value: value}
            }), function (res) {
                layList.msg(res.msg);
            });
        },
    }

    //快速编辑
    layList.edit(function (obj) {
        var id=obj.data.id,value=obj.value;
        console.log(obj);
        switch (obj.field) {
            case 'type_name':
                action.set_type('type_name',id,value);
                break;
        }
    });
    //监听并执行排序
    layList.sort(['id','sort'],true);
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
            case 'delstor':
                var url=layList.U({c:'store.store_product_type',a:'delete',q:{id:data.id}});
                $eb.$swal('delete',function(){
                    $eb.axios.get(url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                            obj.del();
                        }else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                        $eb.$swal('error',err);
                    });
                })
                break;
            case 'open_image':
                $eb.openImage(data.pic);
                break;
        }
    })
</script>
{/block}
