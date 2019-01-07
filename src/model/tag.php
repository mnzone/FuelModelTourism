<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/3/5
 * Time: 10:09
 */


class Model_Tag extends \Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'tags';

    protected static $_primary_key = ['id'];

    /**
     * @var array   defined observers
     */
    protected static $_observers = [
        'Orm\\Observer_CreatedAt' => [
            'events' => ['before_insert'],
            'property' => 'created_at',
            'mysql_timestamp' => false
        ],
        'Orm\\Observer_UpdatedAt' => [
            'events' => ['before_update'],
            'property' => 'updated_at',
            'mysql_timestamp' => false
        ],
        'Orm\\Observer_Self' => [
            'events' => ['before_insert', 'before_update'],
            'property' => 'user_id'
        ],
    ];

    /**
     * @var array	many_many relationships
     */
    protected static $_many_many = array(
        'articles' => array(
            'key_from' => 'id',
            'model_to' => '\Model_Article',
            'key_to' => 'id',
            'table_through' => 'articles_tags',
            'key_through_from' => 'tag_id',
            'key_through_to' => 'article_id',
        )
    );

    /**
     * before_insert observer event method
     */
    public function _event_before_insert()
    {
        // assign the user id that lasted updated this record
        $this->user_id = ($this->user_id = \Auth::get_user_id()) ? $this->user_id[1] : 0;
    }

    /**
     * before_update observer event method
     */
    public function _event_before_update()
    {
        $this->_event_before_insert();
    }

    public static function get_by_tag($tag){
        $tag = Model_Tag::query()
            ->where(['tag' => $tag])
            ->get_one();

        return $tag;
    }
}