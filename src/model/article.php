<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/12
 * Time: 下午11:38
 */

class Model_Article extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles';

    protected static $_primary_key = ['id'];


    /**
     * @var array has_one relationships
     */
    protected static $_has_one = [
        'extend' => [
            'model_to' => 'Model_ArticleExtend',
            'key_from' => 'id',
            'key_to'   => 'article_id',
        ]
    ];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'category' => [
            'model_to' => 'Model_Category',
            'key_from' => 'article_id',
            'key_to'   => 'id',
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'comments' => [
            'model_to' => 'Model_ArticleComment',
            'key_from' => 'id',
            'key_to'   => 'article_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0,
                    'comment_id' => 0
                ],
                'order_by' => [
                    'id'      => 'DESC'
                ]
            ]
        ]
    ];

    /**
     * @var array	many_many relationships
     */
    protected static $_many_many = array(
        'tags' => array(
            'key_from' => 'id',
            'model_to' => '\Model_Tag',
            'key_to' => 'id',
            'table_through' => null,
            'key_through_from' => 'article_id',
            'key_through_to' => 'tag_id',
        )
    );

    public static $_maps = [
        'status'    => [
            0   => '正常',
            1   => '下架'
        ]
    ];
}