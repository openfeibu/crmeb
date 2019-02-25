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
use app\admin\model\system\SystemConfig;

/**
 * 产品管理 model
 * Class StoreProduct
 * @package app\admin\model\store
 */
class StoreProductType extends ModelBasic
{
    public static function TypeList($where)
    {
        $model = new self;
        $data = ($data=$model->page((int)$where['page'],(int)$where['limit'])->select()) && count($data) ? $data->toArray() :[];
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