<?php

namespace App\Http\Service;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    /**
     * @param LoginFormRequest $request
     * @return bool
     */
    public function store(LoginFormRequest $request): bool
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return false;
        }

        if (Hash::needsRehash(Auth::user()->getAuthPassword())) {
            $newPassword = Hash::make('plain-text');

            $user = User::find(Auth::user()->getAuthIdentifier());
            $user->password = $newPassword;
            $user->save();
        }

        session()->remove('userName');
        session(['userName' => Auth::user()->user]);

        session()->remove('loggedUser');
        if (!empty($request->remember) && (boolean)$request->remember === true) {
            session(['loggedUser' => $request->email]);
        }
        return true;
    }
}
