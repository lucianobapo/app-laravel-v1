<?php namespace App\Repositories;

use App\Models\User;

class UserRepository {

    public function findByUsernameOrCreate($userData) {
        return User::firstOrCreate([
            'mandante' => 'teste',
            'name' => $userData->name,
            'email' => $userData->email,
            'avatar' => $userData->avatar,
            'password' => bcrypt($userData->id),
        ]);
    }
}