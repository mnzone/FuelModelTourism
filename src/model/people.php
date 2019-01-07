<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/16
 * Time: 下午11:51
 */

class Model_People extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples';

    protected static $_primary_key = ['id'];


    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'user' => [
            'model_to' => 'Model_User',
            'key_from' => 'parent_id',
            'key_to'   => 'id',
        ],
        'wxa' => [
            'model_to' => 'Model_UserConnect',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
            'conditions' => [
                'where' => [
                    'platform' => 'WXAPP'
                ]
            ]
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'favorites' => [
            'model_to' => 'Model_Favorite',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'address' => [
            'model_to' => 'Model_Address',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'cars'  => [
            'model_to' => 'Model_PeopleCar',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ]
    ];

    public static $_maps = [
        'gender'    => [
            '0' => '保密',
            '1' => '男',
            '2' => '女',
        ]
    ];

    /**
     * 根据手机号获取用户信息
     *
     * @param $cellphone    手机号
     * @return mixed
     */
    public static function get_by_cellphone($cellphone){
        $people = Model_People::query()
            ->where([
                'cellphone' => $cellphone
            ])
            ->get_one();

        return $people;
    }
}