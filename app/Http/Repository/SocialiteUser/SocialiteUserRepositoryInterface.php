<?php

namespace App\Http\Repository\SocialiteUser;

use App\Models\User;

interface SocialiteUserRepositoryInterface
{
    public function store($user): User;
}
