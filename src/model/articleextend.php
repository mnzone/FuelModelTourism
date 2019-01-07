<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/13
 * Time: 下午12:26
 */

class Model_ArticleExtend extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles_extends';

    protected static $_primary_key = ['id'];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = [
        'article' => [
            'model_to' => 'Model_Article',
            'key_from' => 'article_id',
            'key_to'   => 'id',
        ]
    ];
}