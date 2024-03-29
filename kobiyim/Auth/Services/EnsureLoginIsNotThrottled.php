<?php

namespace Kobiyim\Auth\Services;

use Illuminate\Auth\Events\Lockout;
use Kobiyim\Auth\Http\Responses\LockoutResponse;

class EnsureLoginIsNotThrottled
{
    protected $limiter;

    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, $next)
    {
        if (!$this->limiter->tooManyAttempts($request)) {
            return $next($request);
        }

        event(new Lockout($request));

        return app(LockoutResponse::class);
    }
}
