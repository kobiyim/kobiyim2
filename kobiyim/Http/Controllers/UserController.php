<?php

namespace Kobiyim\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Kobiyim\Models\Permission;
use Kobiyim\Models\User;
use Kobiyim\Models\UserPermission;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.users.index');
    }

    public function json(Request $request)
    {
        $model = User::query();

        return DataTables::eloquent($model)
            ->addColumn('islemler', 'kobiyim.system.users.actions')
            ->setRowAttr([
                'style' => function ($model) {
                    return ('0' == $model->is_active) ? 'background-color: rgb(255,0,0,0.1);' : 'background-color: rgb(0,255,0,0.1);';
                },
            ])
            ->rawColumns(['islemler'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => $request->password,
            ],
            [
                'name' => 'required|min:3|max:128',
                'phone' => 'required|size:16|unique:users,phone',
                'password' => 'required|min:8',
            ],
            [
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min' => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max' => 'Stok adı maksimum 128 karakter olabilir.',
            ]
        );

        if ($validator->passes()) {
            $created = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'is_active' => 1,
            ]);

            ar([
                'subject_type' => 'Kobiyim\Models\User',
                'subject_id' => $created->id,
                'description' => 'Kullanıcı eklendi.',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kullanıcı aktif olarak eklendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'phone' => $request->phone,
            ],
            [
                'name' => 'required|min:3|max:128',
                'phone' => 'required_without:email|nullable',
            ],
            [
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min' => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max' => 'Stok adı maksimum 128 karakter olabilir.',
            ]
        );

        if ($validator->passes()) {
            User::find($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'type' => $request->type,
            ]);

            ar([
                'subject_type' => 'Kobiyim\Models\User',
                'subject_id' => $id,
                'description' => 'Kullanıcı güncellendi.',
            ]);

            if ($request->has('password')) {
                User::find($id)->update(['password' => Hash::make($request->password)]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Kullanıcı düzenlendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $get = User::find($id);

        $get->update([
            'is_active' => (1 == $get['is_active']) ? 0 : 1,
        ]);

        ar([
            'subject_type' => 'Kobiyim\Models\User',
            'subject_id' => $id,
            'description' => 'Kullanıcı durumu değiştirildi.',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kullanıcı aktifliği '.((1 == $get['is_active']) ? 'aktif' : 'pasif').' olarak değiştirildi.',
        ]);
    }

    public function permission(Request $request, $id)
    {
        $data = [
            'all' => Permission::all(),
            'user' => UserPermission::where('user_id', $id)->get()->groupBy('permission_id')->toArray(),
            'get' => User::find($id),
        ];

        return view('kobiyim.system.users.permission', $data);
    }

    public function savePermission(Request $request, $id)
    {
        UserPermission::where('user_id', $id)->delete();

        foreach ($request->all() as $key => $value) {
            if (Str::contains($key, 'perm') and true == $value) {
                UserPermission::create([
                    'user_id' => $id,
                    'permission_id' => str_replace('perm', '', $key),
                ]);
            }
        }

        ar([
            'subject_type' => 'Kobiyim\Models\UserPermission',
            'subject_id' => $id,
            'description' => 'Kullanıcı izinleri güncellendi.',
        ]);

        return redirect()->route('user.index');
    }
}
