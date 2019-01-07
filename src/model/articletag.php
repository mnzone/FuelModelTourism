<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/3/5
 * Time: 10:00
 */


class Model_ArticleTag extends \Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles_tags';

    protected static $_primary_key = [];

    /**
     * @var array belongs_to relationships
     */
    protected static $_belongs_to = array(
        'article' => [
            'model_to' => 'Model_Article',
            'key_from' => 'article_id',
            'key_to'   => 'id',
        ]
    );
}