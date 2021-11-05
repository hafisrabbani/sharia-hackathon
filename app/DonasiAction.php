<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonasiAction extends Model
{
    protected $table = 'donasi_action';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Pengguna::class,'pengguna_id');
    }
}