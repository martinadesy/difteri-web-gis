<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getJatim() {
        return $this->hasOne(Jatim::class, 'gid', 'id_jatim');
    }

}
