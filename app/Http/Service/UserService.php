<?php

namespace App\Http\Service;

use App\Http\Requests\UserFormRequest;

class UserService
{
    public function store(UserFormRequest $request)
    {

        dd($request); // guardar e já iniciar a sessão
    }
}
