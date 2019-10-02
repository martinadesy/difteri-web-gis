<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kasus;
use App\Imunisasi;
use App\Penduduk;
use App\Jatim;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kabupaten = Jatim::count();
        $jml_penderita = Kasus::count();
        $kematian = Kasus::count();


        $params = [
            'totalKabupaten'=> $kabupaten,
            'totalPenderita' => $jml_penderita,
            'totalKematian' => $kematian
        ];

        return view('home');
    }
}
