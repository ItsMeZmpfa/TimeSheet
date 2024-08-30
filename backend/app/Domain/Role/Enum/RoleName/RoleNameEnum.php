<?php

namespace app\Domain\Roles\Enum\RoleName;

enum RoleNameEnum: string
{
    case OWNER = 'owner';
    case STAFFEXECUTIVE = 'staff_executive';
    case EMPLOYER = 'employer';
}
