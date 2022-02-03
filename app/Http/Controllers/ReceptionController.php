<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\ClinicDetails;
use App\Models\Discount;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SendNoificationFCM;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function dashboardClinicToday()
    {

        $Reservations = Reservation::where('Date', date('Y-m-d'))->get();
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();

        $AllAppointment = Reservation::where('Date', date('Y-m-d'))->count();
        $AllApprovedAppointment = Reservation::where(['Date' => date('Y-m-d'),   'Status' => 2])->count();
        $sets =  ClinicDetails::where('type', 2)->select('limit')->first();
        $all['AllAppointment'] = $AllAppointment;
        $all['AllApprovedAppointment'] = $AllApprovedAppointment;
        $all['sets'] = $sets->limit;


        $all['Reservations'] = $Reservations;
        $all['dermatology'] = $dermatology;
        $all['dental'] = $dental;
        $all['discount'] = $discount;
        return view('dashboardClinicToday')->with('all', $all);
    }

    protected function dashboardClinicPast()
    {
        $Reservations = Reservation::where('Date', '<',  date('Y-m-d'))->get();
        return view('dashboardClinicPast')->with('Reservations', $Reservations);
    }
    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
    protected function dashboardClinicFuture($date)
    {
        $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
        $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
        $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
        $AllAppointment = Reservation::where('Date', $date)->count();
        $AllApprovedAppointment = Reservation::where(['Date' => $date,   'Status' => 2])->count();
        $sets =  ClinicDetails::where('type', 2)->select('limit')->first();

        if ($this->validateDate($date) == false) {
            $all['Date'] = false;
        } else {
            $Reservations = Reservation::where('Date', $date)->get();
            $all['Reservations'] = $Reservations;
            $all['Date'] = true;
        }
        $all['AllAppointment'] = $AllAppointment;
        $all['AllApprovedAppointment'] = $AllApprovedAppointment;
        $all['sets'] = $sets->limit;
        $all['dermatology'] = $dermatology;
        $all['dental'] = $dental;
        $all['discount'] = $discount;
        return view('dashboardClinicAfter')->with('all', $all);
    }
    protected function getFreeDate(Request $request)
    {
        $AllAppointment = Reservation::where('Date', $request->AppointmentCheck)->count();
        $AllApprovedAppointment = Reservation::where(['Date' => $request->AppointmentCheck,  'Status' => 2])->count();
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
        $all['Date'] =  $request->AppointmentCheck;
        $all['NearDate'] =  $NearDate;

        return response()->json(['code' =>  0, 'date' => $all]);
    }

    protected function dashboardStatistic()
    {
        //$app = Reservation::groupBy('services_id', 'Date')->select('services_id', DB::raw('count(*) as total'), 'Date')->get();
        $app = Reservation::select(
            DB::raw('count(*) as total'),
            DB::raw("DATE_FORMAT(Date, '%Y-%m') as new_date")
        )->groupBy('new_date')->orderBy('new_date')->get();
        $app  =  Reservation::where('services_id', '!=', null)->groupBy('services_id')->select('services_id', DB::raw('count(*) as total'))->get();
        $services  =  Reservation::where('services_id', '!=', null)->groupBy('services_id')->select('services_id', DB::raw('count(*) as total'))->get();
        $discount  =  Reservation::where('discount_id', '!=', null)->groupBy('discount_id')->select('discount_id', DB::raw('count(*) as total'))->get();
        if ($app->count() == null) {
            $Months = "Nulls";
        } else {
            foreach ($app as   $item) {

                $time = \Carbon\Carbon::parse($item->new_date)->format('F');
                $Months[] = ['label' => $time, 'y' => $item->total];
            }
        }
        if ($services->count() == null) {
            $Service = "Nulls";
        } else {
            foreach ($services as $item) {
                $Service[] = ['label' => $item->service->Name_ar, 'y' => $item->total];
            }
        }
        if ($discount->count() == null) {
            $Discounts = "Nulls";
        } else {
            foreach ($discount as $item) {
                $Discounts[] = ['label' => $item->discount->title_ar, 'y' => $item->total];
            }
        }
        $all[] = ['Months' => $Months, 'Service' => $Service, 'Discount' => $Discounts];
        //return $Service;
        return view('dashboardStatistic')->with('all', $all);
    }
    protected function dashboardContent()
    {

        $Detail = ClinicDetails::get();
        $Service = Service::where('Status', 1)->select('id', 'Name_ar', 'Price', 'clinic_id', 'employee_id')->get();
        $Discount = Discount::where('Status', 1)->get();
        $Doctor = Doctor::where('Status', 1)->get();
        $clinic = clinic::get();

        $content = ['about' => $Detail, 'doctor' => $Doctor, 'discount' => $Discount, 'service' => $Service, 'clinics' => $clinic];
        $test = new SendNoificationFCM();

        $test->sendGCM('AF Head', 'FA Body', "eB_aZbe6QfOD39JCagD2Oj:APA91bGf_AHH3YYO3he2HkxhoHrGtUTyrNINP0Z8B7QolhLpkBnt_bR_DUjbG7DST_af-orN6lt9BvlVezQ0TiE6uZj54Z_RAOLlJMmxZm5OrZhXgiQ-S-xYFShOLt1m-VCTXWYkFLMs", "1", "w");

        return view('dashboardContent')->with('content', $content);
    }


    protected function Confirm(Request $request) //  تاكيد الحجز من قبل العيادة
    {


        Reservation::where('id', $request->id)->update([
            'Status' => 2,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();
        $test = new SendNoificationFCM();

        $test->sendGCM("تم تاكيد موعدك", $Reservation->Date, $Reservation->Token, "1", "w");

        Alert::success('تم تاكيد الحجز  ', $Reservation->Name . ' ' . $Reservation->Token);

        return back();
    }
    protected function Rejected(Request $request) // رفض الحجز من قبل العيادة 
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 3,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم رفض الحجز ', '');

        return back();
    }
    protected function Coming(Request $request) //  عمل وصول للمراجع
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 4,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم تاكيد الحجز  ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }
    protected function Complete(Request $request) //  انتهاء المراجع من العيادة 
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success(' انتهت الجلسة للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function DidCome(Request $request) // لم يحضر المريض 
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 6,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::info('تم تسجيل عدم حضور للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function NewAppointmentStaff(Request $request) // تسجيل موعد جديد للمراجع من قبل العيادة 
    {
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
            'Appointment' => 'required | date ',
            'Service' => 'required ',


        ], $messages);

        if ($validator->fails()) {
            Alert::error('خطأ ', $validator->messages()->all());

            return back();
        }

        $reservations = new Reservation();
        $reservations->NID = $request->NID;
        $reservations->Name = $request->Name;
        $reservations->Date = $request->Appointment;
        $reservations->Phone = $request->Phone;
        $reservations->services_id =  substr($request->Service, 0, 1) == 'S' ?  substr($request->Service, 1) : null;
        $reservations->discount_id = substr($request->Service, 0, 1) == 'D' ?  substr($request->Service, 1) : null;
        $reservations->Status = 2;
        $reservations->save();

        Alert::success(' تم حجز موعد جديد للمراجع', $reservations->Name_ar . ' ' . $reservations->NID);
        return back();
    }

    protected function AfterNewAppointmentStaff(Request $request) // تسجيل موعد جديد للمراجع من قبل العيادة 
    {
        $reservations = new Reservation();
        $reservations->NID = $request->NID;
        $reservations->Name = $request->Name;
        $reservations->Date = $request->Appointment;
        $reservations->Phone = $request->Phone;
        $reservations->services_id =  substr($request->Service, 0, 1) == 'S' ?  substr($request->Service, 1) : null;
        $reservations->discount_id = substr($request->Service, 0, 1) == 'D' ?  substr($request->Service, 1) : null;
        $reservations->Status = 7; // need patient to accept the app 
        $reservations->save();
        $Reservation =  Reservation::where('id', $reservations->id)->first();
        Reservation::where('id', $request->id)->update([
            'Status' => 5,
            'employee_id' => auth()->user()->id

        ]);
        Alert::success(' تم حجز موعد جديد للمراجع', $Reservation->Name_ar . ' ' . $Reservation->NID);

        return back();
    }
    /*  
        Maybe We Don't need it right now  bro !! 
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
    */
}




// today Appointment  More Action 
/*


                                        @elseif( $Reservation->Status == 3)
                                            <div id="dailogs">
                                                <form method="POST" action="{{ route('Leave') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-secondary">غادر </button>
                                                </form>
                                            </div>
                                        @elseif($Reservation->Status == 4 )

                                            <div id="dailogs">
                                                <form method="POST" action="{{ route('NewApp') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-success">موعد جديد</button>
                                                </form>
                                            </div>


                                            <div id="dailogs">
                                                <form method="POST" action="{{ route('WithOutApp') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" class="btn btn-secondary">بدون موعد </button>
                                                </form>
                                            </div>
                                            <br><br><br><br>


*/