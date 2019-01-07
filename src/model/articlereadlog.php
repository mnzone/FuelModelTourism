<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/25
 * Time: 11:31 AM
 */

class Model_ArticleReadLog extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles_reading_logs';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'article' => [
            'model_to' => 'Model_Article',
            'key_from' => 'article_id',
            'key_to'   => 'id',
        ],
        'parent' => [
            'model_to' => 'Model_People',
            'key_from' => 'parent_id',
            'key_to'   => 'parent_id',
        ],
    ];
}