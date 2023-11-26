<?php

/**
 * Güncelleme Notları
 * @version v1.0.0
 * İlk yayına alınan versiyon
 */

namespace App\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetLinkController extends Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => [
                'required', 'size:16',
            ],
        ]);

        $user = User::where('phone', $request->phone)->first();

        $code = rand(100000, 999999);

        if ($user != null) {
            ar([
                'description' => 'Kullanıcı yeni şifre talebinde bulundu.',
                'causer_id'   => $user->id,
            ]);

            sendSms($user->phone, 'Şifrenizi sıfırlamak için kullanacağınız kod: '.$code);

            $user->update([
                'remember_token'      => Hash::make($code),
                'remember_expires_at' => now()->addMinutes(5),
            ]);
        }

        return ($user)
            ? redirect()->route('password.reset')->with(['status' => 'Sıfırlama kodu gönderildi.', 'phone' => $user->phone])
            : back()->withInput($request->only('phone'))->withErrors(['phone' => 'Bi hata oluştu']);
    }
}
