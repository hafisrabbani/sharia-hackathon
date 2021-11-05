<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Donasi extends Model
{
    protected $table = 'donation';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Pengguna::class,'pengguna_id');
    }
}
