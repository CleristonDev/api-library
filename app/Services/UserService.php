<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\ApiException;
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

        if(! isset($data['perPage'])){
            $this->badRequestException('O mano, coloca a quantidade de itens por página.');
        }

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

    /**
     * clear data to create or update
     */
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
            'username' => 'RA' . Str::random(6), // TODO: Criar helper para gerar username
            'status' => $data['status'] ?? 'active',
        ];
    }

}
