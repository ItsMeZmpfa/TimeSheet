<?php

namespace App\Domain\EmployerConfig\Interface;

use Illuminate\Support\Facades\Date;

interface EmployerConfigEntity
{

    /**
     * Get The iD of EmployerConfig
     * @return string
     */
    public function getId(): string;

    /**
     * Get The Allow Hour of EmployerConfig
     * @return Date
     */
    public function getAllowHour(): Date;

    /**
     * Set The Allow Hour of EmployerConfig
     * @param  Date  $allowHour
     * @return void
     */
    public function setAllowHour(Date $allowHour): void;
}
