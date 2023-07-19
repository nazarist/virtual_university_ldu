<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login', 'register']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        return $this->isAuthorized($credentials);
    }


    public function register(RegisterRequest $request): JsonResponse
    {
        $credentials = $request->validated();


        User::query()->create($credentials);

        return $this->isAuthorized($credentials);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function isAuthorized($formData): JsonResponse
    {
        if (!$token = auth()->attempt($formData))
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Config::get('jwt.ttl'),
        ]);
    }
}
