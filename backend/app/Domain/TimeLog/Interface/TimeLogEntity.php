<?php

namespace App\Domain\TimeLog\Interface;

use App\Helper\DateValueObject;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface TimeLogEntity
{

    /**
     * Get iD of the Time Model
     * @return int
     */
    public function getId(): int;

    /**
     * Get the iD of the Relation of Employer
     * @return int
     */
    public function getEmployerId(): int;

    /**
     * Set the iD for the Relation of Employer
     * @param  int  $employerId
     * @return void
     */
    public function setEmployerId(int $employerId): void;

    /**
     * Get the iD of the Relation of TimeSheetEntity
     * @return int
     */
    public function getTimeSheetId(): int;

    /**
     * Set the iD for the Relation of TimeSheetEntity
     * @param  int  $timeSheetId
     * @return void
     */
    public function setTimeSheetId(int $timeSheetId): void;

    /**
     * Get the Date of TimeLog Model
     * @return DateValueObject
     */
    public function getDate(): dateValueObject;

    /**
     * Set the Date of the TimeLog Model
     * @param  DateValueObject  $date
     * @return void
     */
    public function setDate(DateValueObject $date): void;

    /**
     * Get the Start Time of the TimeLog
     * @return DateValueObject
     */
    public function getStartTime(): DateValueObject;

    /**
     * Set the Start Time of the TimeLog
     * @param  DateValueObject  $startTime
     * @return void
     */
    public function setStartTime(DateValueObject $startTime): void;

    /**
     * Get The End Time of the TimeLog
     * @return DateValueObject
     */
    public function getEndTime(): DateValueObject;

    /**
     * Set The End Time of the TimeLog
     * @param  DateValueObject  $endTime
     * @return void
     */
    public function setEndTime(DateValueObject $endTime): void;

    /**
     * Get the Duration of TimeLog
     * @return mixed
     */
    public function getDuration(): mixed;

    /**
     * Set the Duration of TimeLog
     * @param  int  $duration
     * @return void
     */
    public function setDuration(int $duration): void;

    /**
     * Relation of Employer
     * @return HasOne
     */
    public function employers(): HasOne;

}
