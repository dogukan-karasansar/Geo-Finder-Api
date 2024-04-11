<?php

namespace App\Api\Auth\Controllers;

use App\Api\Auth\Requests\RegisterRequest;
use App\Api\Auth\Requests\TokenRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function token(TokenRequest $request)
    {
        if (!$request->checkAuth()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $request->user()->generateToken()]);
    }


    public function register(RegisterRequest $request)
    {
        try {
            User::create($request->all());

            return response()->json(['message' => 'Successful Register'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 400);
        }
    }
}
