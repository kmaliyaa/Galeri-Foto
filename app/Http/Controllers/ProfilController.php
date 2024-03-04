<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function getdataprofil(Request $request) {
        $datauser = auth()->user();
        return response()->json([
            'datauser' => $datauser
        ], 200);
    }

    public function getdata(Request $request){
        $user = auth()->id();
        $dasboard = Foto::with(['like', 'komentar'])->withCount(['like', 'komentar'])->orderBy('id', 'desc')->where('user_id',$user)->paginate(6);
        return response()->json([
            'data'          => $dasboard,
            'statuscode'    => 200,
            'Userid'        => auth()->user()->id
        ]);
    }

    public function like(Request $request){
        try {
            $request->validate([
                'fotoid'    => 'required'
            ]);

            $existingLike = Like::where('foto_id', $request->fotoid)->where('user_id', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'foto_id'   => $request->fotoid,
                    'user_id'   => auth()->user()->id 
                ];
                Like::create($dataSimpan);
            } else {
                Like::where('foto_id', $request->fotoid)->where('user_id', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return Response()->json('Something went wrong', 500);
        }
    }

    public function tambah_album(Request $request){
        $request->validate([
            'nama_album'    => 'required'         
        ]);
        $file_foto = $request->file('foto_album');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'album-'.date('dymhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/sampulalbum'), $nama_foto);

        $dataalbum = [
            'nama_album'       => $request->nama_album,
            'foto_album'    => $nama_foto,
            'user_id'         => Auth::user()->id,
        ];
        Album::create($dataalbum);
        return redirect('/album');
    }

    public function albumuser(Request $request){
        $data = auth()->user();
        $tampilalbum = Album::where('user_id', Auth::user()->id)->get();
        return view('page.album', compact('data', 'tampilalbum'));
    }

    public function upload(Request $request){
        $data = auth()->user();
        $tampilalbum = Album::where('user_id', Auth::user()->id)->get();
        return view('page.uploadfoto', compact('tampilalbum', 'data'));
    }

    public function isialbum($id){
        $data = auth()->user();
        $foto = Foto::where('album_id', $id)->where('user_id', Auth::user()->id)->get();
        $tampilalbum = Album::where('user_id', Auth::user()->id)->get();
        return view('page.isialbum', compact('tampilalbum', 'data', 'foto'));
    }

}
