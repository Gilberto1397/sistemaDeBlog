<?php

namespace App\Http\Repository\User;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * @param UserFormRequest $request
     * @return User
     */
    public function store(UserFormRequest $request): User
    {
        $user = new User();
        $user->create([
            'email' => $request->email,
            'user' => $request->user,
            'password' => Hash::make($request->password)
        ]);
        return $user;
    }
}
