<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/25
 * Time: 5:33 PM
 */

class Model_Region extends Model_Nestedset
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'regions';

    protected static $_primary_key = array('id');

    protected static $_tree = [
        'left_field' => 'lft',
        'right_field' => 'rgt',
        'tree_field' => 'tree',
        'title_field' => 'name',
    ];



    /**
     * 获取指定对象的children
     *
     * @return array
     */
    public function all(){
        if( ! $this->has_children()){
            return NULL;
        }

        return $this->get_children($this->children()->get());
    }

    private function get_children($items){
        $values = [];
        foreach ($items as $item){

            $value = [
                'id'    => $item->id,
                'name'  => $item->name,
                'status' => ''
            ];

            if($item->has_children()){
                $value['children'] = $this->get_children($item->children()->get());
            }

            array_push($values, $value);
        }

        return $values;
    }
}