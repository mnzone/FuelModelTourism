<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/11/19
 * Time: 11:39 AM
 */

class Model_Team extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'teams';

    protected static $_primary_key = ['id'];

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
     * @var array $_has_one relationships
     */
    protected static $_has_one = [
        'extend' => [
            'model_to' => 'Model_TeamExtend',
            'key_from' => 'id',
            'key_to'   => 'team_id',
        ],
        'leader'    => [
            'model_to' => 'Model_TeamLeader',
            'key_from' => 'id',
            'key_to'   => 'team_id',
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'galleries' => [
            'model_to' => 'Model_TeamGallery',
            'key_from' => 'id',
            'key_to'   => 'team_id',
            'conditions' => [
                'where' => [
                    'type'  => 2,
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'banner' => [
            'model_to' => 'Model_TeamGallery',
            'key_from' => 'id',
            'key_to'   => 'team_id',
            'conditions' => [
                'where' => [
                    'type'  => 1,
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'enlist' => [
            'model_to' => 'Model_TeamEnlist',
            'key_from' => 'id',
            'key_to'   => 'team_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'viewers'   => [
            'model_to' => 'Model_TeamViewer',
            'key_from' => 'id',
            'key_to'   => 'team_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
        'comments'   => [
            'model_to' => 'Model_TeamComment',
            'key_from' => 'id',
            'key_to'   => 'team_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'ASC'
                ]
            ]
        ],
    ];

    public static $_maps = [
        'status'    => [
            10  => '报名中',
            20  => '进行中',
            30  => '已封队',
            40  => '已结束'
        ]
    ];

}