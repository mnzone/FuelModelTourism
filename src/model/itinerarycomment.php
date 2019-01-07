<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/23
 * Time: 11:05 AM
 */

class Model_ItineraryComment extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'itineraries_comments';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'itinerary' => [
            'model_to' => 'Model_Itinerary',
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