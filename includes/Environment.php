<?php
class Environment {
    private static $variables = [];

    public static function load() {
        if (!file_exists(__DIR__ . '/../.env')) {
            throw new Exception('El archivo .env no existe');
        }

        $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            if (strpos($line, '#') === 0) continue;
            
            list($key, $value) = explode('=', $line, 2);
            self::$variables[trim($key)] = trim($value);
        }
    }

    public static function get($key, $default = null) {
        return self::$variables[$key] ?? $default;
    }
} 