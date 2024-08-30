<?php

namespace App\Domain\TimeSheet\Interface;

use App\Models\DateValueObject;
use DateTimeInterface;

interface TimeSheetEntity
{

    /**
     * Get The iD of the TimeSheetEntity
     * @return int
     */
    public function getId(): int;

    /**
     * Get The iD of the Relation Employer
     * @return int
     */
    public function getEmployerId(): int;

    /**
     * Set The iD of the Relation Employer
     * @param  int  $id
     * @return void
     */
    public function setEmployerId(int $id): void;

    /**
     * Get The Start Date of TimeSheetEntity
     * @return DateValueObject
     */
    public function getStartDate(): DateValueObject;

    /**
     * Set The Start Date of TimeSheetEntity
     * @param  DateValueObject  $date
     * @return void
     */
    public function setStartDate(DateValueObject $date): void;

    /**
     * Get The End Date of TimeSheetEntity
     * @return DateValueObject
     */
    public function getEndDate(): DateValueObject;

    /**
     * Set The End Date of TimeSheetEntity
     * @param  DateValueObject  $date
     * @return void
     */
    public function setEndDate(DateValueObject $date): void;

    /**
     * Get The Status of Submit on TimeSheetEntity
     * @return bool
     */
    public function getSubmitStatus(): bool;

    /**
     * Set The Status of Submit on TimeSheetEntity
     * @param  bool  $status
     * @return mixed
     */
    public function setSubmitStatus(bool $status): void;

    /**
     * Get The Status of Approved on TimeSheetEntity
     * @return bool
     */
    public function getApprovedStatus(): Boolean;

    /**
     * Set The Status Approved on TimeSheetEntity
     * @param  bool  $status
     * @return void
     */
    public function setApprovedStatus(bool $status): void;
}
