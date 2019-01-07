<?php
/**
 * Created by PhpStorm.
 * User: fl
 * Date: 2018/10/27
 * Time: 下午3:37
 */

class Model_Ad extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'ads';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'position' => [
            'model_to' => 'Model_AdPosition',
            'key_from' => 'position_id',
            'key_to'   => 'id',
        ]
    ];

    public static $_maps = [
        'action'    => [
            0   => '无动作',
            1   => '网页地址',
            2   => '微信小程序页面',

        ]
    ];
}