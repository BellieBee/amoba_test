<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function getServiceDays($start_date, $end_date) {
        $data = [];
        $services_data = Service::where('timestamp', $start_date)->orWhere('timestamp', $end_date)->get();
        foreach ($services_data as $key => $service) {
            $data[$key]['day'] = $service->timestamp;
        }
        return $data;
    }

    public function getCapacity($start_date, $end_date) {
        $data = [];
        $services_data = Service::where('timestamp', $start_date)->orWhere('timestamp', $end_date)->get();
        foreach ($services_data as $key => $service) {
            $data[$key]['capacity'] = $service->capacity;
        }
        return $data;
    }
}
