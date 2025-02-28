<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Permissions;

use App\Enum\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\RolesCreateRequest;
use App\Http\Requests\Admin\Roles\RolesUpdateRequest;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class RolesController extends Controller
{
    public function __construct(
        private readonly RoleRepositoryInterface $roleRepository,
        private readonly PermissionRepositoryInterface $permissionRepository
    )
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->middleware('permission:'. PermissionEnum::CREATE_ROLES->value, ['only' => ['create', 'destroy']]);
        $this->middleware('permission:'. PermissionEnum::ASSIGN_PERMISSION_TO_ROLES->value,  ['only' => ['edit','show', 'index']]);
    }
    public function index(): View|Application|Factory
    {
        $roles = $this->roleRepository->getAllRolesWithPermissions();
        return view('admin.roles.index', compact ('roles'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $permissions = $this->permissionRepository->getAllPermissions();
        return view('admin.roles.create', compact ('permissions'));
    }

    public function store(RolesCreateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $newRole = $this->roleRepository->create(['name' => $validated['name'], 'guard_name' => config('auth.defaults.guard')]);
        $permissions = $this->permissionRepository->whereIn('id' ,$validated['permissions']);
        $newRole->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('message', 'Successfully created');
    }

    public function edit(int $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->getAllPermissions();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(RolesUpdateRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();
        $role = $this->roleRepository->find($id);
        $this->roleRepository->updateById($id, ['name' => $validated['name']]);
        $permissions = $this->permissionRepository->whereIn('id' ,$validated['permissions']);
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('message', 'Successfully updated');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->roleRepository->delete($id);
        return response()->json(['success' => true]);
    }
}
