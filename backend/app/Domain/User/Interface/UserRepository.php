<?php

namespace app\Domain\User\Interface;


use app\Models\PasswordValueObject;
use Illuminate\Support\Collection;

interface UserRepository
{
    /**
     * Check if the given User exists in Database by iD
     *
     * @param  UserEntity  $user
     * @return bool
     */
    public function existsById(UserEntity $user): bool;

    /**
     * Check if the given User exists in Database by Email
     *
     * @param  UserEntity  $user
     * @return bool
     */
    public function existsByEmail(UserEntity $user): bool;

    /**
     * Create a new User entry in the Database
     *
     * @param  UserEntity  $user
     * @param  PasswordValueObject  $password
     * @return UserEntity
     */
    public function createUser(UserEntity $user, PasswordValueObject $password): UserEntity;

    /**
     * Find a User by a given iD
     *
     * @param  UserEntity  $user
     * @return UserEntity
     */
    public function findUserById(UserEntity $user): UserEntity;

    /**
     * Find a User by a given iD
     *
     * @param  UserEntity  $user
     * @return UserEntity
     */
    public function findUserByEmail(UserEntity $user): UserEntity;

    /**
     * Update the User Password by a given iD
     *
     * @param  UserEntity  $user
     * @param  PasswordValueObject  $password
     * @return bool
     */
    public function updateUserPassword(UserEntity $user, PasswordValueObject $password): bool;

}
