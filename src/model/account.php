<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 2018/10/23
 * Time: 6:51 PM
 */

class Model_Account extends \Model_Base
{

    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'peoples_accounts';

    protected static $_primary_key = ['id'];

}