<?php

namespace App\Repository\Employer;

use App\Domain\Employer\Interface\EmployerEntity;
use App\Domain\Employer\Interface\EmployerRepository;
use App\Models\Employer;

class PostGreSqlEmployerDatabase implements EmployerRepository
{

    /**
     *
     * @inheritDoc
     */
    public function createEmployer(EmployerEntity $employer): EmployerEntity
    {
        return Employer::create([
            'employerName' => $employer->getEmployerName(),
            'employerCode' => $employer->getEmployerCode(),
        ]);
    }

    public function checkIfEmployerExists(EmployerEntity $employer): bool
    {
        return Employer::where([
            'employerName' => $employer->getEmployerName(),
        ])->exists();
    }
}
