<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use RealRashid\SweetAlert\Facades\Alert;

class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function dashboardClinicToday()
    {
        // return  substr(date('c'), 0, -14);
        $Reservations = Reservation::where('Date', 'like',  substr(date('c'), 0, -14) . '%')->get();
        return view('dashboardClinicToday')->with('Reservations', $Reservations);
    }

    protected function dashboardClinicPast()
    {

        $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->get();
        return view('dashboardClinicPast')->with('Reservations', $Reservations);
    }

    protected function dashboardClinicFuture()
    {

        $Reservations = Reservation::where('Date', '>',  substr(date('c'), 0, -14) . '%')->get();
        return view('dashboardClinicAfter')->with('Reservations', $Reservations);
    }

    protected function Coming(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم تسجيل حضور للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function DidCome(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 3
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::info('تم تسجيل عدم حضور للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function Complete(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 4
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success(' انتهت الجلسة للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function NewAppointment(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success(' تم حجز موعد جديد للمراجع', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function Leave(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 6
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::info('تم تسجبل عدم اكمال جلسة المراجعة ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function WithoutAppointment(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 7
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::info('لم يتم تسجل موعد جديد للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }
}