<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bid';
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(Pengguna::class,'pengguna_id');
    }
}
