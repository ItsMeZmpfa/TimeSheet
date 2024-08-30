<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domain\Roles\Enum\RoleName\RoleNameEnum;
use App\Domain\User\Interface\UserEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserEntity
{
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'zipCode',
        'street',
        'birthDay',
        'country',
        'city',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getUserId(): int
    {
        return $this->attributes['id'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getUserName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserName(string $userName): void
    {
        $this->attributes['name'] = $userName;
    }

    /**
     * @inheritDoc
     */
    public function getUserBirthDay(): string
    {
        return $this->attributes['birthDay'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getUserEmail(): EmailValueObject
    {
        return new EmailValueObject($this->attributes['email']);
    }

    /**
     * @inheritDoc
     */
    public function setUserEmail(EmailValueObject $userEmail): void
    {
        $this->attributes['email'] = (string)$userEmail;
    }

    /**
     * @inheritDoc
     */
    public function getUserStreet(): string
    {
        return $this->attributes['street'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserStreet(string $userStreetName): void
    {
        $this->attributes['street'] = $userStreetName;
    }

    /**
     * @inheritDoc
     */
    public function getUserZipCode(): int
    {
        return $this->attributes['zipCode'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserZipCode(string $userZipCode): void
    {
        $this->attributes['zipCode'] = $userZipCode;
    }

    /**
     * @inheritDoc
     */
    public function getUserCity(): string
    {
        return $this->attributes['city'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserCity(string $userCityName): void
    {
        $this->attributes['city'] = $userCityName;
    }

    /**
     * @inheritDoc
     */
    public function getUserCountry(): string
    {
        return $this->attributes['country'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserCountry(string $userCountryName): void
    {
        $this->attributes['country'] = $userCountryName;
    }

    /**
     * @inheritDoc
     */
    public function getUserPhone(): int
    {
        return $this->attributes['phone'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function setUserPhone(int $userPhone): void
    {
        $this->attributes['phone'] = $userPhone;
    }

    /**
     * @inheritDoc
     */
    public function getUserPassword(): HashedPasswordValueObject
    {
        return new HashedPasswordValueObject($this->attributes['password']);
    }

    /**
     * @inheritDoc
     */
    public function setUserPassword(PasswordValueObject $userUserUserPassword): void
    {
        $this->attributes['password'] = (string)$userUserUserPassword->hashed();
    }

    /**
     * @inheritDoc
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @inheritDoc
     */
    public function isOwner(): bool
    {
        return $this->hasRole(RoleNameEnum::OWNER);
    }

    /**
     * @inheritDoc
     */
    public function isStaffExecutive(): bool
    {
        return $this->hasRole(RoleNameEnum::STAFFEXECUTIVE);
    }

    /**
     * @inheritDoc
     */
    public function isEmployer(): bool
    {
        return $this->hasRole(RoleNameEnum::EMPLOYER);
    }

    /**
     * @inheritDoc
     */
    public function hasRole(RoleNameEnum $role): bool
    {
        return $this->hasRole(RoleNameEnum::EMPLOYER);
    }

    /**
     * @inheritDoc
     */
    public function permissions(): array
    {
        return $this->roles()->with('permissions')->get()
            ->map(function ($role) {
                return $role->permissions->pluck('name');
            })->flatten()->values()->unique()->toArray();
    }

    /**
     * @inheritDoc
     */
    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions(), true);
    }
}
