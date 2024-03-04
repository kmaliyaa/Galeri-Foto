<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_album',
        'foto_album',
    ];

    protected $table = 'album';

    public function user(){
    return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function foto(){
        return $this->hasMany(Foto::class, 'foto_id', 'id');
    }
}
