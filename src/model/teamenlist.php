<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 1:43 PM
 */

class Model_TeamEnlist extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'teams_enlist';

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
        'parent'    => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];

    public static function is_exists($team_id, $user_id){
        $viewer = Model_TeamEnlist::query()
            ->where([
                'team_id' => $team_id,
                'parent_id' => $user_id
            ])
            ->get_one();

        return $viewer;
    }

}