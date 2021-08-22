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


    protected function Appointments(Request $request)
    {
        // $profile = User::where('user_id', auth('api')->user()->id)->first();

        switch ($request->type) {
            case 0:
                $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->get();

                break;
            case 1:
                $Reservations = Reservation::where('Date', 'like',  substr(date('c'), 0, -14) . '%')->get();

                break;

            default:
                $Reservations = Reservation::where('Date', 'like',  substr(date('c'), 0, -14) . '%')->get();

                break;
        }
        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            foreach ($Reservations as  $Reservation) {
                $all[] = [
                    'id' => $Reservation->id, 'NID' => $Reservation->NID, 'Name' => $Reservation->Name,
                    'Day' =>  date("Y-m-d", strtotime($Reservation->Date)), 'Time' => date("h:i", strtotime($Reservation->Date)),
                    'Phone' => $Reservation->Phone, 'services' => $Reservation->service->Name,
                    'Status' => $Reservation->Status
                ];
            }
        }


        return response()->json(['status' => 'success', 'data' =>  $all]);
    }
}
