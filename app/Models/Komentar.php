<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;
   protected $fillable = [
    'foto_id',
    'user_id',
    'isi_komentar'
   ];

   protected $table = 'komentar';

   public function user(){
    return $this->belongsTo(User::class, 'user_id', 'id');
   }
}
