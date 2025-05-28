<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class film extends Model
{
     protected $fillable = ['judul', 'ringkasan', 'tahun', 'poster', 'genre_id'];

     public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
