<?php 

/** User: Celio Natti ***/

namespace app\core\form;

use app\core\Model;

/**
 * Class Form
 * 
 * @author Celio natti <celionatti@gmail.com>
 * @package app\core\form
 */

 class Form
 {
    public static function begin($action, $method, $enctype = '')
    {
        echo sprintf('<form action="%s" method="%s" enctype="%s">', $action, $method, $enctype);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
 }