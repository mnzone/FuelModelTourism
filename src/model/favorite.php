<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/16
 * Time: 下午11:42
 */

class Model_Favorite extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'favorites';

    protected static $_primary_key = ['id'];


    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'article' => [
            'model_to' => 'Model_Article',
            'key_from' => 'biz_id',
            'key_to'   => 'id',
        ],
        'itinerary' => [
            'model_to' => 'Model_Itinerary',
            'key_from' => 'biz_id',
            'key_to'   => 'id',
        ],
    ];
}