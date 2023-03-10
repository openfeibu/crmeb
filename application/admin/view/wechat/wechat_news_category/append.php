{extend name="public/container"}
{block name="head_top"}
<link href="{__ADMIN_PATH}plug/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<link href="{__ADMIN_PATH}module/wechat/news/css/style.css" type="text/css" rel="stylesheet">
<link href="{__FRAME_PATH}css/plugins/chosen/chosen.css" rel="stylesheet">
<script type="text/javascript" src="{__ADMIN_PATH}plug/umeditor/third-party/jquery.min.js"></script>
<script type="text/javascript" src="{__ADMIN_PATH}plug/umeditor/third-party/template.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{__ADMIN_PATH}plug/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{__ADMIN_PATH}plug/umeditor/umeditor.min.js"></script>
<script src="{__ADMIN_PATH}plug/validate/jquery.validate.js"></script>
<script src="{__FRAME_PATH}js/plugins/chosen/chosen.jquery.js"></script>
<script src="{__ADMIN_PATH}plug/vue/dist/vue.min.js"></script>
<style>
    .operation-item{float: right;font-size: 14px;cursor: pointer}
    .add-news-items{cursor:pointer;text-align: center;font-size: 40px;height: 54px;line-height: 54px;border: 1px solid #ccc;}
    .news-item-title{
        position: relative;
        width: 280px;
        height: 80px;
        max-width: 270px;
        overflow: hidden;
        border: 1px solid #ccc;
        background-size: cover;
        background-position: center center;
    }
    .other{
        width: 100%;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center;
        border-radius: 5px 5px 0 0;
        height: 80px;
        padding: 5px 0;
    }
    .right-text{
        float: left;
        width: 200px;
        height: 100%;
        padding: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
     .left-image {
        width: 50px;
        height: 50px;
        float: left;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center;
    }
    .active {
        border: 1px solid #44b549!important;
    }
</style>
{/block}
{block name="content"}
<div id="app">
    <div class="row" style="width: 100%">
        <div class="col-sm-12" style="margin-left: 20px;min-height: 200px">
            <div class="col-sm-2 panel panel-default news-left">
                <div class="panel-heading">????????????</div>
                <div class="panel-body news-box type-all" v-for="(item,index) in newList">
                    <div class="operation-item">
<!--                        <span class="glyphicon glyphicon-chevron-up" aria-hidden="true" @click="itemUp(index)"></span>-->
<!--                        <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" @click="itemDown(index)"></span>-->
                        <span class="glyphicon glyphicon-trash" aria-hidden="true" @click="itemDel(index)"></span>
                    </div>
                    <div v-if="index==0">
                        <div  class="news-item transition news-image" :class="action==index ? 'active' :''" style="margin-bottom: 20px" @click="isShow(index)">
                            <img :src="item.image_input" style="width: 100%;height: 100%;"/>
                        </div>
                        <div @click="isShow(index)"><span v-text="item.title"></span></div>
                    </div>
                    <div v-else class="news-item-title transition news-image" :class="action==index ? 'active' :''" style="margin-bottom: 20px" @click="isShow(index)">
                        <div class="news_articel_item other">
                            <div class="right-text" v-text="item.title"></div>
                            <img class="left-image" :src="item.image_input"/>
                        </div>
                    </div>
                </div>
                <div class="add-news-items" @click="addItem"><span>+</span></div>
            </div>
            <div class="col-sm-8 panel panel-default news-right">
                <div class="panel-heading">??????????????????</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="signupForm">
                        <div class="layui-form-item">
                            <label class="layui-form-label">??????</label>
                            <div class="layui-input-block">
                                <input type="text" name="title" maxlength="64" size="68"  v-model="newListIndex.title"  placeholder="????????????????????????" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">??????</label>
                            <div class="layui-input-block">
                                <input maxlength="8" size="20" placeholder="???????????????" name="author" class="layui-input" v-model="newListIndex.author">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">??????</label>
                            <div class="layui-input-block">
                                <div style="margin-left: 20px;height:auto">
                                    <p class="help-block" style="border: 1px solid #ddd;padding: 6px 10px;width: 80px;margin-top:10px;color:#000;cursor: pointer;" @click="addImage">????????????</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-left: 20px;">
                                <label style="color:#aaa">??????</label>
                                <textarea type="text/plain" id="myEditor" style="width:96%;">{{newListIndex.content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-left: 20px;">
                                <label style="color:#aaa">??????</label>
                                <textarea class="layui-input" style="width:80%;height:60px;resize:none;line-height:20px;color: #ccc" v-model="newListIndex.synopsis"></textarea>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-w-m btn-info" style="width: 100%;" @click="submit">??????????????????</button>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}
{block name="script"}
<script>
    $('#app').parent().removeClass('fadeInUp');
    window.$list = <?php echo json_encode($list);?>;
    window.$id = "{$id}";
    window.$author = "{$author}";
    console.log($list);
    var _vue = new Vue({
        el:'#app',
        data:{
            indexItem:0,
            newList : $list,
            action:0,
            newListIndex:{
                'id':0,
                'title':'',
                'author':$author,
                'content':'',
                'image_input':'/public/system/module/wechat/news/images/image.png',
                'synopsis':''
            }
        },
        methods:{
            swapNewList:function (arr, index1, index2) {
                arr[index1] = arr.splice(index2, 1, arr[index1])[0];
                return arr;
            },
            itemUp:function (indexItem) {
                var that = this;
                if(indexItem){
                    that.newList = that.swapNewList(that.newList, indexItem, parseInt(indexItem) - parseInt(1));
                    if(indexItem == that.indexItem){
                        if(that.newList.length == 1) that.setNewListIndex(0);
                        else that.setNewListIndex(parseInt(indexItem) + parseInt(1));
                    }else{
                        if(indexItem < that.indexItem){
                            that.indexItem = parseInt(that.indexItem) + parseInt(1);
                            that.setNewListIndex(that.indexItem);
                        }
                    }
                }else return $eb.message('error','?????????????????????????????????');
            },
            itemDown:function (indexItem) {
                var that = this;
                var length = parseInt(that.newList.length) - parseInt(1);
                if(indexItem != length){
                    that.newList = that.swapNewList(that.newList, indexItem, parseInt(indexItem) + parseInt(1));
                    if(indexItem == that.indexItem){
                        if(that.newList.length == 1) that.setNewListIndex(0);
                        else that.setNewListIndex(parseInt(indexItem) + parseInt(1));
                    }else{
                        if(indexItem < that.indexItem){
                            that.indexItem = parseInt(that.indexItem) + parseInt(1);
                            that.setNewListIndex(that.indexItem);
                        }
                    }
                }else return $eb.message('error','?????????????????????????????????');
            },
            itemDel:function (indexItem) {
                var that = this;
                if(that.newList.length == 1) return $eb.message('error','??????????????????');
                that.newList.splice(indexItem,1);
                if(indexItem == that.indexItem){
                    if(that.newList.length == 1) that.setNewListIndex(0);
                    else that.setNewListIndex(parseInt(indexItem) + parseInt(1));
                }else{
                    if(indexItem < that.indexItem){
                        that.indexItem = parseInt(that.indexItem) + parseInt(1);
                        that.isShow(that.indexItem);
                    }
                }
            },
            setNewListIndex:function (indexItem) {
                var that = this;
                that.indexItem = indexItem;
                that.newListIndex = that.newList[indexItem];
                setContent(that.newListIndex.content);
            },
            submit:function () {
              var that = this;
                that.isShow(0);
                for (index in that.newList){
                    if(that.newList[index].title == ''){
                        return $eb.message('error','????????????'+(parseInt(index)+1)+'??????????????????');
                    }
                    if(that.newList[index].author == ''){
                        return $eb.message('error','????????????'+(parseInt(index)+1)+'??????????????????');
                    }
                    if(that.newList[index].synopsis == ''){
                        return $eb.message('error','????????????'+(parseInt(index)+1)+'??????????????????');
                    }
                    if(that.newList[index].content == ''){
                        return $eb.message('error','????????????'+(parseInt(index)+1)+'??????????????????');
                    }
                }
                $.ajax({
                    url:"{:Url('append_save')}",
                    data:{list:that.newList,id:$id},
                    type:'post',
                    dataType:'json',
                    success:function(res){
                        if(res.code == 200){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                            return $eb.message('success',res.msg);
                        }else{
                            return $eb.message('error',res.msg);
                        }
                    }
                })
            },
            addImage:function () {
                createFrame('????????????','{:Url('widget.images/index')}');
            },
            isShow:function (indexItem) {
                var that = this;
                this.action=indexItem;
                that.newListIndex.content = getContent();
                that.newList[that.indexItem] = that.newListIndex;
                that.indexItem = indexItem;
                for (index in that.newList){
                    if(index == indexItem) that.newListIndex = that.newList[index]
                }
                setContent(that.newListIndex.content);
            },
            addItem:function () {
                var arr = {
                    'id':0,
                    'title':'',
                    'author':$author,
                    'content':'',
                    'image_input':'/public/system/module/wechat/news/images/image.png',
                    'synopsis':''
                }
                this.newList.push(arr);
            }
        },
        mounted:function () {
            console.log(this.newList);
            this.newListIndex = this.newList[this.indexItem]
        }
    })
    function changeIMG(index,pic){
        _vue._data.newListIndex.image_input = pic;
        _vue._data.newList[_vue._data.indexItem].image_input = pic;
    };
</script>
<script>
        var editor = document.getElementById('myEditor');
        editor.style.height = '300px';
        //??????????????????
        var um = UM.getEditor('myEditor',{
            //        fullscreen:true
        });
        /**
         * ???????????????????????????
         * */
        function getContent() {
            return (UM.getEditor('myEditor').getContent());
        }
        function hasContent() {
            return (UM.getEditor('myEditor').hasContents());
        }
        function setContent(content) {
            return (UM.getEditor('myEditor').setContent(content));
        }
        function createFrame(title,src,opt){
            opt === undefined && (opt = {});
            return layer.open({
                type: 2,
                title:title,
                area: [(opt.w || 700)+'px', (opt.h || 650)+'px'],
                fixed: false, //?????????
                maxmin: true,
                moveOut:false,//true  ??????????????????  false ??????????????????
                anim:5,//???????????? isOutAnim bool ????????????
                offset:'auto',//['100px','100px'],//'auto',//????????????  ['100px','100px'] t[ ??? ???]
                shade:0,//??????
                resize:true,//??????????????????
                content: src,//??????
                move:'.layui-layer-title'
            });
        }
    </script>
{/block}