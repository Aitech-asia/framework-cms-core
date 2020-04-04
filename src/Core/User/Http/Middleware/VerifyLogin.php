<?php

namespace Core\User\Http\Middleware;

use Closure;

class VerifyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param int|string               $permission
     *
     * @throws \Core\User\Exceptions\PermissionDeniedException
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (user()->isNew && config('auth.verify_email')) {
            return redirect(guard_url('verify'));
        }

        if (user()->isLocked) {
            return redirect(guard_url('locked'));
        }

        return $next($request);
    }
}
