<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $user = User::create($request->all());
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'errorCode' => 500,
                'errorMessage' => $e->getMessage()
            ], 500);
        }

        return response()->json($user, 201);
    }
}
