<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    use ApiResponse;
    public function listAll(UserService $userService, Request $request): JsonResponse
    {

        return $this->ok($userService->listAll($request->all()));
    }

    public function create(UserService $userService, Request $request): JsonResponse
    {
        $user = $userService->create($request->all());
        return $this->ok($user);
    }

    public function update(UserService $userService, Request $request, User $user): JsonResponse
    {
        $user = $userService->update($user, $request->all());
        return $this->ok($user);
    }


}
