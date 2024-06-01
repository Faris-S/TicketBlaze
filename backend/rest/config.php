<?php

// show error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE | E_DEPRECATED);

class Config{
    public static function DB_NAME(){
        return Config::get_env('DB_NAME', 'TicketBlaze');
    }
    public static function DB_PORT(){
        return Config::get_env('DB_PORT', '3306');
    }
    public static function DB_USER(){
        return Config::get_env('DB_USER', 'user');
    }
    public static function DB_PASSWORD(){
        return Config::get_env('DB_PASSWORD', 'user123');
    }
    public static function DB_HOST(){
        return Config::get_env('DB_HOST', '127.0.0.1');
    }
    public static function JWT_SECRET(){
        return Config::get_env('JWT_SECRET', 'T1ck3tBl4z3');
    }

    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) !== '' ? $_ENV[$name] : $default;
    }
}