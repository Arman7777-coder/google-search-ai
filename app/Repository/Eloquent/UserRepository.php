<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Models\ParentChild;
use App\Models\studentAndTeachers;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use function App\Helpers\imageConvert;

final class UserRepository
    extends BaseRepository
    implements UserRepositoryInterface
{
    public function __construct(User $model, private readonly Carbon $carbon)
    {
        parent::__construct($model);
    }
    public function find(int $id): mixed
    {
        return $this->model->find($id);
    }

    public function getAllUsers(): mixed
    {
        return $this->model->all();
    }

    public function getSocialiteUserByProviderId($user, $provider): User
    {
        $authUser = $this->model->where('provider_id', $user->id)->first();
        if (!$authUser) {
            $authUser = $this->model->create([
                'name' => $user->name ?? null,
                'email' => $user->email,
                'email_verified_at' => $this->carbon->now(),
                'provider' => strtoupper($provider),
                'provider_id' => $user->id,
            ]);
        }

        return $authUser;
    }

    public function findByEmail(string $email): User|null
    {
        return $this->model->where('email', $email)->first();
    }



    public function changeEmail(int $userId, string $email)
    {
        return DB::transaction(function () use ($userId, $email) {
            if ($this->model->where('email', $email)->exists()) {
                return false;
            }

            $this->model->findOrFail($userId)->update([
                'email' => $email
            ]);

            return true;
        });
    }

    public function getAllUsersByFilteredRoles($role)
    {
        return $this->model->with(['roles' => function ($q) use ($role) {
            $q->where('name', $role);
        }])->whereHas('roles', function ($q) use ($role) {
            $q->where('name', $role);
        })->orderByDesc('users.id')->get();
    }

    public function updateAdminData(int $id, array $attributes): void
    {
        $user = $this->model->find($id);

        if($attributes['password']) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
            unset($attributes['password_confirmation']);
        }
        if (isset($attributes['avatar'])){
            if ($user->avatar) {
                File::delete(public_path($user->avatar));
            }
            $attributes['avatar'] = $this->saveAvatar($attributes['avatar']);
        }

        $user->update($attributes);
    }

    public function parentAndChildren($createdUser, array $validated): void
    {
        ParentChild::create([
                'student_id' => $createdUser['id'],
                'parent_id' => $validated['parent_id'] ?? null,
            ]);
    }
    public function studentAndTeachers($createdUser, array $validated): void
    {
        $studentId = $createdUser->id;
        $teacherIds = $validated['teachers'] ?? null;
        foreach ($teacherIds as $teacherId) {
            studentAndTeachers::create([
                'student_id' => $studentId,
                'teacher_id' => $teacherId,
            ]);
        }
    }
    public function saveAvatar($image): string
    {
        return imageConvert($image, '/uploads/users/image/');
    }

    public function getUserWithPermissions(int $id): mixed
    {
        return $this->model->with([ 'permissions', 'roles.permissions'])->find($id);
    }


    public function getAllAdmins()
    {
        return $this->model->with("roles")->whereHas("roles", function($q) {
            $q->where("name", 'admin');
        })->get();
    }
    public function getAllParentsChildren(): Collection
    {
        return ParentChild::all();
    }
    public function getAllStudentsByTeacherId($teacherId): Collection
    {
        $studentIds = studentAndTeachers::where('teacher_id', $teacherId)
            ->pluck('student_id');
        return $studentIds->map(function ($studentId) {
            return $this->find($studentId);
        });


    }
    public function updateParentAndChildren($createdUser, array $validated): void
    {
        (new \App\Models\ParentChild)->update([
            'student_id' => $createdUser['id'],
            'parent_id' => $validated['parent_id'] ?? null,
        ]);
    }
    public function updateStudentAndTeachers($createdUser, array $teachers): void
    {
        $studentId = $createdUser->id;
        $teacherIds = $teachers ?? null;
        foreach ($teacherIds as $teacherId) {
            (new \App\Models\studentAndTeachers)->update([
                'student_id' => $studentId,
                'teacher_id' => $teacherId,
            ]);
        }
    }


}
