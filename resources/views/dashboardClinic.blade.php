
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
 
   
    <div class="container" >
        <div id="mess">
          <form id="logout-form" action="#" method="POST" >
            @csrf
            <button class="btn btn-outline-light" type="submit" >المواعيد المستقبلية</button>

        </form>
        <form id="logout-form" action="dashboardClinic" method="POST" >
          @csrf
          <button class="btn btn-outline-light" >مواعيد اليوم</button>

      </form>

      <form id="logout-form" action="#" method="POST" >
        @csrf
        <button class="btn btn-outline-light" >المواعيد السابقة</button>

    </form>
    </div>
                
                <div id="London" class=" city">
                    <br>
                    <h2 style="text-align: right">مواعيد اليوم</h2>

                    <input id="myInput" type="text" onkeyup="myFunction()" class="form-control" placeholder="ابحث برقم الهوية "  required >

                   <br>
                   <br>
                    <table id="myTable">
                      <thead>
                        <tr>
                          <th colspan="2">الحالة</th>
                          <th colspan="2">الخدمة</th>
                          <th colspan="2" scope="col">الوقت</th>
              
                          <th colspan="2" scope="col">الاسم</th>
                          <th colspan="2" scope="col">الهوية</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($all as $user)
                        <tr>
                          <td colspan="2" id="texttab" style="text-align: center">{{$user->name}}</td>
              
                          <td colspan="2" id="texttab" style="text-align: center">{{$user->email}}</td>
              
                          <td colspan="2" id="texttab" style="text-align: center">{{$user->email}}</td>
              
                          <td colspan="2" id="texttab" style="text-align: center">{{$user->name}}</td>
                          <td style="text-align: center" colspan="2" id="texttab" >
                           1055555555</td>
                    
                        </tr>
                        @endforeach
                       
                        
                      </tbody>
                    </table>
              
                </div>
    
                <div id="Paris" class=" city" style="display: none" >
                    <br>
                    <h2>المواعيد المستقبلية</h2>

                    <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names.." title="Type in a name">
                  
                    <table id="myTable1">
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
    
                <div id="Tokyo" class=" city" style="display:none">
                  <br>
                    <h2>المواعيد الماضية</h2>

                    <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names.." title="Type in a name">
                    
                    <table id="myTable1">
                      <tr class="header">
                        <th style="width:60%;">Name</th>
                        <th style="width:40%;">Country</th>
                      </tr>
                      <tr>
                        <td>Flfreds BButterkiste</td>
                        <td>Germany</td>
                      </tr>
                      <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                      </tr>
                    </table>

                      </div>
              
    </div>
</div>
</div>
@endsection
