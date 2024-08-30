<?php

namespace App\Domain\Employer\Interface;

interface EmployerFactory
{

    /**
     * Create a Factory object for to create Employer
     * @return EmployerEntity
     */
    public function createEmployer(): EmployerEntity;

}
