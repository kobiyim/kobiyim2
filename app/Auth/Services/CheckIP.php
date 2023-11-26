<?php

namespace App\Auth\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;

class CheckIP
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function handle($request, $next)
    {
        if(in_array($request->ip(), array_values(explode(',', env('ALLOWEDIP')))) AND Auth::user()->check_id == 1) {
            $this->guard->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->intended('/');
        }

        return $next($request);
    }

}
