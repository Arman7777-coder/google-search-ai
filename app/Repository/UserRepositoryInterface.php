<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use App\Enum\UserRoleEnum;

/**
 * @method update($id, array $validatedData)
 */
interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function find(int $id): mixed;

    public function getAllUsers(): mixed;

    public function getSocialiteUserByProviderId($user, $provider): User;

    public function findByEmail(string $email);



    public function changeEmail(int $userId, string $email);

    public function getAllUsersByFilteredRoles(string $role);

    public function updateAdminData(int $id, array $attributes);

    public function getUserWithPermissions(int $id): mixed;

    public function parentAndChildren($createdUser, array $validated);

    public function getAllParentsChildren(): mixed;

    public function updateStudentAndTeachers($createdUser, array $teachers);

    public function updateParentAndChildren($createdUser, array $validated);

    public function studentAndTeachers($createdUser, array $validated);

    public function getAllStudentsByTeacherId($teacherId): mixed;



}
