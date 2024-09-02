<?php

namespace App\Domain\Employer\Interface;

interface EmployerFactory
{

    /**
     * Create a Factory object for to create Employer
     * @param  array  $attributes
     * @return EmployerEntity
     */
    public function createEmployer(array $attributes = []): EmployerEntity;

}
