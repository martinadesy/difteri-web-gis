<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AHP extends Model
{
    protected $table = 'ahp';

    public function history_kabupaten_id() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
