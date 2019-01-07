<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/17
 * Time: 上午11:58
 */

class Model_Product extends Model_Base
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'products';

    protected static $_primary_key = ['id'];

}