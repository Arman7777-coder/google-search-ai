<?php

namespace App\Http\Middleware;

use App\Enum\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user->hasAnyRole([
            UserRoleEnum::ADMIN->value,
            UserRoleEnum::MANAGER->value,

        ])) {
            abort(403, 'User does not have the right roles');
        }
        return $next($request);
    }
}
