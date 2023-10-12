<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Service\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function create()
    {
        $message = session('message');
        $loggedUser = null;
        $checked = false;

        if (Auth::check()) {
            return redirect()->route('home');
        }

        if (!empty(session('loggedUser'))) {
            $loggedUser = session('loggedUser');
            $checked = true;
        }
        return view('login.create', compact('message', 'loggedUser', 'checked'));
    }

    public function store(LoginFormRequest $request): RedirectResponse
    {
        $authenticated = $this->loginService->store($request);

        if (!$authenticated) {
            session()->flash('message', 'Usuário ou senha incorretos!');
            return redirect()->route('login');
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        session()->remove('userName');
        return redirect()->route('login');
    }
}
