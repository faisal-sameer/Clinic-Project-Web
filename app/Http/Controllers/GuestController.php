<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\Discount;
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
        if (app()->getLocale() == 'ar') {
            Alert::info('لحجز و عرض مواعيدك ', 'رجاء ادخل رقم الهوية ');
        } else {
            Alert::info('For Show or Reservation appointment ', 'Please  Enter your National ID ');
        }

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
            app()->getLocale() == 'ar' ? Alert::warning('لا توجد بيانات ', 'قم بادخال رقم الهوية ') :
                Alert::warning('Nothing Entry ', 'Please  Enter your National ID');

            return view('reservation');
        }
        $validator = strlen($request->NID);
        if ($validator < 10) {
            app()->getLocale() == 'ar' ?  Alert::warning('الرقم اقل من الحد المسموح', 'تاكد من كتابة رقم الهوية بشكل صحيح ') :
                Alert::warning('Your Entry less then 10', 'Please  Enter your National ID 10 Numbers');
            return view('reservation');
        } else {


            $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
                ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
            Reservation::where(['NID' => $request->NID, 'Status' => 1])->where('Date', '<', date('Y-m-d'))->update([
                'Status' => 10
            ]);
            $needApproved =   Reservation::where(['NID' => $request->NID, 'Status' => 7])->first();
            $services  = Service::select('id', 'Name_ar')->get();
            $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
            $all = ['NID' => $request->NID];
            $all['services'] = $services;
            $all['discount'] = $discount;
            $all['reservations'] =  $reservations->count() == 0 ? 0 :  $reservations;
            $all['data'] =  $reservations->count() == 0 ? 0 :  1;
            $all['Need'] = $needApproved == [] ? 0 : 1;
            $all['needApproved'] =   $needApproved == [] ? 0 : $needApproved;
            $DateService =  $needApproved == [] ? 0 : $needApproved->Date;
            $NameService =  $needApproved == [] ? 0 : $needApproved->service->Name_ar;

            if ($needApproved == []) {
                app()->getLocale() == 'ar' ?
                    Alert::success('اهلا بك ', '' . $request->NID) :
                    Alert::success('Welcome  ', '' . $request->NID);
            } else {
                app()->getLocale() == 'ar' ?
                    Alert::html(
                        '<i>تم حجز موعد جديد لك  </i><br> <p>الرجاء الموافقة عليه او رفضه في حالة لم يناسبك الموعد</p>',
                        "
                    <p> الموعد : $DateService</p>
                    <p>الخدمة :  $NameService </p>
                    <div class='form-inline' style='margin-left: 35%' > 

                    
                    <button type='submit'
                    class='btn btn-danger'>  <a   style='color: white'href='/RejectedApp-$needApproved->id'>رفض</a></button>
                    <br>
                     <button type='submit' style='margin:10px'
                    class='btn btn-success'>  <a  style='color: white' href='/ApprovedApp-$needApproved->id'>تاكيد</a> </button>
                    
                   </div> ",
                        'info'
                    )->showConfirmButton(false, "#ffff")->showCloseButton()
                    ->autoClose(90000)->footer('<a href>Why do I have this issue?</a>') : // else
                    // Eng
                    Alert::html(
                        '<i>A new appointment has been booked for you </i><br> <p>Please accept or reject it if the appointment does not suit you</p>',
                        "
                    <p> Appoitement  : $DateService</p>
                    <p>Service  :  $NameService </p>
                    <div class='form-inline' style='margin-left: 30%' > 

                    
                    <button type='submit'
                    class='btn btn-danger'>  <a   style='color: white'href='/RejectedApp-$needApproved->id'>Reject</a></button>
                    <br>
                     <button type='submit' style='margin:10px'
                    class='btn btn-success'>  <a  style='color: white' href='/ApprovedApp-$needApproved->id'>Approved</a> </button>
                    
                   </div> ",
                        'info'
                    )->showConfirmButton(false, "#ffff")->showCloseButton()
                    ->autoClose(90000)->footer('<a href>Why do I have this issue?</a>');
            }
            //  Alert::success('اهلا بك ' . $request->NID, 'تم حجز موعد جديد لك الرجاء الموافقة عليه او رفضه في حالة لم يناسبك الموعد ')


            return view('dashboardUser')->with('all', $all);
        }
    }

    protected function PatientApprovedModel(Request $request) // قبول موعد العيادة الجديد من قبل المراجع  
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 8
        ]);
        $info =  Reservation::where('id', $request->id)->first();

        $reservations = Reservation::where('NID', $info->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
        $needApproved =   Reservation::where(['NID' => $info->NID, 'Status' => 6])->first();
        $services  = Service::select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        $all = ['NID' => $info->NID];
        $all['services'] = $services;
        $all['discount'] = $discount;
        $all['reservations'] =  $reservations->count() == 0 ? 0 :  $reservations;
        $all['data'] =  $reservations->count() == 0 ? 0 :  1;
        $all['Need'] = $needApproved == [] ? 0 : 1;
        $all['needApproved'] =   $needApproved == [] ? 0 : $needApproved;
        return  redirect()->route('NewReservation', ['NID' => $info->NID]);
    }

    protected function PatientApproved($id) // قبول موعد العيادة الجديد من قبل المراجع  
    {
        Reservation::where('id', $id)->update([
            'Status' => 8
        ]);
        $info =  Reservation::where('id', $id)->first();

        $reservations = Reservation::where('NID', $info->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
        $needApproved =   Reservation::where(['NID' => $info->NID, 'Status' => 6])->first();
        $services  = Service::select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        $all = ['NID' => $info->NID];
        $all['services'] = $services;
        $all['discount'] = $discount;
        $all['reservations'] =  $reservations->count() == 0 ? 0 :  $reservations;
        $all['data'] =  $reservations->count() == 0 ? 0 :  1;
        $all['Need'] = $needApproved == [] ? 0 : 1;
        $all['needApproved'] =   $needApproved == [] ? 0 : $needApproved;
        return  redirect()->route('NewReservation', ['NID' => $info->NID]);
    }

    protected function PatientRejected($id) // رفض الحجز العيادة من قبل المراجع sweetAlert
    {
        Reservation::where('id', $id)->update([
            'Status' => 9
        ]);
        $info =  Reservation::where('id', $id)->first();

        return  redirect()->route('NewReservation', ['NID' => $info->NID]);
    }
    protected function PatientRejectedModel(Request $request) // رفض الحجز العيادة من قبل المراجع Model 
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 9
        ]);
        $info =  Reservation::where('id', $request->id)->first();

        return  redirect()->route('NewReservation', ['NID' => $info->NID]);
    }

    protected function regester(Request $request)
    {

        if ($request->NID == null) {
            return back();
        }
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Phone')->first();
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        Discount::where('Status', 1)->where('to', '<', date('Y-m-d'))->update([
            'Status' => 2
        ]);
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        if ($reservations != []) {
            $all['user_info'] = $reservations;
        } else {
            $all['user_info'] = null;
        }
        $all['NID'] = $request->NID;
        $all['dermatology'] = $dermatology;
        $all['dental'] = $dental;
        $all['discount'] = $discount;
        // return $all;
        return view('regester')->with('all', $all);
    }

    protected function AppointmentNew(Request $request)
    {
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        $user_info = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Phone')->first();
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();

        $services  = Service::select('id', 'Name_ar')->get();

        $counts = Reservation::where('NID', $request->NID)->count();
        $all['user_info'] = $user_info == null ? null : $user_info;

        $all['NID'] = $request->NID;
        $all['reservations'] = $reservations;
        $all['data'] = 1;
        $all['current'] = $request->page;
        $all['page'] = ceil($counts / 6);
        $all['services'] = $services;
        $all['discount'] = $discount;
        $all['dermatology'] = $dermatology;
        $all['dental'] = $dental;

        // Check if patient have app in same clinic or not 
        $oldDental = Reservation::where(['NID' => $request->NID, 'Status' => 1])->whereHas('service', function ($q) {
            $q->where('clinic_id', 2);
        })->count();
        $oldDermatology = Reservation::where(['NID' => $request->NID, 'Status' => 1])->whereHas('service', function ($q) {
            $q->where('clinic_id', 1);
        })->count();
        // end Check 
        // check of the service that selected by patient 
        $Service = $request->type  == 2 ? $request->ServiceDental : $request->ServiceDermatology;
        $SelectedService = Service::where('id',  substr($Service, 1))->first();
        if (substr($Service, 0, 1) == 'S') {
            if ($oldDental > 0 &&  $oldDermatology > 0) { // Case 4  patient have app in all clinic
                Alert::info('لديك حجز مسبق في نفس العيادة ', 'All Full ');
                return view('dashboardUser')->with('all', $all);
            } else if ($oldDental == 0 && $oldDermatology > 0 &&  $request->type == 1) { //  Case 3 patient have app in جلدية  but can get new app for اسنان 
                if ($SelectedService->clinic_id == 1) {
                    Alert::info('لديك حجز مسبق في نفس العيادة ', 'عيادة الجلدية');
                    return view('dashboardUser')->with('all', $all);
                }
            } else if ($oldDental > 0 && $oldDermatology == 0 && $request->type == 2) {
                if ($SelectedService->clinic_id == 2) {
                    Alert::info('لديك حجز مسبق في نفس العيادة ', 'عيادة الاسنان');
                    return view('dashboardUser')->with('all', $all);
                }
            }
        }
        if (substr($Service, 0, 1) == 'D') {

            $oldDiscount = Reservation::where(['NID' => $request->NID, 'discount_id' => substr($Service, 1),  'Status' => 1])->count();

            if ($oldDiscount > 0) {
                Alert::info('لديك حجز مسبوق لهذا العرض  ', 'بعد انتهاء الموعد يمكنك حجزه من جديد');
                return view('dashboardUser')->with('all', $all);
            }
        }


        // Messages for valid Input 
        $messages = [
            'Appointment.required' => 'لابد من وجود اسم ',   // Required
            'Appointment.date' =>  'ادخل تاريخ  ',   // Required
            'Appointment.after' => "لا يمكنك حجز الموعد بتاريخ اليوم  ",   // Required
            //  'Service.required' => 'يجب عليك اختيار احد الخدمات المتوفرة UP',   // Required

        ];
        $validator = Validator::make($request->all(), [
            'NID' => 'required | min:10  | max:13',
            'Name' => 'required | min:3  | max:100',
            'Phone' => 'required | min:10  | max:13',
            'Appointment' => 'required | date |after: ',
            // 'Service' => 'required ',


        ], $messages);

        if ($validator->fails()) {
            Alert::error('خطأ ', $validator->messages()->all());

            return view('regester')->with('all', $all);
        }


        if (substr($Service, 0, 1) == 'D') {

            $limit =  Discount::where('id', substr($Service, 1))->first();
            if ($limit->from > $request->Appointment || $limit->to < $request->Appointment) {
                Alert::info('الخدمة غير متوفرة بالتاريخ المدخل ', 'Date');
                return view('regester')->with('all', $all);
            }
        }
        if ((substr($Service, 0, 1) != 'D' && substr($Service, 0, 1) != 'S')) {

            Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', 'Down');
            return view('regester')->with('all', $all);
        } else
         if (Service::find(substr($Service, 1)) == null && (substr($Service, 0, 1) == 'S')) {

            Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', 'rrrr');
            return view('regester')->with('all', $all);
        }


        $reservations = new Reservation();
        $reservations->NID = $request->NID;
        $reservations->Name = $request->Name;
        $reservations->Date = $request->Appointment;
        $reservations->Phone = $request->Phone;
        $reservations->services_id =  substr($Service, 0, 1) == 'S' ?  substr($Service, 1) : null;
        $reservations->discount_id = substr($Service, 0, 1) == 'D' ?  substr($Service, 1) : null;
        $reservations->Status = 1;
        $reservations->save();
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
        $counts = Reservation::where('NID', $request->NID)->count();
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        $services  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();


        if ($reservations->count() == 0) {
            $all = ['NID' => $request->NID];
            $all['reservations'] = 0;
            $all['data'] = 0;
            $all['page'] = null;
            $all['current'] = 0;
            $all['dermatology'] = $dermatology;
            $all['dental'] = $dental;
            $all['discount'] = $discount;
            $all['services'] = $services;
        } else {
            $all['NID'] = $request->NID;
            $all['reservations'] = $reservations;
            $all['data'] = 1;
            $all['current'] = $request->page;
            $all['dermatology'] = $dermatology;
            $all['dental'] = $dental;
            $all['services'] = $services;

            $all['discount'] = $discount;
            $all['page'] = round($counts / 6);
            // }
            Alert::success('تم حجز موعد جديد ',);

            return view('dashboardUser')->with('all', $all);
        }
    }
    protected function ChangeApp(Request $request)
    {
        $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
            ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();

        $counts = Reservation::where('NID', $request->NID)->count();
        $all['NID'] = $request->NID;
        $all['reservations'] = $reservations;
        $all['data'] = 1;
        $all['current'] = $request->page;
        $all['page'] = ceil($counts / 6);
        $all['dermatology'] = $dermatology;
        $all['dental'] = $dental;
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
        } else if ($request->Service == null || (substr($request->Service, 0, 1) != 'D' && substr($request->Service, 0, 1) != 'S')) {
            Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', '');


            return view('dashboardUser')->with('all', $all);
        } else {
            Reservation::where('id', $request->id)->update([
                'Name' => $request->Name,
                'Date' => $request->Appointment,
                'services_id' =>  substr($request->Service, 0, 1) == 'S' ?  substr($request->Service, 1) : null,
                'discount_id' =>  substr($request->Service, 0, 1) == 'D' ?  substr($request->Service, 1) : null,
                'Phone' => $request->Phone
            ]);
            $reservations = Reservation::where('NID', $request->NID)->orderBy('created_at', 'DESC')
                ->select('id', 'Name', 'Date', 'Phone', 'services_id', 'discount_id', 'Status')->get();
            $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
            $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
            $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();

            $counts = Reservation::where('NID', $request->NID)->count();
            $all['NID'] = $request->NID;
            $all['reservations'] = $reservations;
            $all['data'] = 1;
            $all['current'] = $request->page;
            $all['page'] = ceil($counts / 6);
            $all['dermatology'] = $dermatology;
            $all['dental'] = $dental;
            $all['discount'] = $discount;
            Alert::success('تم تعديل الموعد  بنجاح  ', '');

            return view('dashboardUser')->with('all', $all);
        }
    }
}


  //return substr($request->Service, 1);

        /*  if ($request->NID == null) {

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
            } else if ($request->Service == null || (substr($request->Service, 0, 1) != 'D' && substr($request->Service, 0, 1) != 'S')) {
                Alert::info('يجب عليك اختيار احد الخدمات المتوفرة', '');

                return back();
            } else {*/
