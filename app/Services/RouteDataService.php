<?php

namespace App\Services;

use App\Models\RouteData;

class RouteDataService
{
    public function getRouteDataPeriod($route_id) {
        $data = [];
        $route_data = RouteData::where('route_id', $route_id)->first();
        $data['date_init'] = $route_data->date_init;
        $data['date_finish'] = $route_data->date_finish;
        $data['calendar_id'] = $route_data->calendar_id;
        return $data;
    }

    public function getFrequencyDays($calendar_id, $start_date, $end_date) {
        $data = [];
        $route_data = RouteData::where('calendar_id', $calendar_id)
            ->where('date_init', '<=', $start_date)
            ->where('date_finish', '>=' ,$end_date)->get();

        foreach ($route_data as $key => $rd) {
            $data[$key]['date_init'] = $rd->date_init;
            $data[$key]['date_end'] = $rd->date_finish;
            if ($rd->mon === 0) {
                $data[$key]['mon'] = $rd->mon;
            }
            if ($rd->tue === 0) {
                $data[$key]['tue'] = $rd->tue;
            }
            if ($rd->wed === 0) {
                $data[$key]['wed'] = $rd->wed;
            }
            if ($rd->thu === 0) {
                $data[$key]['thu'] = $rd->thu;
            }
            if ($rd->fri === 0) {
                $data[$key]['fri'] = $rd->fri;
            }
            if ($rd->sat === 0) {
                $data[$key]['sat'] = $rd->sat;
            }
            if ($rd->sun === 0) {
                $data[$key]['sun'] = $rd->sun;
            }
        }
        return $data;
    }
}
