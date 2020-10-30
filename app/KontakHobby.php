<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontakHobby extends Model
{
    protected $table = 'kontak_hobbies';

    public function kontak()
    {
        return $this->hasMany(Kontak::class);
    }
    public function hobby()
    {
        return $this->hasMany(Hobby::class);
    }
}
