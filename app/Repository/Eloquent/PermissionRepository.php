<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Service;
use App\Repository\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use \Illuminate\Database\Eloquent\Collection;

final class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
    public function getAllPermissions(): Collection
    {
       return $this->model->get();
    }
}
