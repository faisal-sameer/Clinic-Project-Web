<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
{
    protected function reservation()
    {
        Alert::info('لحجز و عرض مواعيدك ', 'رجاء ادخل رقم الهوية ');

        return view('reservation');
    }
    protected function ShowDashboardUser()
    {

        return back();
    }
    protected function dashboardUser(Request $request)
    {


        $isNumber = is_numeric($request->NID);
        if ($isNumber == null) {
            Alert::warning('لا توجد بيانات ', 'قم بادخال رقم الهوية ');

            return view('reservation');
        }
        $validator = strlen($request->NID);
        if ($validator < 10) {
            Alert::warning('الرقم اقل من الحد المسموح', 'تاكد من كتابة رقم الهوية بشكل صحيح ');

            return view('reservation');
        } else {


            $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')->select('id', 'Name', 'Date', 'Phone', 'services_id', 'Status')->get();


            $services  = Service::select('id', 'id', 'Name')->get();

            $counts = Reservation::where('NID', $request->NID)->count();

            if ($reservations->count() == 0) {
                $all = ['NID' => $request->NID];
                $all['current'] = 0;
                $all['reservations'] = 0;
                $all['data'] = 0;
                $all['page'] = null;
                $all['services'] = $services;
            } else {
                $all['NID'] = $request->NID;
                $all['reservations'] = $reservations;
                $all['data'] = 1;
                $all['current'] = $request->page;
                $all['page'] = ceil($counts / 6);
                $all['services'] = $services;
            }
            Alert::success('اهلا بك ', '' . $request->NID);

            return view('dashboardUser')->with('all', $all);
        }
    }


    protected function regester(Request $request)
    {

        if ($request->NID == null) {
            return back();
        }
        $services  = Service::select('id', 'id', 'Name')->get();

        $all['NID'] = $request->NID;
        $all['services'] = $services;
        // return $all;
        return view('regester')->with('all', $all);
    }

    protected function AppointmentNew(Request $request)
    {


        if ($request->NID == null) {
            Alert::info('لا يمكن حجز موعد بدون رقم هوية  ');

            return back();
        } else if ($request->Name == null) {
            Alert::info('لا بد من ادخل اسم الثلاثة ');

            return back();
        } else if ($request->Phone == null) {
            Alert::info('لابد من ادخال رقم الجوال ', '');

            return back();
        } else if ($request->Appointment == null || $request->Appointment  <  substr(date('c'), 0, -9)) {
            Alert::info('يجب عليك تحديد موعد الحجز ', 'تاكد من اختيار تاريخ فعال');

            return back();
        } else if ($request->Service == null) {
            Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', '');

            return back();
        } else {

            $reservations = new Reservation();
            $reservations->NID = $request->NID;
            $reservations->Name = $request->Name;
            $reservations->Date = $request->Appointment;
            $reservations->Phone = $request->Phone;
            $reservations->services_id = $request->Service;
            $reservations->Status = 1;
            $reservations->save();
            $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')->select('id', 'Name', 'Date', 'Phone', 'services_id', 'Status')->get();
            $counts = Reservation::where('NID', $request->NID)->count();

            if ($reservations->count() == 0) {
                $all = ['NID' => $request->NID];
                $all['reservations'] = 0;
                $all['data'] = 0;
                $all['page'] = null;
                $all['current'] = 0;
            } else {
                $all['NID'] = $request->NID;
                $all['reservations'] = $reservations;
                $all['data'] = 1;
                $all['current'] = $request->page;

                $all['page'] = round($counts / 6);
            }
            Alert::success('تم حجز موعد جديد ',);

            return view('dashboardUser')->with('all', $all);
        }

        return $request->all();
    }
    protected function ChangeApp(Request $request)
    {
        //   return  $request->Appointment . 'sdsdsdsdsds' .  substr(date('c'), 0, -9);
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')->select('id', 'Name', 'Date', 'Phone', 'services_id', 'Status')->get();
        $services  = Service::select('id', 'id', 'Name')->get();

        $counts = Reservation::where('NID', $request->NID)->count();
        $all['NID'] = $request->NID;
        $all['reservations'] = $reservations;
        $all['data'] = 1;
        $all['current'] = $request->page;
        $all['page'] = ceil($counts / 6);
        $all['services'] = $services;
        if ($request->NID == null) {
            Alert::info('لا يمكن حجز موعد بدون رقم هوية  ');


            return view('dashboardUser')->with('all', $all);
        } else 
        if ($request->Name == null) {
            Alert::info('لا بد من ادخل اسم الثلاثة ');


            return view('dashboardUser')->with('all', $all);
        } else if ($request->Phone == null) {
            Alert::info('لابد من ادخال رقم الجوال ', '');


            return view('dashboardUser')->with('all', $all);
        } else if ($request->Appointment == null || $request->Appointment <  substr(date('c'), 0, -9)) {
            Alert::info('يجب عليك تحديد موعد الحجز ', 'تاكد من اختيار تاريخ فعال');


            return view('dashboardUser')->with('all', $all);
        } else if ($request->Service == null) {
            Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', '');


            return view('dashboardUser')->with('all', $all);
        } else {
            Reservation::where('id', $request->id)->update([
                'Name' => $request->Name,
                'Date' => $request->Appointment,
                'services_id' => $request->Service,
                'Phone' => $request->Phone
            ]);
            $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')->select('id', 'Name', 'Date', 'Phone', 'services_id', 'Status')->get();
            $services  = Service::select('id', 'id', 'Name')->get();

            $counts = Reservation::where('NID', $request->NID)->count();
            $all['NID'] = $request->NID;
            $all['reservations'] = $reservations;
            $all['data'] = 1;
            $all['current'] = $request->page;
            $all['page'] = ceil($counts / 6);
            $all['services'] = $services;
            Alert::success('تم تعديل الموعد  بنجاح  ', '');

            return view('dashboardUser')->with('all', $all);
        }
    }
}
