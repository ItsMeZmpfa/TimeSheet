<?php

namespace App\Models;

use App\Domain\EmployerConfig\Interface\EmployerConfigEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class EmployerConfig extends Model implements EmployerConfigEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'allowHour',
    ];


    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    /**
     * @inheritDoc
     */
    public function getAllowHour(): Date
    {
        return $this->attributes['allowHour'];
    }

    /**
     * @inheritDoc
     */
    public function setAllowHour(Date $allowHour): void
    {
        $this->attributes['allowHour'] = $allowHour;
    }
}
