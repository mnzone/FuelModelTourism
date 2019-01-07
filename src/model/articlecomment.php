<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/29
 * Time: 9:37 AM
 */

class Model_ArticleComment extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles_comments';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'article'   => [
            'model_to' => 'Model_Article',
            'key_from' => 'article_id',
            'key_to'   => 'id',
        ],
        'author'    => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id'
        ],
        'parent'   => [
            'model_to' => 'Model_ArticleComment',
            'key_from' => 'comment_id',
            'key_to'   => 'id'
        ]
    ];

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = [
        'comments' => [
            'model_to' => 'Model_ArticleComment',
            'key_from' => 'id',
            'key_to'   => 'comment_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'DESC'
                ]
            ]
        ]
    ];
}