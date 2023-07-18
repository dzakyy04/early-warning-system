<?php

namespace App\Helper;

use App\Models\Holiday;

class Helper
{
    public static function isHoliday($date)
    {
        $holiday = Holiday::where('holiday_date', $date)->first();
        return $holiday ? true : false;
    }
}
