<?php

namespace App\Factory\User;


use App\Domain\User\Interface\UserEntity;
use App\Domain\User\Interface\UserFactory;
use App\Models\EmailValueObject;
use App\Models\PasswordValueObject;
use App\Models\User;

class UserFactoryImpl implements UserFactory
{

    /**
     * @inheritDoc
     */
    public function createUser(array $attributes = []): UserEntity
    {
        if (isset($attributes['email']) && is_string($attributes['email'])) {
            $attributes['email'] = new EmailValueObject($attributes['email']);
        }

        if (isset($attributes['password']) && is_string($attributes['password'])) {
            $attributes['password'] = new PasswordValueObject($attributes['password']);
        }

        return new User($attributes);
    }

    /**
     * @inheritDoc
     */
    public function deleteUser(array $attributes = []): UserEntity
    {
        // TODO: Implement deleteUser() method.
    }

    /**
     * @inheritDoc
     */
    public function updateUser(array $attributes = []): UserEntity
    {
        // TODO: Implement updateUser() method.
    }

    /**
     * @inheritDoc
     */
    public function getUser(array $attributes = []): UserEntity
    {
        if (isset($attributes['email']) && is_string($attributes['email'])) {
            $attributes['email'] = new EmailValueObject($attributes['email']);
        }

        if (isset($attributes['password']) && is_string($attributes['password'])) {
            $attributes['password'] = new PasswordValueObject($attributes['password']);
        }

        return new User($attributes);
    }

}
