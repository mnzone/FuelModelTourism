<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 2:16 PM
 */

class Model_TeamComment extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'teams_comments';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'team' => [
            'model_to' => 'Model_Team',
            'key_from' => 'team_id',
            'key_to'   => 'id',
        ],
        'author'    => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];

}