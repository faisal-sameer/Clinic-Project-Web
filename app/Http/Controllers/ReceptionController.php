<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\ClinicDetails;
use App\Models\Discount;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Service;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

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
        // return $request->all();
        $code = Str::random(4);

        switch ($request->type) {
            case 1:
                $file1 = $request->disImg;
                $extension = $file1->getClientOriginalExtension();
                $destination_path1 = 'files' . '/';
                $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                $file1->move($destination_path1, $file_name1);
                $Discount = new Discount();
                $Discount->text = $request->disName;
                $Discount->path = $file_name1;
                $Discount->Status = 1;
                $Discount->save();
                break;
            case 2:
                $file1 = $request->disImg;
                $extension = $file1->getClientOriginalExtension();
                $destination_path1 = 'files' . '/';
                $file_name1 =  $code . 'Code' . $request->NID . '.' . $extension;
                $file1->move($destination_path1, $file_name1);

                $Service = new Service();

                break;
            case 3:
                return null;
                break;
            default:
                return null;
                break;
        }

        return back();
    }
    protected function dashboardContentUpdate(Request $request)
    {
        return "Update ";

        switch ($request->type) {
            case 1:
                return null;
                break;
            case 2:
                Service::where('id', $request->id)->update([
                    'Name' => $request->name,
                    'Price' => $request->price
                ]);
                break;
            case 3:
                return null;
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