<?php

namespace App\Adapters\Presenter\Employer;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Employer\Interface\EmployerOutputPort;
use App\Domain\ViewModel;
use App\Http\Resources\Employer\CreatedEmployer\EmployerCreatedFailResource;
use App\Http\Resources\Employer\CreatedEmployer\EmployerCreatedSuccessResource;

class EmployerJsonPresenter implements EmployerOutputPort
{

    /**
     * @inheritDoc
     */
    public function employerCreated(): ViewModel
    {
      return  new JsonResourceViewModel(
           new EmployerCreatedSuccessResource()
        );
    }

    /**
     * @inheritDoc
     */
    public function employerNotCreated(): ViewModel
    {
        return  new JsonResourceViewModel(
            new EmployerCreatedFailResource()
        );
    }
}
