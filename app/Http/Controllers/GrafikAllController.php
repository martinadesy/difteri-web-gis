<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikAllController extends Controller
{
    public function grafikall()
    {
        return view('/backend.grafikall');
    }
}
