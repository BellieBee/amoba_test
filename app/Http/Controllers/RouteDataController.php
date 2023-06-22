<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\RouteData;
use Illuminate\Support\Facades\DB;

class RouteDataController extends Controller
{
    public function store(Request $request) {
        dd($request->all());
        try {
            DB::beginTransaction();
            $route_data = RouteData::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($route_data, 201);
    }
}
