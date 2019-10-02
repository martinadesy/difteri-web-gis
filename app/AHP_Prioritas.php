<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AHP_Prioritas extends Model
{
    protected $table = 'ahp_prioritas';
    public $timestamps = false;

    protected $fillable = ['ahp_prioritas', 'nilai_prioritas'];

}
