<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/26
 * Time: 5:39 PM
 */

class Model_PeopleTrade extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples_trades';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'parent' => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];
}