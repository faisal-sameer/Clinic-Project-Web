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


    protected function Appointments()
    {
        $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->paginate(2);
        return response()->json([
            'status' => 'success',
            [
                'Content-Type' => 'application/json;charset=UTF-32', 'Charset' => 'utf-32'
            ],
            'data' =>  $Reservations, JSON_UNESCAPED_UNICODE

        ]);
        // $profile = User::where('user_id', auth('api')->user()->id)->first();
        /*
        switch ($request->type) {
            case 0:
                $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->get();

                break;
            case 1:
                $Reservations = Reservation::where('Date', 'like',  substr(date('c'), 0, -14) . '%')->get();

                break;
            case 2:
                $Reservations = Reservation::where('Date', '>',  substr(date('c'), 0, -14) . '%')->get();

                break;

            default:
                $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->get();

                break;
        }
        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($Reservations as  $Reservation) {
                $all[$i++] = [
                    'id' => (int)$Reservation->id, (string) 'NID' => $Reservation->NID, (string) 'Name' => $Reservation->Name,
                    'Day' => (string) date("Y-m-d", strtotime($Reservation->Date)), (string)'Time' => date("h:i", strtotime($Reservation->Date)),
                    'Phone' => (string) $Reservation->Phone, (string) 'services' => $Reservation->service->Name,
                    'Status' => (int)$Reservation->Status
                ];
            }
        }
        // json_encode($all, JSON_UNESCAPED_UNICODE);


        return response()->json([
            'status' => 'success',
            [
                'Content-Type' => 'application/json;charset=UTF-32', 'Charset' => 'utf-32'
            ],
            'data' =>  $all, JSON_UNESCAPED_UNICODE

        ]);*/
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
