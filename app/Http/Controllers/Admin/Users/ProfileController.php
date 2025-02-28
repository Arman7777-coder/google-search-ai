<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ProfileRequest;
use App\Models\CountryIso;
use App\Repository\CountryIsoRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function App\Helpers\getAuthUser;

final class ProfileController extends Controller
{

    public function __construct(
        private readonly UserRepositoryInterface $userRepository,

    ) {}

    /*** @throws Exception */
    public function index(): View|Application|Factory
    {
        $user = getAuthUser();
        return view('admin.profile', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(ProfileRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();
        $this->userRepository->updateAdminData($id, $validated);

        return redirect()->route('profile.index');
    }

    public function destroy($id)
    {
        //
    }
}
