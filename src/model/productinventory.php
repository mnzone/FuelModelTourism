<?php

class Model_ProductInventory extends Model_Base
{
	protected static $_properties = array(
		"id" => array(
			"label" => "标识",
			"data_type" => "int",
		),
		"product_id" => array(
			"label" => "产品ID",
			"data_type" => "int",
            'default'   => 0
		),
		"sku_id" => array(
			"label" => "SKU ID",
			"data_type" => "int",
            'default'   => 0
		),
		"agent_id" => array(
			"label" => "代理ID",
			"data_type" => "int",
            'default'   => 0
		),
		"quantity" => array(
			"label" => "库存数量",
			"data_type" => "int",
            'default'   => 0
		),
		"user_id" => array(
			"label" => "操作人ID",
			"data_type" => "int",
            'default'   => 0
		),
        "deleted_at" => array(
            "label" => "删除时间戳",
            "data_type" => "int",
            'default'   => 0
        ),
		"created_at" => array(
			"label" => "创建时间戳",
			"data_type" => "int",
            'default'   => 0
		),
		"updated_at" => array(
			"label" => "更新时间戳",
			"data_type" => "int",
            'default'   => 0
		)
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'products_inventories';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
        'product' => [
            'key_from' => 'product_id',
            'model_to' => 'Model_Product',
            'key_to' => 'id'
        ],
        'sku' => [
            'key_from' => 'sku_id',
            'model_to' => 'Model_ProductSku',
            'key_to' => 'id'
        ],
        'user' => [
            'key_from' => 'user_id',
            'model_to' => 'Model_People',
            'key_to' => 'parent_id'
        ],
        'agent' => [
            'key_from' => 'agent_id',
            'model_to' => 'Model_Agent',
            'key_to' => 'id'
        ]
	);

}
