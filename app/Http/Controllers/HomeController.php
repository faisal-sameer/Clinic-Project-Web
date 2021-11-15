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
        $all['imageBig'] = ClinicDetails::where('type', 2)->select('path')->first();
        // need to send all data 
        return view('welcome')->with('all', $all);
    }
}
