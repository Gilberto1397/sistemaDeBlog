<?php

namespace App\Http\Repository\SocialiteUser;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentSocialiteUserRepository implements SocialiteUserRepositoryInterface
{
    public function store($user): User
    {
        $socialiteUser = new User();
        return $socialiteUser->create([
            'email' => $user->email,
            'user' => $user->name,
            'password' => Hash::make(uniqid())
        ]);
    }
}
