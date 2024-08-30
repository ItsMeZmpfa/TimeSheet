<?php

namespace App\Domain\Auth\Interface;

use App\Domain\ViewModel;

interface AuthOutputPort
{
    /**
     * Return the Output if the User Login
     * @param  string  $token
     * @return ViewModel
     */
    public function loginSuccess(string $token): ViewModel;

    /**
     * Return the Output if the User Failed to log in
     * @return ViewModel
     *
     */
    public function loginFail(): ViewModel;

    /**
     * Return the Output if the User Success log out
     * @return ViewModel
     */
    public function logoutSuccess(): ViewModel;

    /**
     * Return the Output if the User Failed to log Out
     * @return ViewModel
     */
    public function logoutFail(): ViewModel;
}
