<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create(array $attributes)
 * @method static whereHas(string $string, \Closure $param)
 * @method static where(string $string, string $string1)
 * @property mixed $id
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone_number',
        'avatar',
        'address',
        'address2',
        'birth_date',
        'city',
        'country',
        'state',
        'zip_code',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $uuid = static::newUuid();
            $model->setAttribute('uuid', $uuid);
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'parents_children', 'student_id', 'parent_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'parents_children', 'parent_id', 'student_id');
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'attendance')->withPivot('is_present');
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    public function lessonTypes(): BelongsToMany
    {
        return $this->belongsToMany(LessonType::class, 'lesson_type_teachers');
    }

    public function loginInfo(): HasMany
    {
        return $this->hasMany(UserLoginInfo::class, 'user_id', 'id');
    }

    public function lastLoginInfo(): HasOne
    {
        return $this->hasOne(UserLoginInfo::class, 'user_id', 'id')->latest('login_date');
    }

    private static function newUuid(): string
    {
        $uuid = Str::random(12);
        $isUsed = self::where('uuid', $uuid)->first();
        if ($isUsed) {
            return static::newUuid();
        }
        return $uuid;
    }


}
