<?php

namespace app\Domain\User\Interface;


use App\Domain\ViewModel;
use Illuminate\Support\Collection;

interface UserOutputPort
{
    /**
     *
     * @return ViewModel
     */
    public function userCreated(): ViewModel;

    /**
     * @return ViewModel
     */
    public function userNotCreated(): ViewModel;
}
