<?php
/**
 * Created by PhpStorm.
 * User: fl
 * Date: 2018/11/1
 * Time: 下午2:40
 */

class Model_Itinerary extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'itineraries';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'category' => [
            'model_to' => 'Model_Category',
            'key_from' => 'category_id',
            'key_to' => 'id',
        ]
    ];

    /**
     * @var array $_has_one relationships
     */
    protected static $_has_one = [
        'leader' => [
            'model_to' => 'Model_ItineraryLeader',
            'key_from' => 'id',
            'key_to' => 'itinerary_id',
        ],
        'parameter' => [
            'model_to' => 'Model_ItineraryParameter',
            'key_from' => 'id',
            'key_to' => 'itinerary_id',
        ]
    ];

    /**
     * @var array    has_many relationships
     */
    protected static $_has_many = [
        'galleries' => [
            'model_to' => 'Model_ItineraryGallery',
            'key_from' => 'id',
            'key_to' => 'itinerary_id',
        ],
        'comments' => [
            'model_to' => 'Model_ItineraryComment',
            'key_from' => 'id',
            'key_to' => 'itinerary_id',
        ],
    ];

    public static $_maps = [
        'cars_categories' => [
            '轿车两驱' => 'http://img.5itongxing.com/e9a0d970cdedf7cac1f019b84f4ccf24',
            'SUV两驱' => 'http://img.5itongxing.com/21ae81336a40faf966562e0623e8f490',
            'SUV四驱' => 'http://img.5itongxing.com/21ae81336a40faf966562e0623e8f490',
            '越野车全领域' => 'http://img.5itongxing.com/21ae81336a40faf966562e0623e8f490',
            '越野车硬派' => 'http://img.5itongxing.com/21ae81336a40faf966562e0623e8f490',
        ]
    ];
}