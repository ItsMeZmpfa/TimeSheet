<?php

namespace App\Factory\Employer;

use App\Domain\Employer\Interface\EmployerEntity;
use App\Domain\Employer\Interface\EmployerFactory;
use App\Exception\Generator\GeneratorException;
use App\Helper\CodeGeneratorHelper;
use App\Models\Employer;
use Random\RandomException;

class EmployerFactoryImpl implements EmployerFactory
{

    /**
     * @param  array  $attributes
     * @inheritDoc
     */
    public function createEmployer(array $attributes = []): EmployerEntity
    {
        try {
            $attributes['employerCode'] = CodeGeneratorHelper::generateUniqueCode('employers', 'employerCode');
        } catch (GeneratorException|RandomException $e) {

        }

        return new Employer($attributes);
    }
}
