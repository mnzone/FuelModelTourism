<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/12
 * Time: 下午11:25
 */

class Model_Category extends Model_Nestedset
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'categories';

    protected static $_primary_key = ['id'];
}