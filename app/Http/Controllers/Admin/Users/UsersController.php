<?php

namespace App\Http\Controllers\Admin\Users;

use App\Enum\PermissionEnum;
use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserCreateRequest;
use App\Http\Requests\Admin\Users\UserUpdateRequest;
use App\Http\Resources\RoleResource;
use App\Repository\CountryIsoRepositoryInterface;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function App\Helpers\getAuthUser;


class UsersController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface       $userRepository,
        private readonly UserService                   $userService,
        private readonly RoleRepositoryInterface       $roleRepository,

    )
    {
        $this->checkMiddlewares();
    }

    public function checkMiddlewares(): void
    {
        $this->middleware('permission:' . PermissionEnum::CREATE_USER->value, ['only' => ['create']]);
        $this->middleware('permission:' . PermissionEnum::EDIT_USER->value, ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . PermissionEnum::VIEW_USERS->value, ['only' => ['show', 'index']]);
        $this->middleware('permission:' . PermissionEnum::DELETE_USER->value, ['only' => ['destroy']]);

    }

    /*** @throws Exception */
    public function index(): View|Application|Factory
    {
        $users = $this->userRepository->getAllUsers();
//        $type = $this->userRepository->getAllUsersByFilteredRoles()
        return view('admin.users.index', compact('users'));
    }
    public function all(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->userRepository->all();
        return view('admin.users.index', compact('users'));
    }

    /*** @throws Exception */
    public function create(): View|Application|Factory
    {
        $currentUser = getAuthUser();
        $allowedRoles = $this->userService->getAllowedRolesAdminDashboardUsers($currentUser);
        $roles = $this->roleRepository->getAllRolesWithPermissions();
        $userAllPermissions = $currentUser->getAllPermissions();
        $parents = $this->userRepository->getAllUsersByFilteredRoles('parent');
        $teachers = $this->userRepository->getAllUsersByFilteredRoles('teacher');

        return view('admin.users.create', compact('allowedRoles', 'roles', 'userAllPermissions','parents','teachers'));
    }

    public function edit(int $id): View|Application|Factory
    {
        $user = $this->userRepository->getUserWithPermissions($id);
        $currentUser = getAuthUser();
        $allowedRoles = $this->userService->getAllowedRolesAdminDashboardUsers($currentUser);
        $roles = $this->roleRepository->getAllRolesWithPermissions();
        $userAllPermissions = $currentUser->getAllPermissions();
        $parents = $this->userRepository->getAllUsersByFilteredRoles('parent');
        $teachers = $this->userRepository->getAllUsersByFilteredRoles('teacher');

        $roles = $this->roleRepository->getAllRolesWithPermissions();
        return view('admin.users.edit', compact('user', 'roles','allowedRoles', 'roles', 'userAllPermissions','parents','teachers'));
    }

    /*** @throws Exception */
    public function store(UserCreateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $role = $this->roleRepository->find($validated['role']);

        switch ($role->name) {
            case UserRoleEnum::USER->value:
                $this->middleware('permission:' . PermissionEnum::CREATE_USER->value);
                break;
            case UserRoleEnum::ADMIN->value:
                $this->middleware('permission:' . PermissionEnum::CREATE_ADMIN->value);
                break;
            case UserRoleEnum::MANAGER->value:
                $this->middleware('permission:' . PermissionEnum::CREATE_MANAGER->value);
                break;

        }
        $this->userService->createUser($validated, $role);
        return redirect()->route('users.index');
    }


    public function update(UserUpdateRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();
        $role = $this->roleRepository->find($validated['role']);
        switch ($role->name) {
            case UserRoleEnum::USER->value:
                $this->middleware('permission:' . PermissionEnum::EDIT_USER->value);
                break;
            case UserRoleEnum::ADMIN->value:
                $this->middleware('permission:' . PermissionEnum::EDIT_ADMIN->value);
                break;
            case UserRoleEnum::MANAGER->value:
                $this->middleware('permission:' . PermissionEnum::EDIT_MANAGER->value);
                break;

        }

        $this->userService->updateUser($id, $validated, $role);
        return redirect()->route('users.index');
    }

    public function destroy(int $id): JsonResponse
    {
        $user = $this->userRepository->find($id);
        $roles = $user->getRoleNames();
        foreach ($roles as $role){
            switch ($role) {
                case UserRoleEnum::USER->value:
                    $this->middleware('permission:' . PermissionEnum::DELETE_USER->value);
                    break;
                case UserRoleEnum::ADMIN->value:
                    $this->middleware('permission:' . PermissionEnum::DELETE_ADMIN->value);
                    break;
                case UserRoleEnum::MANAGER->value:
                    $this->middleware('permission:' . PermissionEnum::DELETE_MANAGER->value);
                    break;

            }
        }
        $user->delete();
        return response()->json(['success' => true]);
    }

    /*** @throws Exception */
    public function getRolePermissions(int $roleId): JsonResponse
    {
        $this->middleware('permission:' . PermissionEnum::ASSIGN_PERMISSION_TO_USERS->value);
        $currentUser = getAuthUser();
        $role = $this->roleRepository->find($roleId);
        $rolePermissions = $role->getAllPermissions();
        $userAllPermissions = $currentUser->getAllPermissions();
        return response()->json([
            'success' => true,
            'selectedPermissions' => RoleResource::collection($rolePermissions),
            'permissions' => RoleResource::collection($userAllPermissions)
        ]);

    }

    public function filterByType(string $type): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->userRepository->getAllUsersByFilteredRoles($type);
        return view('admin.users.index', compact('users','type'));
    }

    public function logout(Request $request): Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }

}
