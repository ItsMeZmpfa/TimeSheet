<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Adapters;
use App\Domain;
use App\Factory;
use App\Models\Employer;
use App\Repository;
use App\Service;

class EmployerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            Domain\Employer\Interface\EmployerFactory::class,
            Factory\Employer\EmployerFactoryImpl::class,
        );

        $this->app->bind(
            Domain\Employer\Interface\EmployerOutputPort::class,
            Adapters\Presenter\Employer\EmployerJsonPresenter::class,
        );

        $this->app->bind(
            Domain\Employer\Interface\EmployerRepository::class,
            Repository\Employer\PostGreSqlEmployerDatabase::class,
        );

        $this->app->bind(
            Domain\Employer\Interface\EmployerService::class,
            Service\Employer\EmployerServiceImpl::class,
        );
    }

    public function boot(): void
    {
    }
}
