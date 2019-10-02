<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikTahunanController extends Controller
{
    public function grafiktahunan()
    {

        return view('/backend.grafiktahunan');
    }
}
