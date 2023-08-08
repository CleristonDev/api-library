<?php

namespace App\Http\Controllers\auth;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\auth\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiResponse;
    public function register(Request $request, AuthService $authService): JsonResponse
    {
        $register = $authService->register($request->all());
        return $this->ok($register);
    }
}
