<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontakHobby extends Model
{
    protected $table = 'kontak_hobbies';

    public function kontak()
    {
        return $this->belongsTo('App\Kontak');
    }
    public function hobby()
    {
        return $this->belongsTo('App\Hobby');
    }
}
