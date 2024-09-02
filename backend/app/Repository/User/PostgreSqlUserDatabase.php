<?php

namespace App\Repository\User;

use App\Domain\User\Interface\UserEntity;
use App\Domain\User\Interface\UserRepository;
use App\Helper\PasswordValueObject;
use App\Models\User;

class PostgreSqlUserDatabase implements UserRepository
{

    /**
     * @inheritDoc
     */
    public function existsById(UserEntity $user): bool
    {
        return User::where([
            'id' => $user->getUserId(),
        ])->exists();
    }

    /**
     * @inheritDoc
     */
    public function existsByEmail(UserEntity $user): bool
    {
        return User::where([
            'email' => $user->getUserEmail(),
        ])->exists();
    }

    /**
     * @inheritDoc
     */
    public function createUser(UserEntity $user, PasswordValueObject $password): UserEntity
    {

        return User::create([
            'name' => $user->getUserName(),
            'email' => $user->getUserEmail(),
            'phone' => $user->getUserPhone(),
            'street' => $user->getUserStreet(),
            'city' => $user->getUserCity(),
            'country' => $user->getUserCountry(),
            'birthDay' => $user->getUserBirthday(),
            'zipCode' => $user->getUserZipcode(),
            'password' => $password,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function findUserById(UserEntity $user): UserEntity
    {
        // TODO: Implement findUserById() method.
    }

    /**
     * @inheritDoc
     */
    public function findUserByEmail(UserEntity $user): UserEntity
    {
        return User::where([
            'email' => $user->getUserEmail(),
        ])->first();
    }


    /**
     * @inheritDoc
     */
    public function updateUserPassword(UserEntity $user, PasswordValueObject $password): bool
    {
        // TODO: Implement updateUserPassword() method.
    }
}
