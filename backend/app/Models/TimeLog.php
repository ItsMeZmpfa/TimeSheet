<?php

namespace App\Models;

use App\Domain\TimeLog\Interface\TimeLogEntity;
use App\Helper\DateValueObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TimeLog extends Model implements TimeLogEntity
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
        'date',
        'start',
        'end',
        'duration',
    ];

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    /**
     * @inheritDoc
     */
    public function getEmployerId(): int
    {
        return $this->attributes['employerId'];
    }

    /**
     * @inheritDoc
     */
    public function setEmployerId(int $employerId): void
    {
        $this->attributes['employerId'] = $employerId;
    }

    /**
     * @inheritDoc
     */
    public function getTimeSheetId(): int
    {
        return $this->attributes['timeSheetId'];
    }

    /**
     * @inheritDoc
     */
    public function setTimeSheetId(int $timeSheetId): void
    {
        $this->attributes['timeSheetId'] = $timeSheetId;
    }

    /**
     * @inheritDoc
     */
    public function getDate(): dateValueObject
    {
        return new dateValueObject($this->attributes['date']);
    }

    /**
     * @inheritDoc
     */
    public function setDate(DateValueObject $date): void
    {
        $this->attributes['date'] = $date;
    }

    /**
     * @inheritDoc
     */
    public function getStartTime(): DateValueObject
    {
        return new DateValueObject($this->attributes['start']);
    }

    /**
     * @inheritDoc
     */
    public function setStartTime(DateValueObject $startTime): void
    {
        $this->attributes['start'] = $startTime;
    }

    /**
     * @inheritDoc
     */
    public function getEndTime(): DateValueObject
    {
        return new DateValueObject($this->attributes['end']);
    }

    /**
     * @inheritDoc
     */
    public function setEndTime(DateValueObject $endTime): void
    {
        $this->attributes['end'] = $endTime;
    }

    /**
     * @inheritDoc
     */
    public function getDuration(): mixed
    {
        return $this->attributes['duration'];
    }

    /**
     * @inheritDoc
     */
    public function setDuration(int $duration): void
    {
        $this->attributes['duration'] = $duration;
    }

    /**
     * @inheritDoc
     */
    public function employers(): HasOne
    {
        return $this->hasOne(Employer::class);
    }
}
