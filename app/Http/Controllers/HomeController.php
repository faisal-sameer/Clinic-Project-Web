<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicDetails;
use App\Models\Service;
use App\Models\Discount;


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

        $aboutUs = ClinicDetails::where('id', 1)->select('text_ar', 'text_en', 'path')->first();
        $services = Service::select('id', 'Name_ar')->get();

        $discounts = Discount::select('id', 'title_ar', 'text_ar', 'Price')->get();


        $all = ['aboutUs' => $aboutUs, 'services' => $services, 'discounts' => $discounts];

        // need to send all data 
        return view('welcome')->with('all', $all);
    }
}
