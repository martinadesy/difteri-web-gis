<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NBController extends Controller
{
    public function naturalbreaks()
    {
        return view('/process.naturalbreaks');
    }
}
