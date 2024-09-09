<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Adapters;
use App\Domain;
use App\Factory;
use App\Repository;
use App\Service;

class TimeLogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            Domain\TimeLog\Interface\TimeLogFactory::class,
            Factory\TimeLog\TimeLogFactoryImpl::class,
        );

        $this->app->bind(
            Domain\TimeLog\Interface\TimeLogOutputPort::class,
            Adapters\Presenter\TimeLog\TimeLogJsonPresenter::class,
        );

        $this->app->bind(
            Domain\TimeLog\Interface\TimeLogRepository::class,
            Repository\TimeLog\PostGreSqlTimeLogDatabase::class,
        );

        $this->app->bind(
            Domain\TimeLog\Interface\TimeLogService::class,
            Service\TimeLog\TimeLogServiceImpl::class,
        );
    }

    public function boot(): void
    {
    }
}
