<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clinic;
use App\Models\ClinicDetails;
use App\Models\Discount;
use App\Models\Doctor;
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

class DashBoardAdmin extends Controller
{
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

            'DisTo.after_or_equal' => 'تاريخ نهاية العرض قبل تاريخ بداية العرض ',   // after_or_equal

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

            'DisTo.after_or_equal' => 'The end Date Less Then Start Date',   // after_or_equal

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
                    'DisFrom' => 'required ',
                    'DisTo' => 'required| after_or_equal:DisFrom',
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
                $Discount->from = $request->DisFrom;
                $Discount->to = $request->DisTo;
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

        // return $request->all();
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
}
