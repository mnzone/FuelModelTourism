<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/12
 * Time: 下午11:24
 */

abstract class Model_Nestedset extends \Orm\Model_Nestedset
{
    protected static $_tree = [
        'left_field' => 'lft',
        'right_field' => 'rgt',
        'tree_field' => 'tree',
        'title_field' => 'name',
    ];

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

    public static function get_array($children){
        $items = [];
        foreach ($children as $child){
            $item = $child->to_array();
            if($child->has_children()){
                $item['children'] = static::get_array($child->children()->get());
            }
            array_push($items, $item);
        }
        return $items;
    }

    /**
     * 获取当前节点所有子节点的id数组
     *
     * @return array|null
     */
    public function get_children_ids(){
        if( ! $this->has_children()){
            return NULL;
        }

        $result = $this->get_ids($this->children()->get());

        return $result;
    }

    private function get_ids($children){
        $ids = [];
        foreach ($children as $child){
            array_push($ids, $child->id);
            if($child->has_children()){
                $value = $this->get_ids($child->children()->get());
                $ids = array_merge($ids, $value);
            }
        }
        return $ids;
    }
}