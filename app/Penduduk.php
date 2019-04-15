<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    public function id_kabupaten() {
        return $this->belongsTo(Jatim::class, 'kabupaten_id', 'id_kabupaten');
    }
}
