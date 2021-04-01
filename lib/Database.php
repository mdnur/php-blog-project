<?php
//require_once '../config/Config.php';


class Database {
    private static $pdo;
   
    public static function Connection(){
        if(!isset(self::$pdo)){
            try {
                self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
            } catch (PDOException $e) {
                echo "Connection fail...".$e->getMessage();
            }
        }
        return self::$pdo;
    }
    
    public static function prepare($sql) {
        return self::Connection()->prepare($sql);
    }
    
}
