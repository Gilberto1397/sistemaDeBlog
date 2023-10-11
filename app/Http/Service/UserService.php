<?php

namespace App\Http\Service;

use App\Http\Repository\User\UserRepositoryInterface;
use App\Http\Requests\UserFormRequest;
use App\Models\User;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserFormRequest $request
     * @return User
     */
    public function store(UserFormRequest $request): User
    {
        $user = $this->userRepository->store($request);
        return $user;
    }
}
