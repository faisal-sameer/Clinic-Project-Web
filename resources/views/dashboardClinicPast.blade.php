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


        <div  id="ptf" class="container">
            <div id="mess">

                <a href="/FutureAppointments" class="btn btn-outline-light">المواعيد القادمة</a>

                <a href="/TodayAppointments" class="btn btn-outline-light">مواعيد اليوم</a>
                <a href="/PastAppointments" class="btn btn-outline-light">المواعيد السابقة</a>

            </div>

            <div id="London" class=" city">
                <br>
                <h2>المواعيد السابقة</h2>

                <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names.."
                    title="Type in a name">

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable1" class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th colspan="2">Action</th>
                                <th colspan="1">الحالة</th>
                                <th colspan="2">الخدمة</th>
                                <th colspan="2" scope="col">الوقت</th>

                                <th colspan="2" scope="col">الاسم</th>
                                <th colspan="2" scope="col">الهوية</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Reservations as $Reservation)
                                <tr>
                                    <td colspan="2" id="texttab" style="text-align: center">
                                        @if ($Reservation->Status == 1)
                                            <div id="dailogs1">

                                                <form method="POST" action="{{ route('Coming') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />

                                                    <button type="submit" class="btn btn-success">حضر</button>
                                                </form>

                                            </div>
                                            <div >
                                                <form method="POST" action="{{ route('DidCome') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-warning">لم يحضر</button>
                                                </form>
                                            </div>
                                            <br><br>

                                        @elseif($Reservation->Status == 2 )
                                            <div id="dailogs">
                                                <form method="POST" action="{{ route('Complete') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-success">انهاء الجلسة</button>
                                                </form>
                                            </div>                                            
                                            <br><br>

                                        @elseif( $Reservation->Status == 3)
                                            <div id="dailogs">
                                                <form method="POST" action="{{ route('Leave') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-secondary">غادر </button>
                                                </form>
                                            </div>                                            
                                            <br><br>

                                        @elseif($Reservation->Status == 4 )

                                            <div >
                                                <form method="POST" action="{{ route('NewApp') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-success">موعد جديد</button>
                                                </form>
                                            </div>
                                            <div >
                                                <form method="POST" action="{{ route('WithOutApp') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" class="btn btn-secondary">بدون موعد </button>
                                                </form>
                                            </div>
                                            <br><br>
s
                                        @endif
                                    </td>
                                    <td colspan="1" style="text-align: center" id="texttab">
                                        @if ($Reservation->Status == 1)
                                            محجوز
                                        @elseif($Reservation->Status == 2 )
                                            في صالة الانتظار
                                        @elseif($Reservation->Status == 3 )
                                            لم يحظر
                                        @elseif($Reservation->Status == 4 )
                                            انهاء الجسلة
                                        @elseif($Reservation->Status == 5 )
                                            تم حجز موعد جديد
                                        @elseif($Reservation->Status == 6 )
                                            غادر
                                        @elseif($Reservation->Status == 7 )
                                            انهاء الجلسة بدون موعد
                                        @endif
                                    </td>

                                    <td colspan="2" id="texttab" style="text-align: center">
                                        {{ $Reservation->service->Name }}</td>

                                    <td colspan="2" id="texttab" style="text-align: center">{{ $Reservation->Date }}
                                    </td>

                                    <td colspan="2" id="texttab" style="text-align: center">{{ $Reservation->Name }}
                                    </td>
                                    <td style="text-align: center" colspan="2" id="texttab">
                                        {{ $Reservation->NID }}</td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div>

                </div>

            </div>




        </div>
    </div>
@endsection
