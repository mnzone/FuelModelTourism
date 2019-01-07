<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/20
 * Time: 10:17 PM
 */

class Model_RescueTeamApply extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'rescues_teams_apply';

    protected static $_primary_key = array('id');

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'category' => [
            'model_to' => 'Model_Category',
            'key_from' => 'category_id',
            'key_to'   => 'id',
        ],
        'people'   => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];
}