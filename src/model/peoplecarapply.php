<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/23
 * Time: 7:47 PM
 */

class Model_PeopleCarApply extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples_cars_apply';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'people' => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ],
        'car'   => [
            'model_to' => 'Model_PeopleCar',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ]
    ];

    public static function get_processing($user_id){
        $apply = Model_PeopleCarApply::query()
            ->where([
                'parent_id' => $user_id,
                'status'    => 1
            ])
            ->get_one();

        return $apply;
    }
}