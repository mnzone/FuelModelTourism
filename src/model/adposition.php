<?php
/**
 * Created by PhpStorm.
 * User: fl
 * Date: 2018/10/27
 * Time: 下午3:37
 */

class Model_AdPosition extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'ads_positions';

    protected static $_primary_key = ['id'];

    /**
     * @var array	has_many relationships
     */
    protected static $_has_many = array(
        'ads' => [
            'model_to' => 'Model_Ad',
            'key_from' => 'id',
            'key_to'   => 'position_id',
            'conditions' => [
                'where' => [
                    'is_deleted' => 0
                ],
                'order_by' => [
                    'id'      => 'DESC',
                    'sort'    => 'DESC'
                ]
            ]
        ]
    );

    public static function get_keyword($keyword){
        $location = Model_AdPosition::query()
            ->where([
                'key'   => $keyword
            ])
            ->get_one();

        return $location;
    }
}