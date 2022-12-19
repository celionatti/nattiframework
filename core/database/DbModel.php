<?php 

/** User: Celio Natti ***/

namespace app\core\database;

use app\core\Model;
use app\core\Application;

/**
 * Class DbModel
 * 
 * @author celio natti <celionatti@gmail.com>
 * @package app\core
 */

 abstract class DbModel extends Model
 {
    abstract public function tableName(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->database->prepare($sql);
    }

 }