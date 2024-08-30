<?php

namespace App\Models;

use App\Domain\Permission\Interface\PermissionsEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model implements PermissionsEntity
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @inheritDoc
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    /**
     * @inheritDoc
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
