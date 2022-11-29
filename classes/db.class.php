<?php

class DB{
    public static function connect()
    {
        $host = "localhost";
        $base = "projeto";
        $user = "postgres";
        $pass = "mttpocos";
        
        return new PDO("pgsql:host={$host};dbname={$base}', '{$user}', '{$pass}'");
    }
}
