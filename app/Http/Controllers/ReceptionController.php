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
        $sets =  ClinicDetails::where('type', 1)->select('text_en')->first();
        $all['AllAppointment'] = $AllAppointment;
        $all['AllApprovedAppointment'] = $AllApprovedAppointment;
        $all['sets'] = $sets->text_en;


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
        if ($this->validateDate($date) == false) {
            $all['Date'] = false;
        } else {
            $Reservations = Reservation::where('Date', $date)->get();
            $dermatology  = Service::where(['Status' => 1, 'clinic_id' => 1])->select('id', 'Name_ar')->get();
            $dental  =  Service::where(['Status' => 1, 'clinic_id' => 2])->select('id', 'Name_ar')->get();
            $discount  = Discount::where('Status', 1)->select('id', 'title_ar')->get();
            $AllAppointment = Reservation::where('Date', $date)->count();
            $AllApprovedAppointment = Reservation::where(['Date' => $date,   'Status' => 2])->count();
            $sets =  ClinicDetails::where('type', 1)->select('text_en')->first();
            $all['AllAppointment'] = $AllAppointment;
            $all['AllApprovedAppointment'] = $AllApprovedAppointment;
            $all['sets'] = $sets->text_en;
            $all['Date'] = true;
            $all['Reservations'] = $Reservations;
            $all['dermatology'] = $dermatology;
            $all['dental'] = $dental;
            $all['discount'] = $discount;
        }
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
    protected function dashboardContentDelete(Request $request)
    {
        switch ($request->type) {
            case 1:
                Discount::where('id', $request->id)->update([
                    'Status' => 2
                ]);
                break;
            case 2:
                Service::where('id', $request->id)->update([
                    'Status' => 2
                ]);
                break;
            case 3:
                Doctor::where('id', $request->id)->update([
                    'Status' => 2
                ]);
                break;
            default:
                break;
        }

        return back();
    }
    protected function dashboardContentNew(Request $request)
    {
        //return $request->all();
        $messages = [
            // Discount waring text
            'DisTitle.required' => 'لابد من وجود اسم ',   // Required
            'DisText.required' => 'لابد من وجود وصف  ',   // Required
            'DisPrice.required' => 'لابد من وجود سعر  ',   // Required


            'DisTitle.string' => 'احرف',   // string
            'DisText.string' => 'لابد من وجود وصف  ',   // string
            'DisPrice.string' => 'لابد من وجود سعر  ',   // string

            'DisTitle.min' => 'اقل من الحد ',   // min
            'DisText.min' => 'اقل من الحد ',   // min
            'DisPrice.min' => 'اقل من الحد ',   // min


            'DisTitle.max' => 'اكثر  من الحد ',   // max
            'DisText.max' => 'اكثر  من الحد ',   // max
            'DisPrice.max' => 'اكثر  من الحد ',   // max

            // Service  waring text

            'name.required' => 'لابد من وجود اسم ',   // Required
            'price.required' => 'لابد من وجود سعر  ',   // Required


            'name.string' => 'احرف',   // string
            'price.string' => 'احرف ',   // string

            'name.min' => 'اقل من الحد ',   // min
            'price.min' => 'اقل من الحد ',   // min


            'name.max' => 'اكثر  من الحد ',   // max
            'price.max' => 'اكثر  من الحد ',   // max

            // Doctor waring text


            'DoctorName.required' => 'لابد من وجود اسم ',   // Required
            'email.required' => 'لابد من وجود سعر  ',   // Required
            'DoctorImg.required' => 'لابد من وجود اسم ',   // Required
            'DoctorPassword.required' => 'لابد من وجود سعر  ',   // Required
            'DoctorInfo.required' => 'لابد من وجود اسم ',   // Required



            'DoctorName.string' => 'احرف',   // string
            'DoctorInfo.string' => 'احرف',   // string

            'DoctorName.min' => 'الاسم أقل الحد ',   // min
            'DoctorInfo.min' => 'معلومات الطبيب أقل من الحد',   // min


            'DoctorName.max' => 'الاسم أكثر من الحد',   // max
            'email.max' => 'اكثر  من الحد ',   // max
            'DoctorInfo.max' => 'معلومات الطبيب أكثر من الحد ',   // max

            'email.unique'     => 'الايميل مستخدم ',   // Unique Email 
            'email.email'     => 'الرجاء إدخال الايميل بالشكل الصحيح ',   //  Email 



        ];
        $messagesEn = [  // Discount waring text English
            'DisTitle.required' => ' There must be a name  ',   // Required
            'DisText.required' => 'There must be a description ',   // Required
            'DisPrice.required' => 'There must be a price  ',   // Required


            'DisTitle.string' => 'letters',   // string
            'DisText.string' => 'There must be a price ',   // string
            'DisPrice.string' => 'There must be a price  ',   // string

            'DisTitle.min' => 'less than the limit ',   // min
            'DisText.min' => 'less than the limit ',   // min
            'DisPrice.min' => 'less than the limit ',   // min


            'DisTitle.max' => 'more than the limit ',   // max
            'DisText.max' => 'more than the limit ',   // max
            'DisPrice.max' => 'more than the limit ',   // max

            // Service  waring text English

            'name.required' => 'There must be a name  ',   // Required
            'price.required' => 'There must be a price  ',   // Required


            'name.string' => 'letters',   // string
            'price.string' => 'letters ',   // string

            'name.min' => 'less than the limit  ',   // min
            'price.min' => 'less than the limit  ',   // min


            'name.max' => 'more than the limit',   // max
            'price.max' => 'more than the limit',   // max

            // Doctor waring text English


            'DoctorName.required' => 'There must be a name ',   // Required
            'email.required' => 'There must be a email ',   // Required
            'DoctorImg.required' => 'There must be a image ',   // Required
            'DoctorPassword.required' => 'There must be a password  ',   // Required
            'DoctorInfo.required' => 'There must be a description ',   // Required



            'DoctorName.string' => 'letters',   // string
            'DoctorInfo.string' => 'letters',   // string

            'DoctorName.min' => 'name less limit ',   // min
            'DoctorInfo.min' => 'Doctor information is less than the limit',   // min


            'DoctorName.max' => 'more than the limit',   // max
            'email.max' => 'more than the limit ',   // max
            'DoctorInfo.max' => 'more than the limit',   // max

            'email.unique'     => 'Email is used',   // Unique Email 
            'email.email'     => 'Please enter the email correctly ',   //  Email 


        ];
        $code = Str::random(4);

        switch ($request->type) {
            case 1:
                $validator = Validator::make($request->all(), [
                    // discount inputs
                    'DisTitle' => 'required|string | min:3  | max:100',
                    'DisText' => 'required|string | min:3  | max:250',
                    'DisPrice' => 'required|string | min:3  | max:25',


                ], app()->getLocale() == 'ar' ? $messages : $messagesEn);

                if ($validator->fails()) {
                    if (app()->getLocale() == 'ar') {
                        Alert::error('خطأ ', $validator->messages()->all());
                    } else {
                        Alert::error('Error ', $validator->messages()->all());
                    }
                    return back();
                }
                $oldDiscount = Discount::latest()->first();;
                $Discount = new Discount();
                $Discount->title_ar  = $request->DisTitle;
                $Discount->title_en  = " ";
                $Discount->employee_id = auth()->user()->id;
                $Discount->clinic_id = $request->clinic;
                $Discount->text_ar = $request->DisText == null ?  null : $request->DisText;
                $Discount->text_en = " ";

                $Discount->Price = $request->DisPrice == null ? null : $request->DisPrice;
                $Discount->order = $oldDiscount == null ? 1 : $oldDiscount->order  + 1;
                $Discount->Status = 1;
                $Discount->save();

                $test = new SendNoificationFCM();

                // $test->sendGCM($request->DisTitle, $request->DisText, "dSJGhg3qRISai8KZ9MJCma:APA91bGOgRaYZ_qNE9o9BPg3u9VftV2uo3RcCc9ONW5T5vx7mnk6AMpmKRZsUDr6-cesPrgyfXcfCpJOAsCK6jyM8ORXPvOYExqHylbrQyJV4f7XphQu-7Z8Qwy7UVQOCnV126SKu_HL", "1", "w");
                // cZ5OzPeISdKBzcSicPDrzc:APA91bHTU37xE-tVGiVREXPdGhmNjd7GIV0tMJzRH7_fEXm0XFEPgu1Qi5h2aIuWRrk9W-HNzmqsar11hy6CchY7oYWcfwz5byfk9Kwxd_arngyAGbkIkcJhrQRraLFNCCkSM02TLaoL
                // Galaxy 
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم انشاء عرض جديد بنجاح');
                } else {
                    Alert::info('A new discount has been created successfully');
                }
                break;
            case 2:
                $validator = Validator::make($request->all(), [

                    // service inputs 
                    'name' => 'required|string | min:3  | max:25',
                    'price' => 'required|string | min:3  | max:25',



                ], app()->getLocale() == 'ar' ? $messages : $messagesEn);

                if ($validator->fails()) {
                    if (app()->getLocale() == 'ar') {
                        Alert::error('خطأ ', $validator->messages()->all());
                    } else {
                        Alert::error('Error ', $validator->messages()->all());
                    }

                    //   Alert::error('خطأ', $validator->messages()->all());
                    return back();
                }
                $Service = new Service();
                $Service->Name_ar = $request->name;
                $Service->Name_en = '';
                $Service->employee_id = 1;
                $Service->Price = $request->price;
                $Service->clinic_id = $request->clinic;
                $Service->Status = 1;
                $Service->save();
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم انشاء خدمة جديدة بنجاح');
                } else {
                    Alert::info('A new service has been created successfully');
                }
                break;
            case 3:
                $validator = Validator::make($request->all(), [

                    // Doctor inputs
                    'DoctorImg' => 'required',
                    'DoctorName'     => 'required|string  | min:3   | max:255',
                    'email'     => 'required | email | max:255 | unique:users',
                    // 'DoctorPassword'     => 'required ',
                    'DoctorInfo'  => 'required| min:8',

                ], app()->getLocale() == 'ar' ? $messages : $messagesEn);
                if ($validator->fails()) {
                    if (app()->getLocale() == 'ar') {
                        Alert::error('خطأ ', $validator->messages()->all());
                    } else {
                        Alert::error('Error ', $validator->messages()->all());
                    }

                    return back();
                }
                $file1 = $request->DoctorImg;
                $extension = $file1->getClientOriginalExtension();
                $destination_path1 = 'files' . '/';
                $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                $file1->move($destination_path1, $file_name1);

                $user = new User();
                $user->name = $request->DoctorName;
                $user->email = $request->email;
                $user->password = Hash::make("123456789");
                $user->permission_id = 2;
                $user->Status = 1;
                $user->save();

                $doctor = new Doctor();
                $doctor->doctor_id = $user->id;
                $doctor->info_ar = $request->DoctorInfo;
                $doctor->path = $destination_path1 .  $file_name1;
                $doctor->Status = 1;
                $doctor->save();
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم انشاء طبيب جديد بنجاح');
                } else {
                    Alert::info('A new doctor has been created successfully');
                }
                break;
            default:
                break;
        }

        return back();
    }
    protected function dashboardContentUpdate(Request $request)
    {

        //return $request->clinic;
        $code = Str::random(4);
        Alert::success('تم تسجيل حضور للمراجع ', '');

        switch ($request->type) {
            case 1:
                $oldDiscount = Discount::where('id', $request->id)->first();
                Discount::where('id', $request->id)->update([
                    'title_ar' => $request->DisTitle == null ? $oldDiscount->title_ar : $request->DisTitle,
                    'title_en' => $request->DisTitle == null ? $oldDiscount->title_en : $request->DisTitle,

                    'text_ar' => $request->DisText == null ? $oldDiscount->text_ar : $request->DisText,
                    'text_en' => $request->DisText == null ? $oldDiscount->text_en : $request->DisText,

                    'Price' => $request->DisPrice == null ? $oldDiscount->Price : $request->DisPrice,
                ]);
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم التعديل على العرض بنجاح');
                } else {
                    Alert::info('discount has been successfully modified');
                }
                break;
            case 2:
                $oldService = Service::where('id', $request->id)->first();
                $arr =  Service::where('id', $request->id)->update([
                    'Name_ar' => $request->name == null ? $oldService->Name_ar : $request->name,
                    'Name_en' => $request->name == null ? $oldService->Name_en : $request->name,
                    'Price' => $request->price == null ? $oldService->Price : $request->price,
                    'clinic_id' => $request->clinic == null ? $oldService->clinic_id : $request->clinic,
                ]);
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم التعديل على الخدمة بنجاح');
                } else {
                    Alert::info('service has been successfully modified');
                }
                break;
            case 3:
                if ($request->DoctorImg != null) {
                    $file1 = $request->DoctorImg;
                    $extension = $file1->getClientOriginalExtension();
                    $destination_path1 = 'files' . '/';
                    $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                    $file1->move($destination_path1, $file_name1);
                }

                $oldDoctor = Doctor::where('id', $request->id)->first();
                $oldUser = User::where('id', $oldDoctor->doctor_id)->first();
                User::where('id', $oldDoctor->doctor_id)->update([
                    'name' => $request->DoctorName == null ? $oldUser->name : $request->DoctorName,
                    'email' => $request->email == null ? $oldUser->email : $request->email,
                    'password' => $request->DoctorPassword == null ? $oldUser->password :  Hash::make($request->DoctorPassword),
                ]);
                Doctor::where('id', $request->id)->update([
                    'info_ar' => $request->DoctorInfo == null ? $oldDoctor->Info_ar : $request->DoctorInfo,
                    'path' => $request->DoctorImg == null ? $oldDoctor->path : $destination_path1 .  $file_name1
                ]);
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم التعديل على معلومات الطبيب بنجاح');
                } else {
                    Alert::info('doctor has been successfully modified');
                }
                break;
            case 4:
                if ($request->AboutImg != null) {
                    $file1 = $request->AboutImg;
                    $extension = $file1->getClientOriginalExtension();
                    $destination_path1 = 'files' . '/';
                    $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                    $file1->move($destination_path1, $file_name1);
                }
                ClinicDetails::where('id', $request->id)->update([
                    'text_ar' => $request->AboutText,
                    'path' =>   $destination_path1 .  $file_name1
                ]);
                if (app()->getLocale() == 'ar') {
                    Alert::success('تم التعديل على محتوى العيادة  بنجاح');
                } else {
                    Alert::info('clinic details has been successfully modified');
                }
                break;
            default:
                return null;
                break;
        }
        return back();

        return $request->all();
    }

    protected function Confirm(Request $request) //  تاكيد الحجز من قبل العيادة
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2,
            'employee_id' => auth()->user()->id

        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم تاكيد الحجز  ', $Reservation->Name . ' ' . $Reservation->NID);

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