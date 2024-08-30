<?php

namespace App\Domain\Employer\Interface;

interface EmployerRepository
{

    /**
     * Create a Record in Employer Database
     * @return EmployerEntity
     */
    public function createEmployer(): EmployerEntity;
}
