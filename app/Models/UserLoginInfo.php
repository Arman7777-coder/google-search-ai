<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserLoginInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "browser",
        "ip_address",
        "login_date",
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function latestUserLogin(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id')->latest();
    }
}
