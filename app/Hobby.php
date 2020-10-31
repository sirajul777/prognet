<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';

    public function kontak()
    {
        return $this->belongsToMany(Kontak::class, 'kontak_hobies', 'kontakid', 'hobbyid');
    }
}
