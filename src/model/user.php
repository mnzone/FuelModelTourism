<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/16
 * Time: 下午11:44
 */

class Model_User extends \Auth\Model\Auth_User
{
    /**
     * @var array $_has_one relationships
     */
    protected static $_has_one = [
        'people' => [
            'model_to' => 'Model_People',
            'key_from' => 'id',
            'key_to'   => 'parent_id',
        ]
    ];

    public static function get_by_email($value){
        $user = Model_User::query()
            ->where([
                'email'  => $value
            ])
            ->get_one();

        return $user;
    }

    public static function get_by_username($value){
        $user = Model_User::query()
            ->where([
                'username'  => $value
            ])
            ->get_one();

        return $user;
    }

}