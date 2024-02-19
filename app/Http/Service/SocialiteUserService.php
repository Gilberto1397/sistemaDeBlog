<?php

namespace App\Http\Service;

use App\Http\Repository\SocialiteUser\SocialiteUserRepositoryInterface;
use App\Http\Repository\User\UserRepositoryInterface;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialiteUserService
{
    protected SocialiteUserRepositoryInterface $socialiteUserRepository;

    public function __construct(SocialiteUserRepositoryInterface $socialiteUserRepository)
    {
        $this->socialiteUserRepository = $socialiteUserRepository;
    }

    /**
     * @param UserFormRequest $request
     * @return User
     */
    public function store($user): bool
    {
        $rules = [
            'email' => 'required|string|email|unique:users,email',
            'name' => 'required|string',
        ];

        $validateMessages = [
            'email.required' => 'Você precisa informar o campo "E-mail"!',
            'email.string' => 'O valor inserido no campo "E-mail" é inválido!',
            'email.unique' => 'Esse email encontra-se em uso!',
            'name.required' => 'Você precisa informar o campo "Usuário"!',
            'name.string' => 'O valor inserido no campo "Usuário" é inválido!',
        ];

        $validator = Validator::make((array)$user, $rules, $validateMessages);

        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            auth()->login($existingUser);
            return false;
        }

        $userSaved = $this->socialiteUserRepository->store($user);
        Auth::login($userSaved);
        return true;
    }
}
