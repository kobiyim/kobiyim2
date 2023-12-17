<?php

namespace Kobiyim\Auth\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Kobiyim\Auth\Services\LoginRateLimiter;

class LockoutResponse implements Responsable
{
    protected $limiter;

    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function toResponse($request)
    {
        return with($this->limiter->availableIn($request), function ($seconds) {
            throw ValidationException::withMessages(['phone' => [trans("Çok fazla giriş denemesi yaptınız.\nGiriş denemeleriniz engellendi. :seconds", ['seconds' => $seconds])]])->status(Response::HTTP_TOO_MANY_REQUESTS);
        });
    }
}
