<?php 

/**
 * User: Celio natti
 * Date: 19/12/2022
 * Time: 10:37 PM
 */

namespace app\models;

use app\core\database\DbModel;

/**
 * Class UserModel
 * 
 * @author celio natti <celionatti@gmail.com>
 * @package app\models
 */

 abstract class UserModel extends DbModel
 {
    abstract public function getDisplayName(): string;
 }