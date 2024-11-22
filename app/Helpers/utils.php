<?php
namespace App\Helpers;
class utils
{
    public static function getSlug($string)
    {
        $random_string= substr(md5(uniqid(mt_rand(), true)), 0, 10);
        return $string . '-' . $random_string;
        
    }
}