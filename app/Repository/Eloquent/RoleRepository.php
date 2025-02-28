<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

final class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
    public function getAllRolesWithPermissions(): Collection
    {
        return $this->model->with('permissions')->get();
    }
    public function getAllUsersByFilteredRoles($role): Collection
    {
        return User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })
            ->with('roles')
            ->orderByDesc('id')
            ->get();
    }

    public function findWithPermissions(int $id): mixed
    {
        return $this->model->with('permissions')->find($id);
    }

}
