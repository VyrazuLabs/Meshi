<?php

namespace app\Helpers;

use App\Helpers\Contracts\WeekDaysNameContract;

class WeekDaysNameTranslation implements WeekDaysNameContract
{
    public static function days()
    {
        $daysArray = [];
        $current_date = date("Y-m-d");
        $tomorrow = date('Y-m-d', strtotime($current_date . ' +1 day'));
        /* getting the days name of today and tomorrow */
        $current_day = date("D");
        $tomorrow_day = date('D', strtotime($current_date . ' +1 day'));

        $sunday = trans('app.Sun');
        $monday = trans('app.Mon');
        $tuesday = trans('app.Tue');
        $wednesday = trans('app.Wed');
        $thursday = trans('app.Thu');
        $friday = trans('app.Fri');
        $saturday = trans('app.Sat');

        $daysArray = ['Sun' => $sunday, 'Mon' => $monday, 'Tue' => $tuesday, 'Wed' => $wednesday, 'Thu' => $thursday, 'Fri' => $friday, 'Sat' => $saturday];

        return $daysArray;
    }
}
