<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Services\DayDisabledService;
use App\Services\ReservationService;
use App\Services\RouteDataService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public $day_disabled_service;
    public $route_data_service;
    public $reservation_service;
    public $services_service;

    public function __construct(DayDisabledService $day_disabled_service, RouteDataService $route_data_service, ReservationService $reservation_service, ServiceService $services_service)
    {
        $this->day_disabled_service = $day_disabled_service;
        $this->route_data_service = $route_data_service;
        $this->reservation_service = $reservation_service;
        $this->services_service = $services_service;
    }

    public function search ($id, $start_date, $end_date) {
        $data = [];
        $disabled_days = [];
        $frequency_days = [];
        $reservation_days = [];
        $service_days = [];
        $capacity_route = [];

        try {
            $disabled_days = $this->day_disabled_service->getDaysDisabled($id, $start_date, $end_date);
            $frequency_days = $this->route_data_service->getFrequencyDays($id, $start_date, $end_date);
            $reservation_days = $this->reservation_service->getReservationDays($start_date, $end_date);
            $service_days = $this->services_service->getServiceDays($start_date, $end_date);
            $capacity_route = $this->services_service->getCapacity($start_date, $end_date);
            $data = [
                'disabled_days' => $disabled_days,
                'frequency_days' => $frequency_days,
                'reservation_days' => $reservation_days,
                'service_days' => $service_days,
                'capacity_route' => $capacity_route
            ];
        } catch (Exception $e) {
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $calendar = Calendar::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($calendar, 201);
    }
}
