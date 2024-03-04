<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FotoController extends Controller
{  
    public function savefoto(Request $request){
        $request->validate([
            'lokasi_file'       => 'required|mimes:png,jpg|max:1024',
            'judul_foto'        => 'required',
            'deskripsi'         => 'required'
        ]);

        $lokasi_file        = $request->file('lokasi_file');
        $ektensi_foto       = $lokasi_file->extension();
        $ektensi_foto       = $lokasi_file->getClientOriginalExtension();
        $nama_foto          = 'savefoto-' . date('dmyhis') . '.' . $ektensi_foto;
        $lokasi_file->move(public_path('/assets'), $nama_foto);
        $data_store = [
            'judul_foto'        => $request->judul_foto,
            'deskripsi'         => $request->deskripsi,
            'lokasi_file'       => $nama_foto,
            'album_id'          => $request->nama_album,
            'user_id'           => auth()->user()->id
        ];
        Foto::create($data_store);
        return redirect()->back()->with('success', 'Data berhasil di simpan');
    }

    public function updatedeskripsi (Request $request, $id){
        $foto = Foto::find($id);
        $foto->judul_foto = $request->judul_foto;
        $foto->deskripsi = $request->deskripsi;
        $foto->save();
        return redirect()->back()->with('success', 'Perubahan berhasil');
    }

    public function tampildata ($id){
        $foto = Foto::find($id);
        return view('page.detail', compact('foto'));
    }

    public function editdeskripsi ($id){
        $foto = Foto::find($id);
        return view('page.editfoto', compact('foto'));
    }

   public function hapus($id){
    $foto = Foto::findOrFail($id);

    if ($foto) {
        // Hapus foto dari direktori
        $lokasi_file = public_path('/assets/') . $foto->lokasi_file;
        if (File::exists($lokasi_file)) {
            File::delete($lokasi_file);
        }

        // Hapus data dari database
        $foto->delete();

        return redirect('/dasboard')->with('success', 'Foto berhasil dihapus');
    } else {
        return redirect('/dasboard')->with('error', 'Foto tidak ditemukan');
    }
}
    
}
