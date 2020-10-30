<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    protected $table = 'golongan_darahs';

    public function kontak()
    {
        return $this->belongsTo('App\Kontak');
    }
}
