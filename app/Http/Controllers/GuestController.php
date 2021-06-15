<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected function reservation()
    {
        return view('reservation');
    }
}
