<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/12
 * Time: 下午11:22
 */

abstract class Model_Base extends \Orm\Model
{
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

    /**
     * 获取分页数据
     *
     * @param   object      $query            查询对象
     * @param   int         $per_count        每页返回数据量
     * @return array
     */
    public static function get_pagination($query, $per_count = 10){
        //分页查询
        $count = $query->count();

        $config = array(
            'pagination_url' => "",
            'total_items'    => $count,
            'per_page'       => $per_count,
            'uri_segment'    => 'start',
            'show_first'     => true,
            'show_last'      => true
        );

        $pagination = new \Pagination($config);

        $result = $query
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();

        return [$result, $pagination];
    }
}