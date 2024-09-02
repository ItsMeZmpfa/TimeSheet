<?php

namespace App\Domain\Employer\Interface;

interface EmployerRepository
{

    /**
     * Create a Record in Employer Database
     * @param  EmployerEntity  $employer
     * @return EmployerEntity
     */
    public function createEmployer(EmployerEntity $employer): EmployerEntity;

    /**
     * Check if the given Credentials exists in the Database
     * @param  EmployerEntity  $employer
     * @return bool
     */
    public function checkIfEmployerExists(EmployerEntity $employer): bool;
}
