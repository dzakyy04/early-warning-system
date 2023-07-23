<?php

namespace App\Helper;

use Carbon\Carbon;
use App\Models\Holiday;

class Helper
{
    public static function isHoliday($date)
    {
        $holiday = Holiday::where('holiday_date', $date)->first();
        return $holiday ? true : false;
    }

    public static function isWorkingDay($date)
    {
        $carbonDate = Carbon::parse($date);
        return $carbonDate->isWeekend() || self::isHoliday($date) ? false : true;
    }
}
