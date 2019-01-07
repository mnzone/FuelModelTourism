<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/23
 * Time: 2:56 PM
 */

class Model_MalfunctionGallery extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'malfunctions_galleries';

    protected static $_primary_key = array('id');

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'malfunction'   => [
            'model_to' => 'Model_Malfunction',
            'key_from' => 'malfunction_id',
            'key_to'   => 'id',
        ]
    ];

}