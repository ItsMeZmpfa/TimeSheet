<?php

namespace app\Domain\User\Interface;

use App\Domain\ViewModel;

interface UserService
{
    /**
     * @param  array  $array
     * @return ViewModel
     */
    public function createUser(array $array): ViewModel;

    /**
     * @param  array  $array
     * @return ViewModel
     */
    public function getUserInfo(array $array): ViewModel;
}
