<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    public function ubahpassword(Request $request){
        $pesan = [
            'password_lama.required'        => 'Password lama harus di isi',
            'password_baru.required'        => 'Password baru harus di isi',
            'password_baru.min'             => 'Password minimal 6 karakter',
            'confirm_password.required'     => 'Konfirmasi password harus di isi',
            'confirm_password.same'         => 'Konfirmasi password harus sama dengan password baru'
        ];

        $request->validate ([
            'password_lama'     => 'required',
            'password_baru'     => 'required|min:6',
            'confirm_password'  => 'required|same:password_baru'
        ],$pesan);

        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return redirect()->back()->with('error', 'Password lama salah');
        } else {
            $user->update ([
                'password'      => Hash::make($request->password_baru)
            ]);

            return redirect()->back()->with('success', 'Password berhasil diperbaharui');
        }
    }
}
