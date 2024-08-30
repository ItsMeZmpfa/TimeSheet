<?php

namespace App\Models;

use App\Domain\TimeSheet\Interface\TimeSheetEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model implements TimeSheetEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'employerId',
        'startDate',
        'endDate',
        'submitStatus',
        'approvedStatus',
    ];

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->attributes['id'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getEmployerId(): int
    {
        return $this->attributes['employerId'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setEmployerId(int $id): void
    {
        $this->attributes['employerId'] = $id;
    }

    /**
     * @inheritDoc
     */
    public function getStartDate(): DateValueObject
    {
        return new DateValueObject($this->attributes['startDate']);
    }

    /**
     * @inheritDoc
     */
    public function setStartDate(DateValueObject $date): void
    {
         $this->attributes['startDate'] = $date;
    }

    /**
     * @inheritDoc
     */
    public function getEndDate(): DateValueObject
    {
        return new DateValueObject($this->attributes['endDate']);
    }

    /**
     * @inheritDoc
     */
    public function setEndDate(DateValueObject $date): void
    {
        $this->attributes['endDate'] = $date;
    }

    /**
     * @inheritDoc
     */
    public function getSubmitStatus(): bool
    {
       return $this->attributes['submitStatus'];
    }

    /**
     * @inheritDoc
     */
    public function setSubmitStatus(bool $status): void
    {
        $this->attributes['submitStatus'] = $status;
    }

    /**
     * @inheritDoc
     */
    public function getApprovedStatus(): bool
    {
        return $this->attributes['approvedStatus'];
    }

    /**
     * @inheritDoc
     */
    public function setApprovedStatus(bool $status): void
    {
        $this->attributes['approvedStatus'] = $status;
    }
}
