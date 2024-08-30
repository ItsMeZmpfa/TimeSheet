<?php

namespace App\Domain\Permission\Interface;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface PermissionsEntity
{
    /**
     * Get the Id of the Permissions
     * @return mixed
     */
    public function getId();

    /**
     * Get the Name of the Permissions
     * @return mixed
     *
     */
    public function getName();

    /***
     * Set the Name of the Permissions
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Get the Relation of the Roles
     * @return BelongsToMany
     *
     */
    public function roles(): BelongsToMany;
}
