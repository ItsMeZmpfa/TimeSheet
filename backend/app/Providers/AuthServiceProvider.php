<?php

namespace App\Providers;

use App\Adapters;
use App\Domain;
use App\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            Domain\Auth\Interface\AuthService::class,
            Service\Auth\AuthServiceImpl::class,
        );

        $this->app->bind(
            Domain\Auth\Interface\AuthOutputPort::class,
            Adapters\Presenter\Auth\AuthJsonPresenter::class,
        );
    }

    public function boot(): void
    {
        $this->registerGates();
    }

    protected function registerGates(): void
    {
        Gate::define('user.create', function ($user) {
            return $user->hasPermission('user.create');
        });

        Gate::define('user.update', function ($user) {
            return $user->hasPermission('user.update');
        });

        Gate::define('user.delete', function ($user) {
            return $user->hasPermission('user.delete');
        });

        Gate::define('task_schedule.create', function ($user) {
            return $user->hasPermission('task_schedule.create');
        });

        Gate::define('task_schedule.update', function ($user) {
            return $user->hasPermission('task_schedule.update');
        });

        Gate::define('task_schedule.delete', function ($user) {
            return $user->hasPermission('task_schedule.delete');
        });
    }
}
