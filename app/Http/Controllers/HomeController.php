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
    public function index(Request $request)
    {
        if ($request->segment(1) == 'ar') {

            $aboutUs = ClinicDetails::where('id', 1)->select('text', 'path')->first();
            $all = ['aboutUs' => $aboutUs];
        } else {

            $aboutUs = ClinicDetails::where('id', 2)->select('text', 'path')->first();
            $all = ['aboutUs' => $aboutUs];
        }
        // need to send all data 
        return view('welcome')->with('all', $all);
    }
}
