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

            <br><br>
            <div id="London" class="city form-inline">
                <br>
                <div id="dash">
                    <form method="POST" action="{{ route('Appointment') }}">
                        @csrf
                        <input type="text" required readonly hidden name="NID" value="{{ $all['NID'] }}">
                        <button id="adduser" class="btn btn-light" type="submit">حجز جديد <i class="fa fa-plus-circle"
                                aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table id="myTable" class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th colspan="1">الحالة</th>
                                <th colspan="2">الحالة</th>
                                <th colspan="2">الخدمة</th>
                                <th colspan="2" scope="col">الوقت</th>

                                <th colspan="2" scope="col">اليوم</th>
                                <th colspan="2" scope="col">الإسم</th>

                            </tr>
                        </thead>
                        @if ($all == 0)


                            <tr>

                                <td colspan="10"><strong>لا توجد مواعيد مسجلة</strong> </td>


                            </tr>
                        @else

                            <tbody>

                                @if ($all['data'] == 0)

                                @else
                                    @foreach ($all['reservations'] as $reservation)



                                        <tr>
                                            <td colspan="1" id="texttab" style="text-align: center">

                                                <div id="dailogs">

                                                    <input type="number" value="{{ $reservation->id }}" name="id" readonly
                                                        hidden required />
                                                    <button type="submit" data-toggle="modal"
                                                        data-target="#exampleModal{{ $reservation->id }}"
                                                        class="btn btn-warning">تغير </button>

                                                </div>
                                                <br><br>
                                            </td>
                                            <td colspan="2" id="texttab" style="text-align: center">
                                                @if ($reservation->Status == 1)
                                                    تم حجز الموعد
                                                @elseif($reservation->Status == 2 )
                                                    في صالة الانتظار
                                                @elseif($reservation->Status == 3 )
                                                    لم تحظر
                                                @elseif($reservation->Status == 4 )
                                                    انهيت الجسلة
                                                @elseif($reservation->Status == 5 )
                                                    تم تاكيد الحجز
                                                @elseif($reservation->Status == 6 )
                                                    غادرت
                                                @elseif($reservation->Status == 7 )
                                                    انهيت الجلسة بدون موعد
                                                @endif
                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ $reservation->service->Name }}
                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ date('H:i', strtotime($reservation->Date)) }}
                                                @if (date('H', strtotime($reservation->Date)) > 12)
                                                    صباحا
                                                @else
                                                    مساء
                                                @endif
                                                {{ date('D', strtotime($reservation->Date)) }}

                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ $reservation->Date }} Day
                                            </td>
                                            <td style="text-align: center" colspan="2" id="texttab">
                                                {{ $reservation->Name }}</td>

                                        </tr>

                                        <div class="modal fade" id="exampleModal{{ $reservation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل على موعد
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('ChangeApp') }}">
                                                            @csrf
                                                            <input type="text" name="NID" readonly required hidden
                                                                value="{{ $all['NID'] }}">
                                                            <input type="text" name="id" readonly required hidden
                                                                value="{{ $reservation->id }}">

                                                            <div class="form-group row">

                                                                <input id="idnational" type="text" name="Name"
                                                                    class="form-control" placeholder="الاسم"
                                                                    value="{{ $reservation->Name }}">
                                                            </div>
                                                            <div class="form-group row">

                                                                <label id="idnational">اختر اليوم والوقت</label> <br>
                                                                <input id="idnational" type="datetime-local"
                                                                    value="{{ $reservation->Date }}" name="Appointment"
                                                                    min="2021-06-01T10:00" max="2030-07-30T20:00">


                                                            </div>

                                                            <div class="form-group row">

                                                                <select class="form-select" id="idnational"
                                                                    name="Service" aria-label="Default select example">

                                                                    @foreach ($all['services'] as $service)

                                                                        @if ($service->id == $reservation->services_id)
                                                                            <option selected value="{{ $service->id }}">
                                                                                {{ $service->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $service->id }}">
                                                                                {{ $service->Name }}</option>
                                                                        @endif


                                                                    @endforeach



                                                                </select>


                                                            </div>
                                                            <div class="form-group row">

                                                                <input id="idnational" type="text" name="Phone"
                                                                    class="form-control" placeholder="رقم الجوال"
                                                                    value="{{ $reservation->Phone }}" required>


                                                            </div>

                                                            <br>

                                                            <div class="form-group row mb-0">

                                                                <button type="submit" class="btn btn-outline-info"
                                                                    id="idnational">تعديل

                                                                </button>


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">اغلاق</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif




                            </tbody>
                        @endif
                    </table>
                </div>
            </div>




        </div>

    </div>

@endsection
