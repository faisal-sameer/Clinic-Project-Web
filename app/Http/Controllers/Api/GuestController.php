<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\DevicesInfo;
use App\Mail\SendEMail;
use App\Models\ClinicDetails;
use App\Models\Discount;

class GuestController extends Controller
{
    protected function About()
    {
        $about = ClinicDetails::select('text_ar')->get();
        $d['about'] = $about;
        $Services = Service::where('Status', 1)->get();

        foreach ($Services as $Service) {
            $service[] = ['id' => $Service->id, 'name' => $Service->Name_ar,];
        }
        $d['service'] = $service;
        return response()->json(['status' => 'success', 'data' => $d]);
    }
    protected function Services()
    {

        $ServiceDermatology = Service::where(['Status' => 1, 'clinic_id' => 1])->get();
        $ServiceDental = Service::where(['Status' => 1, 'clinic_id' => 2])->get();

        $discount = Discount::select('title_ar')->get();
        $d['discount'] = $discount;
        foreach ($ServiceDermatology as $Service) {
            $dermatology[] = ['id' => $Service->id, 'name' => $Service->Name_ar,];
        }
        foreach ($ServiceDental as $Service) {
            $dental[] = ['id' => $Service->id, 'name' => $Service->Name_ar,];
        }
        $d['dental'] = $dental;
        $d['dermatology'] = $dermatology;
        return response()->json(['status' => 'success', 'data' => $d]);
    }
    protected function SaveDeviceInfo(Request $request)
    {
        /// return response()->json(['status' => 'success', 'data' => $request->all()]);
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
    protected function contact(Request $request)
    {
        $detailsforCustomer = [
            'title' => 'Af Title',
            'description' => 'AF Body ',
            'body' => now()
        ];
        $detailsforAdmin = [
            'title' => 'Boss Af Title',
            'description' => $request->name .  $request->text,
            'body' => now()
        ];
        $email = $request['email'];
        \Mail::to($email)->send(new SendEMail($detailsforCustomer));
        \Mail::to('ezooag@gmail.com')->send(new SendEMail($detailsforAdmin));


        return response()->json(['status' => 'success', 'data' => "Done"]);
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
            $ServiceRequest = Service::where('Name_ar', $request->Service)->first();
            $DiscountRequest = Discount::where('title_ar', $request->Service)->first();
            // return response()->json(['status' => 'success', 'data' =>  $DiscountRequest]);

            $reservations = new Reservation();
            $reservations->NID = $request->NID;
            $reservations->Name = $request->Name;
            $reservations->Date = $request->Day;
            $reservations->Phone = $request->Phone;
            $reservations->services_id = $ServiceRequest == null ? null :  $ServiceRequest->id;
            $reservations->discount_id = $DiscountRequest == null   ? null :  $DiscountRequest->id;
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
            ->select('id', 'Name', 'NID', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
        if ($myReservations->count() == 0) {
            $all = "Nulls";
        } else {
            $i = 0;
            foreach ($myReservations as  $myReservation) {
                $all[$i] = [
                    'id' => $myReservation->id, 'Name' => $myReservation->Name, 'NID' => $myReservation->NID,
                    'Day' => $myReservation->Date,
                    'Phone' => $myReservation->Phone,
                    'service' => $myReservation->services_id == null ? $myReservation->discount->title_ar : $myReservation->service->Name_ar,
                    'Status' => $myReservation->Status
                ];
                $i++;
            }
        }

        return response()->json(['status' => 'success', 'data' =>  $all]);
    }
}
