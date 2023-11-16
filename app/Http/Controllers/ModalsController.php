<?php

namespace Kobiyim\Http\Controllers;

use Kobiyim\Models\Permission;
use Kobiyim\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ModalsController extends Controller
{
    public function __invoke(Request $request)
    {
        // bu derleyici içine erişebilmek için key olmak zorunda
        if ($request->has('key') and method_exists($this, $request->key)) {
            return $this->{$request->key}($request);
        }

        return throw new Exception('Modal Anahtarı Bulunamadı'.$request->key, 1);
    }

    public function createUser(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim::modals.system.users.create')->render(),
        ]);
    }

    public function editUser(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim::modals.system.users.edit', [
                'get'       => User::find($request->id)
            ])->render(),
        ]);
    }

    public function createPermission(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim::modals.system.permissions.create')->render(),
        ]);
    }

    public function editPermission(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim::modals.system.permissions.edit', [
                'get' => Permission::find($request->id),
            ])->render(),
        ]);
    }
}
