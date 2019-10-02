<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GisTahunanController extends Controller
{
    public function gistahunan()
    {
        return view('/backend.gistahunan');
    }
}
