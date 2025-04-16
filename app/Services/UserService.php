<?php

namespace App\Services;

use App\Models\User;
use App\Enums\UserStatus;
use Illuminate\Support\Str;
use App\Traits\ApiException;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendConfimedUserAccount;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    use ApiException;

    /**
     * List all user with pagination.
     */
    public function listAll(array $data): LengthAwarePaginator
    {
        $users = User::query();

        if(! isset($data['perPage'])) {
            $this->badRequestException('O mano, coloca a quantidade de itens por página.');
        }

        return $users->paginate($data['perPage'] ?? 10);
    }

    public function create(array $data): User
    {
        $sanitaze = $this->sanitazeData($data);
        $user = User::create($sanitaze);


        if($user) {
            Mail::to($user->email)->send(new SendConfimedUserAccount($user));
        }
        return $user;
    }

    public function update(User $user, array $data): User
    {
        $sanitaze = $this->sanitazeData($data, $user);
        tap($user)->update($sanitaze);
        return $user;
    }

    /**
     * clear data to create or update
     */
    private function sanitazeData(array &$data, User $user=null): array
    {
        if($user) {
            return [
                'password' => $data['password'] ?? $user->password,
            ];
        }
        return [
            ...$data,
            'institution_id' => $data['institution_id'],
            'password' => bcrypt($data['password']),
            'username' => generateUsername($data['name']),
            'token' => generateRandomCode(4),
            'status' => UserStatus::PENDING_CONFIRMATION(),
        ];
    }

}
