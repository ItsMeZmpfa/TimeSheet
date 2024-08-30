<?php

namespace App\Providers;

use App\Adapter;
use App\Domain;
use App\Factory;
use App\Models\User;
use App\Repository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            Domain\User\Interface\UserFactory::class,
            Factory\User\UserFactoryImpl::class,
        );

        $this->app->bind(
            Domain\User\Interface\UserEntity::class,
            User::class,
        );

        $this->app->bind(
            Domain\User\Interface\UserRepository::class,
            Repository\User\PostgreSqlUserDatabase::class,
        );

    }

    public function boot(): void
    {

    }
}
