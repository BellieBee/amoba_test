<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
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
