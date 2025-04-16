<?php

namespace App\Http\Controllers\auth;

use App\Http\Resources\InstitutionResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use ApiResponse;
    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        $register = $authService->register($request->validated());
        return $this->ok([
            'institution' => new InstitutionResource($register['institution']),
        ]);
    }
}
