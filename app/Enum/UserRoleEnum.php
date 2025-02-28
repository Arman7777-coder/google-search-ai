<?php

namespace App\Enum;


enum UserRoleEnum:string
{
    case USER = 'User';
    case ADMIN = 'admin';
    case MANAGER = 'manager';
}
