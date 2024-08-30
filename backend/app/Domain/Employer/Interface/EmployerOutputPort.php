<?php

namespace App\Domain\Employer\Interface;

use App\Domain\ViewModel;

interface EmployerOutputPort
{

    /**
     * Return the OutputPort for Creating
     * @return mixed
     */
    public function employerCreated():ViewModel;

    /**
     * Return the OutputPort for Failing Creating
     * @return ViewModel
     */
    public function employerNotCreated():ViewModel;
}
