<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Service;

class GuestController extends Controller
{
    protected function Services()
    {
        $Services = Service::where('Status', 1)->get();

        foreach ($Services as $Service) {
            $d[] = ['id' => $Service->id, 'name' => $Service->Name,];
        }

        return response()->json(['status' => 'success', 'data' => $d]);
    }
    protected function AppointmentNew(Request $request)
    {

        if ($request->NID == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ رقم الهوية او الاقامة"]);
        } else if ($request->Name == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ اسم للحجز "]);
        } else if ($request->Phone == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ رقم الجوال  "]);
        } else if ($request->Day == null /* || $request->Appointment  <  substr(date('c'), 0, -9)*/) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ موعد الحجز "]);
        } else if ($request->Service == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم اختيار نوع الخدمة  "]);
        } else {
            $ServiceRequest = Service::where('Name', $request->Service)->first();

            $reservations = new Reservation();
            $reservations->NID = $request->NID;
            $reservations->Name = $request->Name;
            $reservations->Date = $request->Day . "T" . date("H:i", strtotime($request->Time));
            $reservations->Phone = $request->Phone;
            $reservations->services_id = $ServiceRequest->id;
            $reservations->Status = 1;
            $reservations->save();
        }
        return response()->json(['status' => 'success', 'data' =>  "Done"]);
    }
    protected function  dashboardUser(Request $request)
    {
        $myReservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'Status')->get();
        $CountReservations = Reservation::where('NID', $request->NID)->count();
        $all['myReservations'] = [$myReservations];
        $all['CountReservations'] = [$CountReservations];

        return response()->json(['status' => 'success', 'data' =>  $all]);
    }
}
