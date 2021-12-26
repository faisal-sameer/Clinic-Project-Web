<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    protected function AppointmentsToday()
    {


        $Reservations = Reservation::where('Date', date('Y-m-d'))->paginate(10);

        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($Reservations as  $Reservation) {
                $all[$i++] = [
                    'id' => (int)$Reservation->id, (string) 'NID' => $Reservation->NID, (string) 'Name' => $Reservation->Name,
                    'Day' => (string) $Reservation->Date,
                    'Phone' => (string) $Reservation->Phone, (string)
                    'service' => $Reservation->services_id == null ? $Reservation->discount->title_ar : $Reservation->service->Name_ar,
                    'Status' => (int)$Reservation->Status
                ];
            }
        }

        return response()->json([
            'status' => 'success',
            'data' =>  $all
        ]);
    }

    protected function AppointmentsPast()
    {


        $Reservations = Reservation::where('Date', '<', date('Y-m-d') . '%')->paginate(10);

        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($Reservations as  $Reservation) {
                $all[$i++] = [
                    'id' => (int)$Reservation->id, (string) 'NID' => $Reservation->NID, (string) 'Name' => $Reservation->Name,
                    'Day' => (string) $Reservation->Date,
                    'Phone' => (string) $Reservation->Phone, (string)
                    'service' => $Reservation->services_id == null ? $Reservation->discount->title_ar : $Reservation->service->Name_ar,
                    'Status' => (int)$Reservation->Status
                ];
            }
        }

        return response()->json([
            'status' => 'success',
            'data' =>  $all
        ]);
    }
    protected function AppointmentsFuture()
    {


        $Reservations = Reservation::where('Date', '>',  date('Y-m-d'))->paginate(10);

        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($Reservations as  $Reservation) {
                $all[$i++] = [
                    'id' => (int)$Reservation->id, (string) 'NID' => $Reservation->NID, (string) 'Name' => $Reservation->Name,
                    'Day' => (string) $Reservation->Date,
                    'Phone' => (string) $Reservation->Phone, (string)
                    'service' => $Reservation->services_id == null ? $Reservation->discount->title_ar : $Reservation->service->Name_ar,
                    'Status' => (int)$Reservation->Status
                ];
            }
        }

        return response()->json([
            'status' => 'success',
            'data' =>  $all
        ]);
    }

    protected function Coming(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();


        return response()->json(['status' => 'success', 'data' =>  $Reservation]);
    }

    protected function AppointmentsAccepted(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }
    protected function PatientArrive(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }
}
