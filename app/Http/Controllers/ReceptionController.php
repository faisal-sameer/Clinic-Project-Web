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

class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function dashboardClinicToday()
    {
        $Reservations = Reservation::where('Date', 'like',  substr(date('c'), 0, -14) . '%')->get();
        return view('dashboardClinicToday')->with('Reservations', $Reservations);
    }

    protected function dashboardClinicPast()
    {
        // return Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->count();
        $Reservations = Reservation::where('Date', '<',  substr(date('c'), 0, -14) . '%')->get();
        return view('dashboardClinicPast')->with('Reservations', $Reservations);
    }

    protected function dashboardContent()
    {
        $Detail = ClinicDetails::get();
        $Service = Service::where('Status', 1)->get();
        $Discount = Discount::get();
        $Doctor = Doctor::get();
        $clinic = clinic::get();
        $content = ['about' => $Detail, 'doctor' => $Doctor, 'discount' => $Discount, 'service' => $Service, 'clinic' => $clinic];
        // return $Doctor;
        return view('dashboardContent')->with('content', $content);
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

            'DoctorName.min' => 'اقل من الحد ',   // min
            'DoctorInfo.min' => 'اقل من الحد ',   // min


            'DoctorName.max' => 'اكثر  من الحد ',   // max
            'email.max' => 'اكثر  من الحد ',   // max
            'DoctorInfo.max' => 'اكثر  من الحد ',   // max

            'email.unique'     => 'الايميل مستخدم ',   // Unique Email 
            'email.email'     => 'الرجاء إدخال الايميل بالشكل الصحيح ',   //  Email 



        ];

        $code = Str::random(4);

        switch ($request->type) {
            case 1:
                $validator = Validator::make($request->all(), [
                    // discount inputs
                    'DisTitle' => 'required|string | min:3  | max:100',
                    'DisText' => 'required|string | min:3  | max:250',
                    'DisPrice' => 'required|string | min:3  | max:25',


                ], $messages);

                if ($validator->fails()) {
                    Alert::error('خطاء ', $validator->messages()->all());
                    return back();
                }
                $oldDiscount = Discount::latest()->first();;
                $Discount = new Discount();
                $Discount->title  = $request->DisTitle;
                $Discount->employee_id = auth()->user()->id;
                $Discount->clinic_id = 1;
                $Discount->text = $request->DisText == null ?  null : $request->DisText;
                $Discount->Price = $request->DisPrice == null ? null : $request->DisPrice;
                $Discount->order = $oldDiscount == null ? 1 : $oldDiscount->order  + 1;
                $Discount->Status = 1;
                $Discount->save();
                break;
            case 2:
                $validator = Validator::make($request->all(), [

                    // service inputs 
                    'name' => 'required|string | min:3  | max:25',
                    'price' => 'required|string | min:3  | max:25',



                ], $messages);

                if ($validator->fails()) {
                    Alert::error('خطاء ', $validator->messages()->all());
                    //   Alert::error('خطأ', $validator->messages()->all());
                    return back();
                }
                $Service = new Service();
                $Service->Name = $request->name;
                $Service->Price = $request->price;
                $Service->clinic_id = 1;
                $Service->Status = 1;
                $Service->save();

                break;
            case 3:
                $validator = Validator::make($request->all(), [

                    // Doctor inputs
                    'DoctorImg' => 'required',
                    'DoctorName'     => 'required|string  | min:3   | max:255',
                    'email'     => 'required | email | max:255 | unique:users',
                    'DoctorPassword'     => 'required ',
                    'DoctorInfo'  => 'required| min:8',

                ], $messages);

                if ($validator->fails()) {
                    Alert::error('خطاء ', $validator->messages()->all());
                    //   Alert::error('خطأ', $validator->messages()->all());
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
                $user->password = Hash::make($request->DoctorPassword);
                $user->permission_id = 2;
                $user->Status = 1;
                $user->save();

                $doctor = new Doctor();
                $doctor->doctor_id = $user->id;
                $doctor->info = $request->DoctorInfo;
                $doctor->path = $destination_path1 .  $file_name1;
                $doctor->Status = 1;
                $doctor->save();
                break;
            default:
                break;
        }

        return back();
    }
    protected function dashboardContentUpdate(Request $request)
    {


        // return $request->all();
        $code = Str::random(4);
        Alert::success('تم تسجيل حضور للمراجع ', '');

        switch ($request->type) {
            case 1:
                $oldDiscount = Discount::where('id', $request->id)->first();
                Discount::where('id', $request->id)->update([
                    'title' => $request->DisTitle == null ? $oldDiscount->title : $request->DisTitle,
                    'text' => $request->DisText == null ? $oldDiscount->text : $request->DisText,
                    'Price' => $request->DisPrice == null ? $oldDiscount->Price : $request->DisPrice,
                ]);
                break;
            case 2:
                $oldService = Service::where('id', $request->id)->first();
                Service::where('id', $request->id)->update([
                    'Name' => $request->name == null ? $oldService->Name : $request->name,
                    'Price' => $request->price == null ? $oldService->Price : $request->price
                ]);
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
                    'info' => $request->DoctorInfo == null ? $oldDoctor->Info : $request->DoctorInfo,
                    'path' => $request->DoctorImg == null ? $oldDoctor->path : $destination_path1 .  $file_name1
                ]);
                break;
            default:
                return null;
                break;
        }
        return back();

        return $request->all();
    }
    protected function dashboardClinicFuture()
    {
        // return  Reservation::where('Date', '>',  substr(date('c'), 0, -14) . '%')->where('Status', 8)->count();

        $Reservations = Reservation::where('Date', '>',  substr(date('c'), 0, -14) . '%')->where('Status', 1)->orWhere('Status', 5)->get();
        return view('dashboardClinicAfter')->with('Reservations', $Reservations);
    }

    protected function Coming(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 2
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم تسجيل حضور للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }
    protected function Confirm(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success('تم تاكيد الحجز  ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function DidCome(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 3
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::info('تم تسجيل عدم حضور للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function Complete(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 4
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success(' انتهت الجلسة للمراجع ', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

    protected function NewAppointment(Request $request)
    {
        Reservation::where('id', $request->id)->update([
            'Status' => 5
        ]);
        $Reservation =  Reservation::where('id', $request->id)->first();

        Alert::success(' تم حجز موعد جديد للمراجع', $Reservation->Name . ' ' . $Reservation->NID);

        return back();
    }

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