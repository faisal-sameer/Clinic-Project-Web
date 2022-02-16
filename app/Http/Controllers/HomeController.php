<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicDetails;
use App\Models\Service;
use App\Models\Discount;
use App\Mail\SendEMail;
use App\Models\Doctor;

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
        $doctor = Doctor::select('id', 'doctor_id', 'info_ar', 'path')->get();

        $test = new SendNoificationFCM();

        $test->sendGCM("تم تاكيد موعدك", 'Web', "token", "1", "w");


        $all = ['aboutUs' => $aboutUs, 'services' => $services, 'discounts' => $discounts, 'doctor' => $doctor];

        // need to send all data 
        return view('welcome')->with('all', $all);
    }

    protected function SendEmail(Request $request)
    {
        $detailsforCustomer = [
            'title' => 'Af Title',
            'description' => 'AF Body ',
            'body' => now() . 'صلاحية الكود تنتهي بعد '
        ];
        $detailsforAdmin = [
            'title' => 'Boss Af Title',
            'description' => 'Boss AF Body ',
            'body' => now() . 'صلاحية الكود تنتهي بعد '
        ];
        $email = $request['email'];
        \Mail::to($email)->send(new SendEMail($detailsforCustomer));
        \Mail::to('ezooag@gmail.com')->send(new SendEMail($detailsforAdmin));

        return back();
    }
}
