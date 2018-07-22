<?php
namespace App;

Class Util
{
    public static function mysqlDateTimeConverter($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}


?>