<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\UserRepositoryInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class SocialLoginController extends Controller
{
    //TODO Add right redirect route
    protected string $redirectTo = '/';

    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {

    }

    public function redirectToProvider($provider): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->userRepository->getSocialiteUserByProviderId($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }
}
