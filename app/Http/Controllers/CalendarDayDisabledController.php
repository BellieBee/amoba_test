<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\CalendarDayDisabled;
use Illuminate\Support\Facades\DB;

class CalendarDayDisabledController extends Controller
{
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $day_disabled = CalendarDayDisabled::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($day_disabled, 201);
    }
}
