<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function getReservationDays($start_date, $end_date) {
        $data = [];
        $reservations_data = Reservation::where('reservation_start', '>=' , $start_date)
            ->where('reservation_end', '<=', $end_date)->get();
        foreach ($reservations_data as $key => $reservation) {
            $data[$key]['reservation_start'] = $reservation->reservation_start;
            $data[$key]['reservation_end'] = $reservation->reservation_end;
        }
        return $data;
    }
}
