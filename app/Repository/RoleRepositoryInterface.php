<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function all(): mixed;

    public function getAllRolesWithPermissions(): Collection;
    public function getAllUsersByFilteredRoles($role): Collection;

    public function findWithPermissions(int $id): mixed;
}
