<?php

namespace App\Service;


use Carbon\Carbon;

class TimeConverter
{
    public static function fromUnix($unixTime){
        return Carbon::createFromTimestamp($unixTime);
    }

}