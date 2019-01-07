<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/17
 * Time: 上午11:50
 */

class Model_Order extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'orders';

    protected static $_primary_key = ['id'];


    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'buyer' => [
            'model_to' => 'Model_People',
            'key_from' => 'buyer_id',
            'key_to'   => 'parent_id',
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'details' => [
            'model_to' => 'Model_OrderDetail',
            'key_from' => 'id',
            'key_to'   => 'order_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ]
    ];

    public static $_maps = [
        'status'    => [
            0   => '无',
            1   => '未付款',
            2   => '已付款',
            3   => '已完成'
        ],
        'status_keys'    => [
            0   => '',
            1   => 'unpaid',
            2   => 'paid',
            3   => 'finished'
        ]
    ];

    /**
     * 获取指定条件的数据量
     *
     * @param $where
     * @return mixed
     */
    public static function get_count($where){
        return \Model_Order::query()
            ->where($where)
            ->count();
    }

}