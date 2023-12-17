<?php

namespace Kobiyim\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Kobiyim\Models\User;

class CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        return User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
