<?php

namespace Kobiyim\Auth\Services;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;

class CheckIP
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function handle($request, $next)
    {
        if (in_array($request->ip(), array_values(explode(',', env('ALLOWEDIP')))) and 1 == Auth::user()->check_id) {
            $this->guard->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->intended('/');
        }

        return $next($request);
    }
}
