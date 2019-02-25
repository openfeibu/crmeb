<?php

namespace app\admin\controller\store;

use app\admin\controller\AuthController;
use service\FormBuilder as Form;
use app\admin\model\store\StoreProductAttr;
use app\admin\model\store\StoreProductAttrResult;
use app\admin\model\store\StoreProductRelation;
use app\admin\model\system\SystemConfig;
use service\JsonService;
use traits\CurdControllerTrait;
use service\UtilService as Util;
use service\JsonService as Json;
use service\UploadService as Upload;
use think\Request;
use think\Url;
use app\admin\model\store\StoreProductType as ProductTypeModel;
use app\admin\model\store\StoreAttribute as AttributeModel;
use app\admin\model\system\SystemAttachment;

/**
 * 商品类型管理
 * Class StoreProductType
 * @package app\admin\controller\store
 */
class StoreProductType extends AuthController
{
    public function index()
    {
        return $this->fetch();
    }
    /**
     * 异步查找商品类型列表
     *
     * @return json
     */
    public function type_ist(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
        ]);
        return JsonService::successlayui(ProductTypeModel::TypeList($where));
    }
    public function create()
    {
        $field = [
            Form::input('type_name','商品类型名称'),
        ];
        $form = Form::make_post_form('添加商品类型',$field,Url::build('save'),2);
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }
    public function save(Request $request)
    {
        $data = Util::postMore([
            'type_name',
        ],$request);
        ProductTypeModel::create($data);
        return Json::successful('添加商品类型成功!');
    }

    public function set_type($field='',$id='',$value=''){
        $field=='' || $id=='' || $value=='' && JsonService::fail('缺少参数');
        if(ProductTypeModel::where(['id'=>$id])->update([$field=>$value]))
            return JsonService::successful('保存成功');
        else
            return JsonService::fail('保存失败');
    }

    public function edit($id)
    {
        $data = ProductTypeModel::get($id);
        $field = [
            Form::input('type_name','商品类型名称',$data->getData('type_name')),
        ];
        $form = Form::make_post_form('编辑商品类型',$field,Url::build('update',array('id'=>$id)),2);
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }

    public function edit_attr()
    {
        $field = [
            Form::input('type_name','属性名称'),
        ];
        $form = Form::make_post_form('商品属性',$field,Url::build('save'),2);
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }

    public function update(Request $request, $id)
    {
        $data = Util::postMore([
            'type_name',
        ],$request);
        if($data['type_name'] == '') return Json::fail('缺少参数');
        ProductTypeModel::edit($data,$id);
        return Json::successful('修改成功!');
    }

    public static function delete($id)
    {
        if(!ProductTypeModel::destroy($id))
        {
            return Json::fail(ProductTypeModel::getErrorInfo('删除失败,请稍候再试!'));
        }
        else
        {
            AttributeModel::where('type_id',$id)->delete();
            return Json::successful('删除成功!');
        }
    }

    public function attribute_index()
    {
        $type_id = $this->request->get('type_id',0);
        $this->assign('type_id',$type_id);
        $type_name = ProductTypeModel::where('id',$type_id)->value('type_name');
        $this->assign('type_name',$type_name);
        return $this->fetch();
    }

    public function attribute_list()
    {
        $where=Util::getMore([
            ['type_id',$this->request->param('type_id','')],
            ['page',1],
            ['limit',20],
        ]);
        return JsonService::successlayui(AttributeModel::AttributeList($where));
    }
    public function attribute_all()
    {
        $type_name = $this->request->param('type_name','');
        $type_id = ProductTypeModel::where('type_name',$type_name)->value('id');
        $where=Util::getMore([
            ['type_id',$type_id],
        ]);
        $data = AttributeModel::AttributeList($where);
        $list = $data['data'];
        return json_encode($list);
    }

    public function attribute_create()
    {
        $type_id = $this->request->get('type_id',0);
        $field = [
            Form::input('attr_name','属性名称'),
            Form::textarea('attr_values','可选值列表')->placeholder('一行代表一个可选值'),
            Form::hidden("type_id",$type_id),
        ];
        $form = Form::make_post_form('添加属性',$field,Url::build('attribute_save'),2);
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }
    public function attribute_save(Request $request)
    {
        $data = Util::postMore([
            'type_id',
            'attr_name',
            'attr_values',
        ],$request);
        if($data['type_id'] == '') return Json::fail('缺少参数');
        if($data['attr_name'] == '') return Json::fail('属性名称不能为空');
        if($data['attr_values'] == '') return Json::fail('可选值列表不能为空');
        AttributeModel::create($data);
        return Json::successful('添加属性成功!');
    }
    public function attribute_edit($id)
    {
        $data = AttributeModel::get($id);
        $field = [
            Form::input('attr_name','属性名称',$data->getData('attr_name')),
            Form::textarea('attr_values','可选值列表',$data->getData('attr_values'))->placeholder('一行代表一个可选值'),
            Form::hidden("type_id",$data->getData('type_id')),
        ];
        $form = Form::make_post_form('编辑属性',$field,Url::build('attribute_update',array('id'=>$id)),2);
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }

    public function attribute_update(Request $request, $id)
    {
        $data = Util::postMore([
            'type_id',
            'attr_name',
            'attr_values',
        ],$request);
        if($data['type_id'] == '') return Json::fail('缺少参数');
        if($data['attr_name'] == '') return Json::fail('属性名称不能为空');
        if($data['attr_values'] == '') return Json::fail('可选值列表不能为空');
        AttributeModel::edit($data,$id);
        return Json::successful('修改成功!');
    }

    public function attribute_delete($id)
    {
        if(!AttributeModel::destroy($id))
            return Json::fail(AttributeModel::getErrorInfo('删除失败,请稍候再试!'));
        else
            return Json::successful('删除成功!');
    }

}