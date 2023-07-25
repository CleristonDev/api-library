<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\ApiException;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    use ApiException;

    public function listAll(array $data): LengthAwarePaginator
    {
        $users = User::query();
        return $users->paginate($data['perPage'] ?? 10);
    }

    public function create(array $data): User
    {
        $sanitaze = $this->sanitazeData($data);
        $user = User::create($sanitaze);
        return $user;
    }

    public function update(User $user, array $data): User
    {
        $sanitaze = $this->sanitazeData($data, $user);
        tap($user)->update($sanitaze);
        return $user;
    }

    private function sanitazeData(array &$data, User $user=null): array
    {
         if($user){
            return [
                'password' => $data['password'] ?? $user->password,
            ];
         }
        return [
            ...$data,
            'password' => bcrypt($data['password']),
            'username' => 'RA' . Str::random(6),
            'status' => $data['status'] ?? 'active',
        ];
    }

}
