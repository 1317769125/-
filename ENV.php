<?php

class ENV
{
    private static $_env = [];

    public static function parse($file)
    {
        if (!file_exists($file)) {
            throw new Exception('file is not exits!');
        }
        if (!is_readable($file)) {
            throw new Exception('file is not readable!');
        }

        $source = fopen($file,'r');

        while (!feof($source)) {
            $line = fgets($source,4096);
            list($key, $value) = self::parseLine($line);
            if (!empty($key)) {
                self::$_env[$key] = $value;
            }
        }
        fclose($source);
    }

    public static function parseLine($line)
    {
        $array = explode('=', $line);
        return array_map('trim', $array);
    }

    public static function get($key, $default = '')
    {
        if (isset(self::$_env[$key])) {
            return self::$_env[$key];
        }else{
            $env = getenv($key);
            if ($env) {
                return $env;
            }else{
                return $default;
            }
        }
    }
}

if (!function_exists('env')) {
    function env($key, $default='')
    {
        return ENV::get($key, $default);
    }
}

ENV::parse('1.txt');
echo env('pass');