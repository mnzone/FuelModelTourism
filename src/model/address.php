<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/17
 * Time: 上午10:37
 */

class Model_Address extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples_address';

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
}