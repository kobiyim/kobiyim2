<?php

namespace Kobiyim\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Kobiyim\Auth\Http\Requests\RegisterRequest;
use Kobiyim\Auth\Services\CreatesNewUsers;
use Kobiyim\Http\Controllers\Controller;

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
