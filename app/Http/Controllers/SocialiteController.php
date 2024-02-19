<?php

namespace App\Http\Controllers;

use App\Http\Service\SocialiteUserService;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected SocialiteUserService $userService;

    public function __construct(SocialiteUserService $userService)
    {
        $this->userService = $userService;
    }

    public function store()
    {
        $user = Socialite::driver('google')->user();
        $save = $this->userService->store($user);

        if (!$save) {
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
