<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/23
 * Time: 7:47 PM
 */

class Model_PeopleCar extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples_cars';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'people' => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'apply' => [
            'model_to' => 'Model_PeopleCarApply',
            'key_from' => 'id',
            'key_to'   => 'car_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
    ];
}