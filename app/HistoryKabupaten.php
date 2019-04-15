<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryKabupaten extends Model
{
    protected $table = 'history_kabupaten';

    public function id_kasus() {
        return $this->belongsTo(Kasus::class, 'kasus_id', 'id_kasus');
    }
    public function id_imunisasi() {
        return $this->belongsTo(Jatim::class, 'imunisasi_id', 'id_imunisasi');
    }
    public function id_periode() {
        return $this->belongsTo(Jatim::class, 'periode_id', 'id_periode');
    }
    public function id_penduduk() {
        return $this->belongsTo(Jatim::class, 'penduduk_id','id_penduduk');
    }
    public function id_kabupaten() {
        return $this->belongsTo(Jatim::class, 'kabupaten_id', 'id_kabupaten');
    }
}
