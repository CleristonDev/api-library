<?php

namespace App\Services\auth;

use Exception;
use App\Models\User;
use App\Services\InstitutionService;
use App\Traits\ApiException;

class AuthService
{
    use ApiException;

    private InstitutionService $institutionService;
    public function __construct(
        InstitutionService $institutionService
    ) {
        $this->institutionService = $institutionService;
    }
    public function register(array $data): array
    {

        try {
            $institution = $this->institutionService->create($data);
            return [
                'institution' => $institution,
            ];
        } catch (\Throwable $th) {
            throw $th;
            $this->badRequestException('Não foi possível criar o usuário: ');
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
