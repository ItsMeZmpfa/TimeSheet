<?php

namespace App\Service\Employer;

use App\Domain\Employer\Interface\EmployerFactory;
use App\Domain\Employer\Interface\EmployerOutputPort;
use App\Domain\Employer\Interface\EmployerRepository;
use App\Domain\Employer\Interface\EmployerService;
use App\Domain\ViewModel;

class EmployerServiceImpl implements EmployerService
{
        private  EmployerFactory $employerFactory;
        private EmployerRepository $employerRepository;

        private EmployerOutputPort  $employerOutputPort;



        public function __construct(
            protected EmployerFactory $factory,
            protected EmployerRepository $repository,
            protected EmployerOutputPort $outputPort
        )
        {
            $this->employerFactory = $factory;
            $this->employerRepository = $repository;
            $this->employerOutputPort = $outputPort;
        }

    /**
     * @param  array  $credentials
     * @inheritDoc
     */
    public function createEmployer(array $credentials): ViewModel
    {

        $employer = $this->employerFactory->createEmployer([
            'employerName' => $credentials['employerName'],
        ]);


        if($this->employerRepository->checkIfEmployerExists($employer))
        {
           return $this->employerOutputPort->employerNotCreated();
        }

        $this->employerRepository->createEmployer($employer);

       return $this->employerOutputPort->employerCreated();

    }
}
