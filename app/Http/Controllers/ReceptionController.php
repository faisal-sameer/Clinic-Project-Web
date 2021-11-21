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
        $code = Str::random(4);

        switch ($request->type) {
            case 1:
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
                $Service = new Service();
                $Service->Name = $request->name;
                $Service->Price = $request->price;
                $Service->clinic_id = 1;
                $Service->Status = 1;
                $Service->save();

                break;
            case 3:

                $file1 = $request->DoctorImg;
                $extension = $file1->getClientOriginalExtension();
                $destination_path1 = 'files' . '/';
                $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                $file1->move($destination_path1, $file_name1);

                $user = new User();
                $user->name = $request->DoctorName;
                $user->email = $request->DoctorEmail;
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
                    'email' => $request->DoctorEmail == null ? $oldUser->email : $request->DoctorEmail,
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