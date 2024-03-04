<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi',
        'lokasi_file',
        'album_id',
        'user_id',
    ];

    protected $table = 'foto';
 
    //Relasi
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function like(){
        return $this->hasMany(Like::class, 'foto_id', 'id');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'foto_id', 'id');
    }

    public function album(){
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

}
