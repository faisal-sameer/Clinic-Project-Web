@extends('layouts.app')
@section('we')
    /
@endsection
@section('se')
    /
@endsection
@section('con')
    /
@endsection

@section('content')
<div class="welcome-area" id="welcome">

<div class="container">
    <h2 style="text-align: center">
        لوحة التحكم 
    </h2>
    <br><br>
    <hr class="new2">
    <div style="margin-right: 75% ; margin-bottom: 3% ; direction: rtl">
      
       
      <a href="/Primation" id="adduser"  class="btn btn-light">اضافة مستخدم <i class="fa fa-plus-circle" aria-hidden="true"></i>
      </a>    
    </div>
    <table>
        <thead>
          <tr>
            <th colspan="2">الحالة</th>
            <th colspan="2">الخدمة</th>
            <th colspan="2" scope="col">الوقت</th>

            <th colspan="2" scope="col">اليوم</th>
            <th colspan="2" scope="col">الإسم</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2" id="texttab" style="text-align: center">منتهي</td>

            <td colspan="2" id="texttab" style="text-align: center">تنظيف أسنان</td>

            <td colspan="2" id="texttab" style="text-align: center">10:00PM</td>

            <td colspan="2" id="texttab" style="text-align: center">1/1/1442</td>
            <td style="text-align: center" colspan="2" id="texttab" >
                فيصل سمير أحمد زيني جمبي</td>
      
          </tr>
          
      
          <tr>
            <td colspan="2" id="texttab" style="text-align: center">منتهي</td>

            <td colspan="2" id="texttab" style="text-align: center">تبييض</td>

            <td colspan="2" id="texttab" style="text-align: center">10:00AM</td>

            <td colspan="2" id="texttab" style="text-align: center">5/30/1442</td>
            <td style="text-align: center" colspan="2" id="texttab" >
                فيصل سمير أحمد زيني جمبي</td>
      
          </tr>
          
        </tbody>
      </table>
 
</div>
</div>
@endsection
