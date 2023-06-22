<?php

namespace App\Http\Controllers;

use App\Models\UserPlan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class UserPlanController extends Controller
{
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $user_plan = UserPlan::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($user_plan, 201);
    }
}
