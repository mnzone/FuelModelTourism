<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/20
 * Time: 8:53 PM
 */

class Model_RescueTeam extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'rescues_teams';

    protected static $_primary_key = array('id');

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'category' => [
            'model_to' => 'Model_Category',
            'key_from' => 'category_id',
            'key_to'   => 'id',
        ]
    ];

    public static $_maps = [
        'status'    => [
            0   => '正常',
            10  => '待审核',
            20  => '已驳回',
            30  => '已下架'
        ]
    ];
}