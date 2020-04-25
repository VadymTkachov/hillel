<?php

global $db;


/**
 * Class MyDb
 */
class MyDb
{
    /**
     * @var array
     */
    private static array $args = [];

    /**
     * @param string $dbName
     */
    public static function init(string $dbName)
    {
        self::$args = [
            'user'     => 'root',
            'password' => 'root',
            'dsn'      => "mysql:host=localhost;dbname={$dbName}",
            'opt'      => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ],
        ];
    }

    /**
     * @return PDO
     */
    public static function getDb()
    {
        try {
            return new PDO(self::$args['dsn'], self::$args['user'], self::$args['password'], self::$args['opt']);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}


MyDb::init('shop_db');
$db = MyDb::getDb();
