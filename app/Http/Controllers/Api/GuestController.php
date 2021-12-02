<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\DevicesInfo;

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
    protected function SaveDeviceInfo(Request $request)
    {
        //// return response()->json(['status' => 'success', 'data' => $request->all()]);
        if ($request->OurID == null) {
            $info = new DevicesInfo();
            $info->ID_device_single = $request->single;
            $info->Boot_Loader = $request->bootloader;
            $info->Host = $request->Host;
            $info->Model = $request->Model;
            $info->ID_device = $request->ID;
            $info->Token = $request->Token;
            $info->last_active = now();
            $info->Status = 1;
            $info->save();
            return response()->json(['status' => 'success', 'data' => $info->id]);
        } else {
            return response()->json(['status' => 'success', 'data' => "Done"]);
        }


        return response()->json(['status' => 'success', 'data' => "Done !!"]);
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
    protected function UpdatingAppointment(Request $request)
    {
        if ($request->NID == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ رقم الهوية او الاقامة"]);
        } else if ($request->Name == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ اسم المراجع "]);
        } else if ($request->Phone == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ رقم الجوال  "]);
        } else if ($request->Day == null /* || $request->Appointment  <  substr(date('c'), 0, -9)*/) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم ملئ موعد الحجز "]);
        } else if ($request->Service == null) {

            return response()->json(['status' => 'error', 'data' =>  "خطاء لم يتم اختيار نوع الخدمة  "]);
        } else {
            $ServiceRequest = Service::where('Name', $request->Service)->first();

            $reservations =  Reservation::where('id', $request->id)->update([
                'name' => $request->Name,
                'Date' =>  $request->Day . "T" . date("H:i", strtotime($request->Time)),
                'Phone' =>  $request->Phone,
                'services_id' => $ServiceRequest->id,
                'Status' => 1
            ]);
        }
        return response()->json(['status' => 'success', 'data' =>  $reservations]);
    }
    protected function  dashboardUser(Request $request)
    {
        $myReservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'NID', 'Date', 'Phone', 'services_id', 'Status')->get();
        if ($myReservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($myReservations as  $myReservation) {
                $all[$i] = [
                    'id' => $myReservation->id, 'Name' => $myReservation->Name, 'NID' => $myReservation->NID,
                    'Day' =>  date("Y-m-d", strtotime($myReservation->Date)), 'Time' => date("h:i", strtotime($myReservation->Date)), 'Phone' => $myReservation->Phone,
                    'service' => $myReservation->service->Name,
                    'Status' => $myReservation->Status
                ];
                $i++;
            }
        }

        return response()->json(['status' => 'success', 'data' =>  $all]);
    }
}
