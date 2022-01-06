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

                <a href="/FutureAppointments-0" class="btn btn-outline-light">
                    {{ __('ReservationDashboard.Future') }} </a>
                <a href="/TodayAppointments" class="btn btn-outline-light"> {{ __('ReservationDashboard.Today') }}</a>
                <a href="/PastAppointments" class="btn btn-outline-light"> {{ __('ReservationDashboard.Past') }}</a>
            </div>
            @if ($all['Date'])


                <div id="London" class=" city">
                    <br>
                    <h2> {{ __('ReservationDashboard.Future') }}</h2>

                    <div class="row">
                        <div class="col-md-4">

                        <input type="text" id="myInput2" onkeyup="myFunction()"
                            placeholder="{{ __('ReservationDashboard.search, :lang', ['ar' => '....البحث بالهوية الوطنية', 'en' => 'Search By National ID.....']) }}"
                            title="Type in a name">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                        <p>عدد المواعيد : <span style="color: yellowgreen" class="allApp"
                                id="allApp">{{ $all['AllAppointment'] }}</span></p>
                            </div>
                            <div class="col-md-4">
                        <p>عدد المواعيدالموافق عليها : <span style="color:  green" class="AllappApproved"
                                id="AllappApproved">{{ $all['AllApprovedAppointment'] }}</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                        <p>الطاقة الاستعابية : <span style="color: red" class="sets"
                                id="sets">{{ $all['sets'] }}</span></p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2">

                        <button type="submit" data-toggle="modal" data-target="#ChangeDate" class="btn btn-secondary">
                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'تغير التاريخ ', 'en' => 'Change Date']) }}</button>
                        </div>                    
                    </div>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table id="myTable2" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2"> {{ __('ReservationDashboard.action') }}</th>
                                    <th colspan="1"> {{ __('ReservationDashboard.StatusT') }}</th>
                                    <th colspan="2">{{ __('ReservationDashboard.service') }}</th>
                                    <th colspan="2" scope="col">{{ __('ReservationDashboard.ShiftDate') }}</th>
                                    <th colspan="2" scope="col">{{ __('ReservationDashboard.Name') }}</th>
                                    <th colspan="2" scope="col">{{ __('ReservationDashboard.NID') }}</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($all['Reservations'] as $Reservation)
                                    <tr>
                                        <td colspan="2" id="texttab">
                                            @if ($Reservation->Status == 1)
                                                <div id="dailogs1">

                                                    <form method="POST" action="{{ route('Confirm') }}">
                                                        @csrf
                                                        <input type="number" value="{{ $Reservation->id }}" name="id"
                                                            readonly hidden required />

                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'تاكيد الحجز', 'en' => 'Approving']) }}</button>
                                                    </form>

                                                </div>
                                                <div id="dailogs4">
                                                    <form method="POST" action="{{ route('Rejected') }}">
                                                        @csrf
                                                        <input type="number" value="{{ $Reservation->id }}" name="id"
                                                            readonly hidden required />
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'رفض', 'en' => 'Reject']) }}</button>

                                                        </button>
                                                    </form>
                                                </div>
                                                <br><br>
                                            @endif

                                        </td>
                                        <td colspan="1" id="texttab">
                                            @if ($Reservation->Status == 1)
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}
                                            @elseif($Reservation->Status == 2 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}
                                            @elseif($Reservation->Status == 3 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'مرفوض', 'en' => 'Rejected ']) }}
                                            @elseif($Reservation->Status == 4 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'في العيادة', 'en' => 'Arraive']) }}
                                            @elseif($Reservation->Status == 5 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'انتهت الجلسة ', 'en' => 'Completed  ']) }}
                                            @elseif($Reservation->Status == 6 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'لم يحظر ', 'en' => 'Did not come ']) }}
                                            @elseif($Reservation->Status == 7 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار موافقتك  ', 'en' => 'Need your Approval']) }}
                                            @elseif($Reservation->Status == 8 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة على الموعد', 'en' => 'Appointment accpeted  ']) }}
                                            @elseif($Reservation->Status == 9 )
                                                {{ __('UserDashboard.Status, :lang', ['ar' => 'تم رفض الموعد من قبل المراجع', 'en' => 'Appointment Rejected from Patient ']) }}

                                            @endif
                                        </td>

                                        <td colspan="2" id="texttab">
                                            {{ $Reservation->service == null ? $Reservation->discount['title_ar'] : $Reservation->service['Name_ar'] }}
                                        </td>

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
                <div class="modal fade" id="ChangeDate" tabindex="-1" role="dialog" aria-labelledby="ChangeDateLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                              
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label id="idnational">
                                        {{ __('AppReservation.Date') }}</label> <br>

                                    <input id="idnationalOld" value="<?php echo Date('Y-m-d', time()); ?>" type="date"
                                        name="AppointmentCheck" min="<?php echo Date('Y-m-d', time()); ?>" max="2030-07-30">

                                </div>
                            </div>
                            <div class="modal-footer" style="width: 100%">
                                <div class="col-md-12">
                                    <button id="SearchDate" class="btn btn-outline-info" type="submit">بحث </button>
                                </div>
                            </div>
                    </div>
                </div>

            @else

                <div class="form-group row">
                    <label id="idnational">
                        {{ __('AppReservation.Date') }}</label> <br>

                    <input id="idnationalOld" value="<?php echo Date('Y-m-d', time()); ?>" type="date" name="AppointmentCheck"
                        min="<?php echo Date('Y-m-d', time()); ?>" max="2030-07-30">

                </div>
                <button id="SearchDate" class="btn btn-info" type="submit">بحث </button>
            @endif

        </div>

        </div>
    </div>
@endsection


@section('checkDate')
    <script>
        $("#SearchDate").click(function(e) {
            e.preventDefault();
            var date = document.getElementById('idnationalOld').value;
            window.location = "/FutureAppointments-" + date;
        });
    </script>
@endsection
