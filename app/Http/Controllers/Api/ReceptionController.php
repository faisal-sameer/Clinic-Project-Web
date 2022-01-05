<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Discount;
use Carbon\Carbon;
use App\Models\ClinicDetails;
use App\Http\Controllers\SendNoificationFCM;

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
                    'service' => $Reservation->services_id == null ? $Reservation->discount['title_ar'] : $Reservation->service->Name_ar,
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


        $Reservations = Reservation::where('Date', '<', date('Y-m-d'))->paginate(10);

        if ($Reservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($Reservations as  $Reservation) {
                $all[$i++] = [
                    'id' => (int)$Reservation->id, (string) 'NID' => $Reservation->NID, (string) 'Name' => $Reservation->Name,
                    'Day' => (string) $Reservation->Date,
                    'Phone' => (string) $Reservation->Phone, (string)
                    'service' => $Reservation->services_id == null ? $Reservation->discount['title_ar'] : $Reservation->service->Name_ar,
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
                    'service' => $Reservation->services_id == null ? $Reservation->discount['title_ar'] : $Reservation->service->Name_ar,
                    'Status' => (int)$Reservation->Status
                ];
            }
        }

        return response()->json([
            'status' => 'success',
            'data' =>  $all
        ]);
    }



    protected function AppointmentsAccepted(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2
        ]);
        $patient =   Reservation::where('id', $request->id)->first();
        //if ($patient->Token != null) {
        $test = new SendNoificationFCM();

        $test->sendGCM("تم تاكيد موعدك", $patient->Date, "c6w8_3gxRKmTBXFP1CpjHx:APA91bG18QakzEUfxmwpPe-wxy02G_H8Yuz8I4KUN6aLteXa_Dh1P0KjTz2d-SBld0fUL8ttKYYG24Gk4QQAQmdoVu-p4O4BHiUEtSPs0aD0R4CauxDasmGnl4TY5wjb3CRaNwP60vJB", "1", "w");
        //}
        return response()->json(['status' => 'success', 'data' => "Done"]);
    }
    protected function AppointmentsRejected(Request $request)
    {

        Reservation::where('id', $request->id)->update([
            'Status' => 3
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }
    protected function PatientArrive(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 4
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }
    protected function Completed(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }
    protected function DidNotCome(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 6
        ]);

        return response()->json(['status' => 'success', 'data' => 'Done!!']);
    }

    protected function CheckDate(Request $request)
    {
        $AllAppointment = Reservation::where('Date', $request->date)->count();
        $AllApprovedAppointment = Reservation::where(['Date' => $request->date,  'Status' => 2])->count();
        $sets =  ClinicDetails::where('type', 1)->select('text_en')->first();
        for ($i = 0; $i <= 10; $i++) {
            $dateNew = Reservation::where('Date',  Carbon::now()->addDays($i)->format('Y-m-d'))->get();
            if ($dateNew->count() == 0) {
                $NearDate =  Carbon::now()->addDays($i)->format('Y-m-d');
                break;
            } else if ($dateNew->count() < 1) {
                $NearDate =  Carbon::now()->addDays($i)->format('Y-m-d');
            } else {
                $NearDate =  Carbon::now()->addDays($i)->format('Y-m-d');
            }
        }
        $all['AllAppointment'] = $AllAppointment;
        $all['AllApprovedAppointment'] = $AllApprovedAppointment;
        $all['sets'] = $sets->text_en;
        $all['Date'] =  $request->date;
        $all['NearDate'] =  $NearDate;

        return response()->json(['status' => 'success', 'date' => $all]);
    }
    protected function ReceptionNewAppointment(Request $request)
    {

        $ServiceRequest = Service::where('Name_ar', $request->Service)->first();
        $DiscountRequest = Discount::where('title_ar', $request->Service)->first();

        $reservations = new Reservation();
        $reservations->NID = $request->NID;
        $reservations->Name = $request->Name;
        $reservations->Date = $request->Day;
        $reservations->Phone = $request->Phone;
        $reservations->services_id = $ServiceRequest == null ? null :  $ServiceRequest->id;
        $reservations->discount_id = $DiscountRequest == null   ? null :  $DiscountRequest->id;
        $reservations->Status = 7; // need patient to accept the app 
        $reservations->save();
        Reservation::where('id', $request->id)->update([
            'Status' => 5,
            'employee_id' => auth()->user()->id

        ]);
        return response()->json(['status' => 'success', 'data' =>  "Done"]);
    }
}
