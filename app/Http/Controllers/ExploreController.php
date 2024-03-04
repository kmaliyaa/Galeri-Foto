<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\Komentar;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $dasboard = Foto::with(['like'])->withCount(['like', 'komentar'])->where('judul_foto', 'like', '%'.$request->cari.'%')->orderBy('id', 'desc')->paginate(6);  
        } else {
            $dasboard = Foto::with(['like'])->withCount(['like', 'komentar'])->orderBy('id', 'desc')->paginate(6);
        }
        return response()->json([
            'data'          => $dasboard,
            'statuscode'    => 200,
            'Userid'        => auth()->user()->id
        ]);
    }

    public function like(Request $request){
        
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
     
    }

    public function getdatadetail(Request $request, $id){
        $dataDetailFoto     = Foto::with('user')->where('id', $id)->firstOrFail();
        $like = Foto::with(['like', 'komentar'])->withCount(['like', 'komentar'])->where('id', $id)->first();
        return response()->json([
            'dataDetailFoto'    => $dataDetailFoto,
            'jumlahdata'        => $like,
        ], 200);
    }

    public function ambildatakomentar(Request $request, $id){
        $ambilKomentar = Komentar::with('user')->where('foto_id', $id)->get();
        return response()->json([
           'data'        => $ambilKomentar
        ], 200);
    }

    public function kirimkomentar(Request $request){
        try {
            $request->validate([
                'fotoid'       => 'required',
                'isi_komentar' => 'required'
            ]);
            $dataStoreKomentar = [
                'user_id'       => auth()->user()->id,
                'foto_id'       => $request->fotoid,
                'isi_komentar'  => $request->isi_komentar
            ];
            Komentar::create($dataStoreKomentar);
            return response()->json([
                'data'          => 'Data berhasil di simpan',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('Data komentar gagal di simpan', 500);
        }
    }

    // public function tampilkandata($request, $id){
    //     $data = Foto::find($id);
    //     return view('page.editprofil', compact('data'));
    // }
}
