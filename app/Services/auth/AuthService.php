<?php

namespace App\Services\auth;

use Exception;
use App\Models\User;
use App\Traits\ApiException;
use App\Services\UserService;

class AuthService
{
    use ApiException;
    public function register(array $data): array
    {
        try {
            $userService = new UserService();
            $user = $userService->create($data);
            $token = $this->generateToken($user);
            $user->token = $token;
            return [
                'token' => $token,
                'user' => $user,
            ];
        } catch (\Throwable $th) {
            $this->badRequestException('Não foi possível criar o usuário: '.$th->getMessage());
        } catch (Exception $e) {
            $this->serverErrorException($e->getMessage());
        }

    }

    private function generateToken(User $user): string
    {
        try {
            $token = $user->createToken('authToken')->plainTextToken;
            return $token;
        } catch (\Throwable $th) {
            $this->badRequestException('Não foi possível gerar o token, tente novamente. '.$th->getMessage());
        } catch (\Exception $e) {
            $this->serverErrorException($e->getMessage());
        }
    }
}
