<?php
/**
 *
 * File： productsku.php
 * Author: Jeremy.wang
 * Created: 2019/6/12 下午 07:14
 * Describe:
 */

class Model_ProductSku extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'products_skus';

    protected static $_primary_key = ['id'];

    protected static $_properties = [
        'id'    => [
            'label' => '标识',
            'data_type' => 'int',
        ],
        'sku_name'  => [
            'label' => 'SKU名称',
            'data_type' => 'varchar',
            'default'   => ''
        ],
        'product_id'   => [
            'label' => '所属产品ID',
            'data_type' => 'int',
            'default'   => 0
        ],
        'quantity_limit'   => [
            'label' => '限购数量',
            'data_type' => 'int',
            'default'   => 0
        ],
        'quantity'   => [
            'label' => '库存数量',
            'data_type' => 'int',
            'default'   => 0
        ],
        'discount'   => [
            'label' => '折扣',
            'data_type' => 'decimal',
            'default'   => 1
        ],
        'spec'   => [
            'label' => '规格',
            'data_type' => 'varchar',
            'default'   => 50
        ],
        'price'     =>  [
            'label' => '产品单价',
            'data_type' => 'decimal',
            'default'   => 0
        ],
        'created_at'    => [
            'label' => '创建时间戳',
            'data_type' => 'int',
            'default'   => 0
        ],
        'updated_at'    => [
            'label' => '更新时间戳',
            'data_type' => 'int',
            'default'   => 0
        ],
        'deleted_at'    => [
            'label' => '删除时间戳',
            'data_type' => 'int',
            'default'   => 0
        ]
    ];

    protected static $_rules = [
//        'name' => 'required',
//        'price' => 'required',
//        'category_id' => 'required',
    ];

    protected static $_to_array_exclude = [
        'product_id',
        'deleted_at',
        'updated_at'
    ];

    protected static $_belongs_to = [
        'product' => [
            'key_from' => 'product_id',
            'model_to' => 'Model_Product',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ]
    ];
}