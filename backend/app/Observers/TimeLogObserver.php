<?php

namespace App\Observers;

use App\Domain\TimeLog\Interface\TimeLogService;
use App\Models\TimeLog;

class TimeLogObserver
{
    /**
     * Handle the TimeLog "created" event.
     */
    public function created(TimeLog $timeLog): void
    {
        //
    }

    /**
     * Handle the TimeLog "updated" event.
     */
    public function updated(TimeLog $timeLog): void
    {
        //
    }

    /**
     * Handle the TimeLog "deleted" event.
     */
    public function deleted(TimeLog $timeLog): void
    {
        //
    }

    /**
     * Handle the TimeLog "restored" event.
     */
    public function restored(TimeLog $timeLog): void
    {
        //
    }

    /**
     * Handle the TimeLog "force deleted" event.
     */
    public function forceDeleted(TimeLog $timeLog): void
    {
        //
    }
}
