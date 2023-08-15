<?php

namespace App\Services;

use App\Mail\SendConfimedUserAccount;
use App\Models\User;
use App\Enums\UserStatus;
use App\Models\Institution;
use App\Traits\ApiException;
use Illuminate\Support\Facades\Mail;

class InstitutionService
{
    use ApiException;

    public function create(array $data): Institution
    {
        try {
            $institution = Institution::create($this->sanitazeData($data));
            return $institution;
        } catch (\Throwable $th) {
            throw $th;
            $this->badRequestException('Não foi possível criar a instituição: ');
        }
    }

    private function sanitazeData(array &$data): array
    {
        return [
         ...$data,
         'fantasy_name' => $data['fantasy_name'] ?? $data['name'],
         'password' => bcrypt($data['password']),
         'phone' => json_encode($data['phone']),
         'address' => json_encode($data['address']),
         'metadata' => json_encode($data['metadata']),
         'status' => UserStatus::PENDING_CONFIRMATION(),
        ];
    }

}
