<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $table = 'kasus';

    public function id_kabupaten() {
        return $this->belongsTo(Jatim::class, 'kabupaten_id', 'id_kabupaten');
    }
}
