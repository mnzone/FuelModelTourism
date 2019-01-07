<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/17
 * Time: 下午12:01
 */

class Model_OrderAddress extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'orders_address';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'order' => [
            'model_to' => 'Model_Order',
            'key_from' => 'order_id',
            'key_to'   => 'id',
        ]
    ];
}