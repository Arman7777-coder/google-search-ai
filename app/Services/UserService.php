<?php

declare(strict_types=1);

namespace App\Services;


use App\Enum\PermissionEnum;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    public function getFilteredRolesAdminDashboardUsers(User $user): array
    {
        $viewUserRoles = [PermissionEnum::VIEW_CASHIERS, PermissionEnum::VIEW_ADMINS, PermissionEnum::VIEW_DISPATCHERS, PermissionEnum::VIEW_USERS];
        $exceptRoles = [];
        foreach ($viewUserRoles as $role) {
            if (!$user->can($role->name)) {
                $exceptRoles[] = $role;
            }
        }
        return $exceptRoles;
    }

    public function getAllowedRolesAdminDashboardUsers(User $user): array
    {
        $viewUserRoles = [PermissionEnum::VIEW_CASHIERS, PermissionEnum::VIEW_ADMINS, PermissionEnum::VIEW_DISPATCHERS, PermissionEnum::VIEW_USERS];
        $exceptRoles = [];
        foreach ($viewUserRoles as $role) {
            if (!$user->can($role->name)) {
                $exceptRoles[] = $role;
            }
        }
        return $exceptRoles;
    }

    public function createUser(array $validated, Role $role): void
    {
        $validated['password'] = Hash::make($validated['password']);
        if (isset($validated['avatar'])){
            $validated['avatar'] = $this->userRepository->saveAvatar($validated['avatar']);
        }
        $validated['email_verified_at'] = now();
        $validated['role'] = $role->name;
        unset($validated['role']);
        $createdUser = $this->userRepository->create($validated);
        $createdUser->assignRole($role->name);

    }

    public function updateUser(int $id, array $validated, Role $role): void
    {
        $user = $this->userRepository->find($id);
        if($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        if (isset($validated['avatar'])){
            if ($user->avatar) {
                File::delete(public_path($user->avatar));
            }
            $validated['avatar'] = $this->userRepository->saveAvatar($validated['avatar']);
        }
        if (isset($validated['teachers'])) {
            $teachers = $validated['teachers'];
            unset($validated['teachers']);
        }
        if($validated['role']) {
            $validated['role'] = $role->name;;
        } else {
            unset($validated['role']);
        }

        unset($validated['role']);
        $this->userRepository->updateWhere(['id' => $id],$validated);
        $user->assignRole($role->name);
    }


}
