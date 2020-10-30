<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontaks';

    public function darah()
    {
        return $this->hasOne('App\GolonganDarah', 'id', 'darahid');
    }
}
