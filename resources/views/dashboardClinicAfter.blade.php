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
                <h2>المواعيد القادمة</h2>

                <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for names.."
                    title="Type in a name">

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable2" class="table table-bordered table-striped mb-0">
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
                                    <td colspan="2" id="texttab">
                                        @if ($Reservation->Status == 1)
                                            <div id="dailogs1">

                                                <form method="POST" action="{{ route('Confirm') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id" readonly
                                                        hidden required />

                                                    <button type="submit" class="btn btn-success">تاكيد الحجز</button>
                                                </form>

                                            </div>

                                            <br><br>
                                        @endif

                                    </td>
                                    <td colspan="1" id="texttab">
                                        @if ($Reservation->Status == 8)
                                            تم تاكيد الحجز

                                        @else
                                            في انتظار التاكيد
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


            </div>




        </div>
    </div>
@endsection
