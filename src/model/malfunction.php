<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/23
 * Time: 2:50 PM
 */

class Model_Malfunction extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'malfunctions';

    protected static $_primary_key = array('id');

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'category' => [
            'model_to' => 'Model_Category',
            'key_from' => 'category_id',
            'key_to'   => 'id',
        ]
    ];

    /**
     * @var array    has_many relationships
     */
    protected static $_has_many = [
        'galleries' => [
            'model_to' => 'Model_MalfunctionGallery',
            'key_from' => 'id',
            'key_to' => 'malfunction_id',
        ]
    ];

    public static $_maps = [
        'status'    => [
            10  => '等待救援',
            20  => '已派遣救援队',
            30  => '救援队已抵达',
            40  => '完成救援',
            50  => '取消救援'
        ]
    ];

}