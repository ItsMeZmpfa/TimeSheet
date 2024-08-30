<?php

namespace App\Domain\Role\Interface;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface RolesEntity
{
    /**
     * Get Relation of Permissions
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany;

    /**
     * Get Relation of Users
     * @return BelongsToMany
     *
     */
    public function users(): BelongsToMany;
}
