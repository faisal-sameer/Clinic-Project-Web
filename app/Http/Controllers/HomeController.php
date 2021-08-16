<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicDetails;

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
        $all = ClinicDetails::get();
        // need to send all data 
        $arr = array('text' => $all[0]->text);
        return view('welcome',  $arr);
    }
}
