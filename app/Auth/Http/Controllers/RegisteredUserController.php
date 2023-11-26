<?php

/**
 * Güncelleme Notları
 * @version v1.0.0
 * İlk yayına alınan versiyon
 */

namespace App\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Auth\Http\Requests\RegisterRequest;
use App\Auth\Services\CreatesNewUsers;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.register');
    }

    public function store(RegisterRequest $request, CreatesNewUsers $creator)
    {
        $creator->create($request->all());

        return redirect('/');
    }
}
