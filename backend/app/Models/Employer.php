<?php

namespace App\Models;

use App\Domain\Employer\Interface\EmployerEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements EmployerEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'employerName',
        'employerCode'
    ];

    /**
     * @inheritDoc
     */
    public function getEmployerId(): int
    {
        return $this->attributes['id'];
    }

    /**
     * @inheritDoc
     */
    public function getEmployerName(): string
    {
        return $this->attributes['employerName'];
    }

    /**
     * @inheritDoc
     */
    public function setEmployerName(string $employerName): void
    {
        $this->attributes['employerName'] = $employerName;
    }

    /**
     * @inheritDoc
     */
    public function getEmployerCode(): string
    {
        return $this->attributes['employerCode'];
    }

    /**
     * @inheritDoc
     */
    public function setEmployerCode(string $employerCode): void
    {
        $this->attributes['employerCode'] = $employerCode;
    }
}
