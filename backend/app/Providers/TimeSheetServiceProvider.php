<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Adapters;
use App\Domain;
use App\Factory;
use App\Repository;
use App\Service;

class TimeSheetServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            Domain\TimeSheet\Interface\TimeSheetFactory::class,
            Factory\TimeSheet\TimeSheetFactoryImpl::class,
        );

        $this->app->bind(
            Domain\TimeSheet\Interface\TimeSheetOutputPort::class,
            Adapters\Presenter\TimeSheet\TimeSheetJsonPresenter::class,
        );

        $this->app->bind(
            Domain\TimeSheet\Interface\TimeSheetRepository::class,
            Repository\TimeSheet\PostGreSqlTimeSheetDatabase::class,
        );

        $this->app->bind(
            Domain\TimeSheet\Interface\TimeSheetService::class,
            Service\TimeSheet\TimeSheetServiceImpl::class,
        );
    }

    public function boot(): void
    {
    }
}
