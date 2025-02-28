<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\UserLoginInfo;
use App\Repository\UserLoginInfoRepositoryInterface;

final class UserLoginInfoRepository extends BaseRepository implements UserLoginInfoRepositoryInterface
{
    public function __construct(UserLoginInfo $model)
    {
        parent::__construct($model);
    }

    public function getLoginInfoWithUser()
    {
        return $this->model->with('user')->orderByDesc('id');
    }
}
