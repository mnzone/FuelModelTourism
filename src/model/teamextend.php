<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 12:28 PM
 */

class Model_TeamExtend extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'teams_extends';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'team' => [
            'model_to' => 'Model_Team',
            'key_from' => 'team_id',
            'key_to'   => 'id',
        ]
    ];

}