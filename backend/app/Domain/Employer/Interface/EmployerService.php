<?php

namespace App\Domain\Employer\Interface;

use App\Domain\ViewModel;

interface EmployerService
{

    /**
     * Service Implementation of Creating an Employer
     * @return ViewModel
     */
    public function createEmployer(array $credentials): ViewModel;
}
