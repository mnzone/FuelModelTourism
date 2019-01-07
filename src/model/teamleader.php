<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 12:36 PM
 */

class Model_TeamLeader extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'teams_leaders';

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