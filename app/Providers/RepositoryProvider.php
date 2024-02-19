<?php

namespace App\Providers;

use App\Http\Repository\Post\EloquentPostRepository;
use App\Http\Repository\Post\PostRepositoryInterface;
use App\Http\Repository\SocialiteUser\EloquentSocialiteUserRepository;
use App\Http\Repository\SocialiteUser\SocialiteUserRepositoryInterface;
use App\Http\Repository\User\EloquentUserRepository;
use App\Http\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(SocialiteUserRepositoryInterface::class, EloquentSocialiteUserRepository::class);
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
