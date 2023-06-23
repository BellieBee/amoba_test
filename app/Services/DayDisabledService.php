<?php

namespace App\Services;

use App\Models\CalendarDayDisabled;

class DayDisabledService
{
    public function getDaysDisabled($calendar_id, $start_date, $end_date) {
        $data = CalendarDayDisabled::where('calendar_id', $calendar_id)->whereBetween('day', [$start_date, $end_date])->get();
        return $data;
    }
}
