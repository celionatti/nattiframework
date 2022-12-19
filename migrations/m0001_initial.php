<?php

use app\core\Application;

/**
 * User: Celio natti
 * Date: 19/12/2022
 * Time: 1:40 pm
 */

class m0001_initial
{
    public function up()
    {
        $db = Application::$app->database;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->database;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}