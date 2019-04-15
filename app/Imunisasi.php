<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $table = 'imunisasi';

    public function id_kabupaten() {
        return $this->belongsTo(Jatim::class, 'kabupaten_id', 'id_kabupaten');
    }
}
