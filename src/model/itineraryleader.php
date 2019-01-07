<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 10:07 AM
 */

class Model_ItineraryLeader extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'itineraries_leaders';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'itinerary'   => [
            'model_to' => 'Model_Itinerary',
            'key_from' => 'itinerary_id',
            'key_to'   => 'id',
        ]
    ];
}