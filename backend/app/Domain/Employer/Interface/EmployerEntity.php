<?php

namespace App\Domain\Employer\Interface;

interface EmployerEntity
{
    /**
     *Get The iD of the Permissions
     * @return int
     */
    public function getEmployerId(): int;

    /**
     * Get the Name of the Employer
     * @return string
     */
    public function getEmployerName(): string;

    /**
     * Set the Name of the Employer
     * @param  string  $employerName
     * @return void
     */
    public function setEmployerName(string $employerName): void;

    /**
     * Get the EmployerCode of the Employer
     * @return string
     */
    public function getEmployerCode(): string;

    /**
     * Set the Employer Code of the Employer
     * @param  string  $employerCode
     * @return void
     */
    public function setEmployerCode(string $employerCode): void;

}
