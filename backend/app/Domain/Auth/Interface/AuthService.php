<?php

namespace App\Domain\Auth\Interface;

use App\Domain\ViewModel;

interface AuthService
{
    /**
     *
     * @param  array  $credentials
     * @return ViewModel
     */
    public function login(array $credentials): ViewModel;

    /**
     * @return ViewModel
     */
    public function logout(): ViewModel;
}
