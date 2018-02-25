<?php
declare(strict_types=1);


abstract class Base {
    
    abstract public function validate();

    private static $_db;

    public function getDB() : mysqli
    {
        //Inicjalizacja połączenia z bazą
        if (!self::$_db){
            self::$_db = new mysqli('127.0.0.1', 'root','','bookstore');
        }
        return self::$_db;
    }

} 