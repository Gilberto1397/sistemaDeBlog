<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Service\LoginService;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    protected LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(LoginFormRequest $request): RedirectResponse
    {
        $authenticated = $this->loginService->store($request);

        if (!$authenticated) {
            session()->flash('message', 'Usuário ou senha incorretos!');
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
