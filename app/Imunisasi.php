<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $table = 'imunisasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getJatim() {
        return $this->hasOne(Jatim::class, 'gid', 'id_jatim');
    }



}
