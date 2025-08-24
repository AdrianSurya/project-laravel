<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peran extends Model
{
    protected $fillable = ['id', 'film_id', 'cast_id', 'nama'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
    
    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
}
