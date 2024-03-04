<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        return view('register');
    }
    public function registered(Request $request){
        $request->validate([
            'nama_lengkap'   => 'required',
            'username'       => 'required',
            'password'       => 'required|min:6',
            'alamat'         => 'required',
            'avatar'         => 'required',
            'tgl_lahir'      => 'required',
            'email'          => 'required|unique:users,email',
        ]);

        // upload image
        $file_foto = $request->file('avatar');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'user-'.date('dmyhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/fotoprofile'), $nama_foto);
        
        $dataStore = [
            'nama_lengkap'  => $request->nama_lengkap,
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'alamat'        => $request->alamat,
            'avatar'        => $nama_foto,
            'tgl_lahir'     => $request->tgl_lahir,
            'email'         => $request->email,
        ];
        User::create($dataStore);
        return redirect('/register')->with('success', 'Data berhasil di simpan');
    }

    public function auth(Request $request){
        $request->validate([
            'username'     =>'required',
            'password'  => 'required',
        ]);

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect('/dasboard');
        }else{
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function updateprofil (Request $request){
        $user = auth()->user();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $extensi = $avatar->getClientOriginalExtension();
            $filename = 'users' . now()->timestamp .'.'. $extensi;
            $avatar->move('fotoprofile', $filename);
            $user->avatar = $filename;
        } else {
            $avatar = $user->avatar;
        }
        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        $user->save();
        return redirect()->back()->with('success', 'Data perubahan tersimpan');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

}
