<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Services\DayDisabledService;
use App\Services\ReservationService;
use App\Services\RouteDataService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
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

    public function show($id) {
        try {
            $data = [];
            $disabled_days = [];
            $frequency_days = [];
            $reservation_days = [];
            $service_days = [];
            $capacity_route = [];
            $period_data = $this->route_data_service->getRouteDataPeriod($id);
            $disabled_days = $this->day_disabled_service->getDaysDisabled($period_data['calendar_id'], $period_data['date_init'], $period_data['date_finish']);
            $frequency_days = $this->route_data_service->getFrequencyDays($period_data['calendar_id'], $period_data['date_init'], $period_data['date_finish']);
            $reservation_days = $this->reservation_service->getReservationDays($period_data['date_init'], $period_data['date_finish']);
            $service_days = $this->services_service->getServiceDays($period_data['date_init'], $period_data['date_finish']);
            $capacity_route = $this->services_service->getCapacity($period_data['date_init'], $period_data['date_finish']);
            $data = [
                'date_init' => $period_data['date_init'],
                'date_finish' => $period_data['date_finish'],
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
            $route = Route::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($route, 201);
    }
}
