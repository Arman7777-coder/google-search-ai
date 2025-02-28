<?php

declare(strict_types=1);

namespace App\Repository;
use \Illuminate\Database\Eloquent\Collection;
interface PermissionRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllPermissions(): Collection;
}
