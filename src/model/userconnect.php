<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/17
 * Time: 下午5:14
 */

class Model_UserConnect extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'users_connects';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'people' => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id'
        ],
        'user'  => [
            'model_to' => 'Model_User',
            'key_from' => 'parent_id',
            'key_to'   => 'id'
        ]
    ];
}