<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'foto_id'
    ];

    protected $table = 'like';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //Relasi Nilai balik
    public function foto() {
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }
}
