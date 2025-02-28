<?php

declare(strict_types=1);

namespace App\Repository;

interface UserLoginInfoRepositoryInterface extends BaseRepositoryInterface
{
    public function getLoginInfoWithUser();
}
