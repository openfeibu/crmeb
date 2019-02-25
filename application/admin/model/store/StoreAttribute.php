<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */

namespace app\admin\model\store;

use app\admin\model\wechat\WechatUser;
use app\admin\model\system\Merchant;
use service\PHPExcelService;
use think\Db;
use traits\ModelTrait;
use basic\ModelBasic;
use app\admin\model\ump\StoreCombination as StoreCombinationModel;
use app\admin\model\ump\StoreBargain as StoreBargainModel;
use app\admin\model\store\StoreProductType as ProductTypeModel;
use app\admin\model\system\SystemConfig;

/**
 * 产品管理 model
 * Class StoreProduct
 * @package app\admin\model\store
 */
class StoreAttribute extends ModelBasic
{
    public static function AttributeList($where)
    {
        $model = new self;
        if(isset($where['type_id']) && $where['type_id'])
        {
            $model = $model->where('type_id',$where['type_id']);
        }
        if(isset($where['page']) && $where['page'])
        {
            $model = $model->page((int)$where['page'],(int)$where['limit']);
        }
        $data = ($data=$model->select()) && count($data) ? $data->toArray() :[];
        foreach ($data as $key => &$item){
            $item['type_name'] = ProductTypeModel::where('id',$item['type_id'])->value('type_name');
            $data[$key]['attr_value_arr'] = explode("\n", $item['attr_values']);
            $data[$key]['attr_value_text'] = implode(',', $data[$key]['attr_value_arr']);
        }

        $count = $model->count();
        return compact('count','data');
    }
    public static function edit($data,$id,$field = null)
    {
        $model = new self;
        if(!$field) $field = $model->getPk();
        return false !== $model->update($data,[$field=>$id]);
    }
}