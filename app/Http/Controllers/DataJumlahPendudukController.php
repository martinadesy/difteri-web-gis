<?php

namespace App\Http\Controllers;

use App\Jatim;
use App\Penduduk;
use Illuminate\Http\Request;

class DataJumlahPendudukController extends Controller
{
    public function datajumpenduduk()
    {
        $params = [
            'penduduk' => Penduduk::all()
        ];

        return view('datajumpenduduk', $params);
    }
}
