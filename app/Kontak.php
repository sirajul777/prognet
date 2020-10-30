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

    // public function kontakHobby()
    // {
    //     return $this->belongsToMany('App\KontakHobby');
    // }

    public function hobby()
    {
        return $this->belongsToMany(Hobby::class, 'kontak_hobbies', 'kontakid', 'hobbyid');
    }
}
