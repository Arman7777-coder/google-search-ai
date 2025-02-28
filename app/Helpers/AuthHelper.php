<?php

namespace App\Helpers;

use App\Models\User;
use Exception;

if (!function_exists('getAuthUser')) {

    /** @throws Exception */
    function getAuthUser(): User
    {
        if (!auth()->user()) {
            throw new Exception('Authenticated user not found, sign in again');
        }
        /** @var User */
        return auth()->user();
    }
}

