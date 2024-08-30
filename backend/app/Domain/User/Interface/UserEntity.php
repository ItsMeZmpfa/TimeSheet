<?php

namespace App\Domain\User\Interface;


use App\Domain\Roles\Enum\RoleName\RoleNameEnum;
use App\Models\EmailValueObject;
use App\Models\HashedPasswordValueObject;
use App\Models\PasswordValueObject;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface UserEntity
{
    /**
     *Get The iD of the User
     * @return int
     */
    public function getUserId(): int;

    /**
     *Get the Username
     * @return string
     */
    public function getUserName(): string;


    /**
     *Set the Username
     * @param  String  $userName
     * @return void
     */
    public function setUserName(string $userName): void;

    /**
     * Get the Birth of the User
     * @return string
     */
    public function getUserBirthDay(): string;

    /**
     * Get the email of the user
     * @return EmailValueObject
     */
    public function getUserEmail(): EmailValueObject;

    /**
     * set the email of the user
     * @param  EmailValueObject  $userEmail
     * @return void
     */
    public function setUserEmail(EmailValueObject $userEmail): void;

    /**
     * Get the User Street
     * @return string
     */
    public function getUserStreet(): string;

    /**
     * Set the User Street Name
     * @param  string  $userStreetName
     * @return void
     */
    public function setUserStreet(string $userStreetName): void;

    /**
     *Get the Zipcode of the UserCode
     * @return int
     */
    public function getUserZipCode(): int;

    /**
     *Set the User Zip Code
     * @param  string  $userZipCode
     * @return void
     */
    public function setUserZipCode(string $userZipCode): void;

    /**
     *Get the User City
     * @return string
     */
    public function getUserCity(): string;

    /**
     *Set the User City
     * @param  string  $userCityName
     * @return void
     */
    public function setUserCity(string $userCityName): void;

    /**
     *Get The Country Name of the User
     * @return string
     */
    public function getUserCountry(): string;

    /**
     *Set The user County
     * @param  string  $userCountryName
     * @return void
     */
    public function setUserCountry(string $userCountryName): void;

    /**
     *Get the User Phone number
     * @return int
     */
    public function getUserPhone(): int;

    /**
     *Set the UserPhone
     * @param  int  $userPhone
     * @return void
     */
    public function setUserPhone(int $userPhone): void;

    /**
     * Get the password of the user
     * @return HashedPasswordValueObject
     */
    public function getUserPassword(): HashedPasswordValueObject;

    /**
     * set the password of the user
     * @param  PasswordValueObject  $userUserUserPassword
     * @return void
     */
    public function setUserPassword(PasswordValueObject $userUserUserPassword): void;


    /**
     *Get the list of Roles
     */
    public function roles(): BelongsToMany;

    /**
     *Check if The User has the role Owner
     */
    public function isOwner(): bool;

    /**
     *Check if The User has the role Staff Executive
     */
    public function isStaffExecutive(): bool;

    /**
     *Check if The User has the role Employer
     */
    public function isEmployer(): bool;

    /**
     *Check if The User has a given Role
     */
    public function hasRole(RoleNameEnum $role): bool;

    /**
     *Get The List of all Permission Base on Role
     */
    public function permissions(): array;

    /**
     *Check if the User has the Permissions
     */
    public function hasPermission(string $permission): bool;
}
