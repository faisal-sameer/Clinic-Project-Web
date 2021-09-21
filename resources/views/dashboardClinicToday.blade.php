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


        <div id="ptf" class="container">
            <div id="mess">

                <a href="/FutureAppointments" class="btn btn-outline-light">المواعيد القادمة</a>

                <a href="/TodayAppointments" class="btn btn-outline-light">مواعيد اليوم</a>
                <a href="/PastAppointments" class="btn btn-outline-light">المواعيد السابقة</a>

            </div>

            <div id="London" class=" city">
                <br>
                <h2>مواعيد اليوم</h2>

                <input type="text" id="myInput0" onkeyup="myFunction()" placeholder="Search for names.."
                    title="Type in a name">

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable" class="table table-bordered table-striped mb-0">
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
                                    <td colspan="2">
                                        @if ($Reservation->Status == 1)
                                            <div id="dailogs3">

                                                <form method="POST" action="{{ route('Coming') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />

                                                    <button type="submit" class="btn btn-success">وصول</button>
                                                </form>

                                            </div>
                                            <br>
                                            <br>
                                            <div id="dailogs4">
                                                <form method="POST" action="{{ route('DidCome') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-warning">لم يحضر</button>
                                                </form>
                                            </div>
                                            <br><br>
                                        @elseif($Reservation->Status == 5 )
                                            <div style="margin:auto">
                                                <form method="POST" action="{{ route('Complete') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" class="btn btn-success">انهاء الجلسة</button>
                                                </form>
                                            </div>
                                            <br>

                                        @endif
                                    </td>
                                    <td colspan="1" id="texttab">

                                        @if ($Reservation->Status == 1)

                                            في انتظار التاكيد

                                        @elseif($Reservation->Status == 2 )
                                            في صالة الانتظار
                                        @elseif($Reservation->Status == 3 )
                                            لم يحظر
                                        @elseif($Reservation->Status == 4 )
                                            انتهت الجلسة
                                        @elseif($Reservation->Status == 5 )
                                            تم التاكيد

                                        @endif
                                    </td>

                                    <td colspan="2" id="texttab">
                                        {{ $Reservation->service->Name }}</td>

                                    <td colspan="2" id="texttab">{{ $Reservation->Date }}
                                    </td>

                                    <td colspan="2" id="texttab">{{ $Reservation->Name }}
                                    </td>
                                    <td colspan="2" id="texttab">
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
