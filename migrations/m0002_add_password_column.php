<?php

use app\core\Application;

/**
 * User: Celio natti
 * Date: 19/12/2022
 * Time: 03:48 pm
 */

class m0002_add_password_column
{
    public function up()
    {
        $db = Application::$app->database;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL");
    }

    public function down()
    {
        $db = Application::$app->database;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL");
    }
}