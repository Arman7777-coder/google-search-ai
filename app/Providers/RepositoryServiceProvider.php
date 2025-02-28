<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\CountryIsoRepositoryInterface;
use App\Repository\Eloquent\CountryIsoRepository;
use App\Repository\Eloquent\UserLoginInfoRepository;
use App\Repository\UserLoginInfoRepositoryInterface;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\PermissionRepository;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\UserRepositoryInterface;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(CountryIsoRepositoryInterface::class, CountryIsoRepository::class);
        $this->app->bind(UserLoginInfoRepositoryInterface::class, UserLoginInfoRepository::class);

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
