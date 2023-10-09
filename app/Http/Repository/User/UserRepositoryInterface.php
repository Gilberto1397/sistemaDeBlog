<?php

namespace App\Http\Repository\User;

use App\Http\Requests\UserFormRequest;

interface UserRepositoryInterface
{
    public function store(UserFormRequest $request);
}
