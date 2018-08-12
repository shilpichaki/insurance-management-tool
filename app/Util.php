<?php
namespace App;

Class Util
{
    public static function mysqlDateTimeConverter($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public static function addMinutes($dateTime,$noOfMinutes)
    {
        $time = strtotime($dateTime);
        return date('Y-m-d H:i:s', strtotime('+' . $noOfMinutes . ' minutes',$time));
    }
}


?>