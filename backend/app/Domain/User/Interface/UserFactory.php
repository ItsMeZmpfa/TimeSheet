<?php

namespace app\Domain\User\Interface;



interface UserFactory
{
    /**
     * Create a Factory Object for new User
     *
     * @param  array  $attributes
     * @return UserEntity
     */
    public function createUser(array $attributes = []): UserEntity;

    /**
     * Create a Factory Object for delete User
     *
     * @param  array  $attributes
     * @return UserEntity
     */
    public function deleteUser(array $attributes = []): UserEntity;

    /**
     * Create a Factory Object for updating User
     *
     * @param  array  $attributes
     * @return UserEntity
     */
    public function updateUser(array $attributes = []): UserEntity;

    /**
     * Create a Factory Object for retrieve User
     *
     * @param  array  $attributes
     * @return UserEntity
     */
    public function getUser(array $attributes = []): UserEntity;
}
