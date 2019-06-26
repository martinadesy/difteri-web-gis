<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $table = 'kasus';
    public $timestamps = false;

    protected $fillable = ['jml_penderita', 'kematian', 'id_jatim', 'id_periode'];

    public function getJatim() {
        return $this->hasOne(Jatim::class, 'gid', 'id_jatim');
    }

}
