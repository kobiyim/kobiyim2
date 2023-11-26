<?php

/**
 * Güncelleme Notları
 * @version v1.0.0
 * İlk yayına alınan versiyon
 */

namespace App\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Auth\Http\Requests\LoginRequest;
use App\Auth\Services\AttemptToAuthenticate;
use App\Auth\Services\EnsureLoginIsNotThrottled;
use App\Auth\Services\PrepareAuthenticatedSession;
use App\Auth\Services\CheckIP;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function create(Request $request)
    {
        return view('kobiyim.auth.login');
    }

    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            ar([
                'description' => 'Kullanıcı sisteme giriş yaptı.',
                'causer_id'   => Auth::id(),
            ]);

            return redirect()->intended('/');
        });
    }

    protected function loginPipeline(LoginRequest $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            EnsureLoginIsNotThrottled::class,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
            CheckIP::class
        ]));
    }

    public function destroy(Request $request)
    {
        ar([
            'description' => 'Kullanıcı çıkış yaptı.',
            'causer_id'   => Auth::id(),
        ]);

        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }
}
