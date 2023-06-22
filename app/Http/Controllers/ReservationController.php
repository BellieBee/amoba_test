<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $reservation = Reservation::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($reservation, 201);
    }
}
