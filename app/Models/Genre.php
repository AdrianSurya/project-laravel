<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
     protected $fillable = ['nama'];

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
