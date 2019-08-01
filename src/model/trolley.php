<?php
/**
 *
 * File： trolley.php
 * Author: Jeremy.wang
 * Created: 2019/6/13 下午 01:51
 * Describe:
 */

class Model_Trolley extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'trolleys';

    protected static $_primary_key = ['id'];

    protected static $_properties = [
        'id'    => [
            'label' => '标识',
            'data_type' => 'int',
        ],
        'parent_id'   => [
            'label' => '所属账户ID',
            'data_type' => 'int',
            'default'   => 0
        ],
        'product_id'   => [
            'label' => '产品ID',
            'data_type' => 'int',
            'default'   => 0
        ],
        'price'     =>  [
            'label' => '产品单价',
            'data_type' => 'decimal',
            'default'   => 0
        ],
        'quantity'    => [
            'label' => '产品数量',
            'data_type' => 'int',
            'default'   => '0'
        ],
        'sku_id'    => [
            'label' => '所属SKU',
            'data_type' => 'int',
            'default'   => 0
        ],
        'created_at'    => [
            'label' => '创建时间戳',
            'data_type' => 'int',
            'default'   => 0
        ],
        'updated_at'    => [
            'label' => '创建时间戳',
            'data_type' => 'int',
            'default'   => 0
        ]
    ];

    protected static $_rules = [
        'name' => 'required',
        'price' => 'required',
        'category_id' => 'required',
    ];

    protected static $_to_array_exclude = [
        'deleted_at',
        'updated_at'
    ];

    protected static $_belongs_to = [
        'product' => [
            'key_from' => 'product_id',
            'model_to' => 'Model_Product',
            'key_to' => 'id'
        ],
        'people' => [
            'key_from' => 'parent_id',
            'model_to' => 'Model_People',
            'key_to' => 'parent_id'
        ]
    ];

    protected static $_has_many = [
        'sku' => [
            'key_from' => 'id',
            'model_to' => 'Model_ProductSku',
            'key_to' => 'product_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ]
    ];

    /**
     * 检测购物车中是否存在指定产品
     *
     * @param $parent_id
     * @param $product_id
     * @return \Orm\Model
     */
    public static function exists($parent_id, $product_id){
        return Model_Trolley::query()
            ->where([
                'parent_id' => $parent_id,
                'product_id'    => $product_id
            ])
            ->get_one();
    }

    /**
     * 批量删除购物车记录
     *
     * @param $ids
     */
    public static function batch_remove($ids){
        $table = \DB::table_prefix('trolleys');
        $sql = "DELETE FROM {$table} WHERE id IN({$ids})";
        \DB::query($sql)->execute();
    }

    /**
     * 获取购物车中产品总数
     *
     * @param $parent_id
     * @return mixed
     */
    public static function get_product_total($parent_id){
        $table = \DB::table_prefix('trolleys');

        $sql = "SELECT IFNULL(SUM(quantity), 0) AS total FROM {$table} WHERE parent_id = {$parent_id}";
        return \DB::query($sql)->execute()->as_array();
    }
}