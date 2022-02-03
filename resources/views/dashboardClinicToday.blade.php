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

            <div id="London" class=" city">
                <br>
                <h2> {{ __('ReservationDashboard.Today') }} </h2>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="myInput0" onkeyup="myFunction()"
                            placeholder="{{ __('ReservationDashboard.search, :lang', ['ar' => '....البحث بالهوية الوطنية', 'en' => 'Search By National ID.....']) }}"
                            title="Type in a name">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <p>{{ __('ReservationDashboard.numberofappointments') }} : <span
                                        style="color: yellowgreen" class="allApp"
                                        id="allApp">{{ $all['AllAppointment'] }}</span></p>
                            </div>
                            <div class="col-md-4">

                                <p>{{ __('ReservationDashboard.Numberofappointmentsapproved') }}: <span
                                        style="color:  green" class="AllappApproved"
                                        id="AllappApproved">{{ $all['AllApprovedAppointment'] }}</span>
                                </p>
                            </div>
                            <div class="col-md-4">

                                <p>{{ __('ReservationDashboard.Capacity') }}: <span style="color: red"
                                        class="sets" id="sets">{{ $all['sets'] }}</span></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <button type="submit" data-toggle="modal" data-target="#NewApp" class="btn btn-secondary">
                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'حجز موعد', 'en' => 'New Appointment']) }}</button>
                    </div>
                </div>

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable" class="table table-bordered table-striped mb-0">
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
                                    <td colspan="2">
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
                                        @elseif($Reservation->Status == 2)
                                            <div id="dailogs3">

                                                <form method="POST" action="{{ route('Coming') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />

                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'وصول', 'en' => 'Arrive']) }}</button>
                                                </form>

                                            </div>

                                            <div id="dailogs4">
                                                <form method="POST" action="{{ route('DidCome') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" class="btn btn-warning">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'لم يحضر', 'en' => 'Did not Arrived']) }}</button>
                                                </form>
                                            </div>
                                        @elseif($Reservation->Status == 4)

                                            <form method="POST" action="{{ route('Complete') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="number" value="{{ $Reservation->id }}" name="id"
                                                            readonly hidden required />
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'انهاء الجلسة', 'en' => 'Completed']) }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @elseif($Reservation->Status == 5)
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" data-toggle="modal"
                                                        data-target="#CheckDate{{ $Reservation->id }}"
                                                        class="btn btn-info">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'حجز موعد ', 'en' => 'New Appointment']) }}
                                                    </button>
                                                </div>
                                            </div>
                                        @endif



                                        <!--Check the sites-->
                                        <div class="modal fade" id="CheckDate{{ $Reservation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title w-100" id="exampleModalLabel">
                                                            {{ __('UserDashboard.NewApp') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="POST" action="{{ route('FreeData') }}"
                                                            id="add-country-form{{ $Reservation->id }}"
                                                            autocomplete="off">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label id="idnational">
                                                                    {{ __('AppReservation.Date') }}</label> <br>

                                                                <input id="idnationalOld" value="<?php echo Date('Y-m-d', time()); ?>"
                                                                    type="date" name="AppointmentCheck"
                                                                    min="<?php echo Date('Y-m-d', time()); ?>" max="2030-07-30">

                                                            </div>

                                                            <p>{{ __('ReservationDashboard.numberofappointments') }} :
                                                                <span style="color: yellowgreen" class="allApp"
                                                                    id="allApp"></span>
                                                            </p>

                                                            <p>{{ __('ReservationDashboard.Numberofappointmentsapproved') }}
                                                                : <span style="color:  green" class="AllappApproved"
                                                                    id="AllappApproved"></span> </p>
                                                            <p>{{ __('ReservationDashboard.Capacity') }} : <span
                                                                    style="color: red" class="sets"
                                                                    id="sets"></span></p>

                                                            <p>{{ __('ReservationDashboard.earliestdate') }} : <span
                                                                    style="color: rgb(7, 90, 25)" class="NearDate"
                                                                    id="NearDate"></span></p>

                                                            <div class="row">
                                                                <div class="col-md-6" style="margin-left: 25%">
                                                                    <button type="submit" style="width: 100%;">
                                                                        {{ __('ReservationDashboard.Checkspace') }} :
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>


                                                    </div>
                                                    <div class="modal-footer" style="width: 100%">

                                                        <div class="col-md-12">
                                                            <button type="submit" data-toggle="modal" style="width: 100%"
                                                                data-target="#exampleModal{{ $Reservation->id }}"
                                                                class="btn btn-info">
                                                                {{ __('ReservationDashboard.Status, :lang', ['ar' => 'حجز موعد ', 'en' => 'New Appointment']) }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit the App-->
                                        <div class="modal fade" id="exampleModal{{ $Reservation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title w-100" id="exampleModalLabel">
                                                            {{ __('UserDashboard.NewApp') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="{{ route('NewAppointmentStaffAfter') }}">
                                                            @csrf
                                                            <input type="text" name="id" readonly required hidden
                                                                value="{{ $Reservation->id }}">

                                                            <input type="text" name="NID" readonly required hidden
                                                                value="{{ $Reservation->NID }}">

                                                            <div class="form-group row">

                                                                <input id="idnational" type="text" name="Name"
                                                                    class="form-control"
                                                                    placeholder="{{ __('AppReservation.name') }}"
                                                                    value="{{ $Reservation->Name }}" readonly required>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label id="idnational">
                                                                    {{ __('AppReservation.Date') }}</label> <br>

                                                                <input id="idnationalNew" value="<?php echo Date('Y-m-d', time()); ?>"
                                                                    type="date" name="Appointment" min="<?php echo Date('Y-m-d', time()); ?>"
                                                                    max="2030-07-30" readonly>

                                                            </div>


                                                            <!-- Dermatology -->
                                                            <div class="form-group row">
                                                                <select class="form-select" id="idnational"
                                                                    name="Service" aria-label="Default select example">
                                                                    <option id="option" selected disabled>
                                                                        {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عروض', 'en' => 'Discount']) }}
                                                                    </option>
                                                                    @foreach ($all['discount'] as $discount)
                                                                        <option id="option" value="D{{ $discount->id }}">
                                                                            {{ $discount->title_ar }}</option>
                                                                    @endforeach

                                                                    <option id="option" disabled>
                                                                        {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات الاسنان', 'en' => 'Dental']) }}
                                                                    </option>
                                                                    @foreach ($all['dental'] as $dental)
                                                                        <option id="option" value="S{{ $dental->id }}">
                                                                            {{ $dental->Name_ar }}</option>
                                                                    @endforeach
                                                                    <option id="option" disabled>
                                                                        {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات الجلدية', 'en' => 'Dermatology']) }}
                                                                    </option>
                                                                    @foreach ($all['dermatology'] as $dermatology)
                                                                        <option id="option"
                                                                            value="S{{ $dermatology->id }}">
                                                                            {{ $dermatology->Name_ar }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group row">

                                                                <input id="idnational" type="text" name="Phone"
                                                                    class="form-control"
                                                                    value="{{ $Reservation->Phone }}"
                                                                    placeholder="{{ __('AppReservation.phone') }}  "
                                                                    required>
                                                            </div>
                                                            <br>
                                                            <div class="form-group row mb-0">

                                                                <button type="submit" class="btn btn-outline-info"
                                                                    id="idnational">
                                                                    {{ __('AppReservation.submit') }}

                                                                </button>


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td colspan="1" id="texttab">

                                        @if ($Reservation->Status == 1)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}
                                        @elseif($Reservation->Status == 2)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}
                                        @elseif($Reservation->Status == 3)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'مرفوض', 'en' => 'Rejected ']) }}
                                        @elseif($Reservation->Status == 4)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'في العيادة', 'en' => 'Arraive']) }}
                                        @elseif($Reservation->Status == 5)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'انتهت الجلسة ', 'en' => 'Completed  ']) }}
                                        @elseif($Reservation->Status == 6)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'لم يحظر ', 'en' => 'Did not come ']) }}
                                        @elseif($Reservation->Status == 7)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار موافقتك  ', 'en' => 'Need your Approval']) }}
                                        @elseif($Reservation->Status == 8)
                                            {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة على الموعد', 'en' => 'Appointment accpeted  ']) }}
                                        @elseif($Reservation->Status == 9)
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
                <div>

                </div>

            </div>

            <!--New App-->
            <div class="modal fade" id="NewApp" tabindex="-1" role="dialog" aria-labelledby="NewAppLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title w-100" id="exampleModalLabel">{{ __('UserDashboard.NewApp') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('NewAppointmentStaff') }}">
                                @csrf
                                <div class="form-group row">
                                    <input type="text" name="type" readonly hidden required value="1">
                                    <input id="idnational" type="text" name="NID" class="form-control"
                                        placeholder="{{ __('ReservationDashboard.NID') }}" maxlength="10" minlength="10"
                                        required>
                                </div>
                                <div class="form-group row">

                                    <input id="idnational" type="text" name="Name" maxlength="30" minlength="3"
                                        class="form-control" placeholder="{{ __('AppReservation.name') }}" required>
                                </div>
                                <div class="form-group row">
                                    <label id="idnational">
                                        {{ __('AppReservation.Date') }}</label> <br>

                                    <input id="idnationalNew" value="<?php echo Date('Y-m-d', time()); ?>" type="date" name="Appointment"
                                        min="<?php echo Date('Y-m-d', time()); ?>" max="2030-07-30">

                                </div>


                                <!-- Dermatology -->
                                <div class="form-group row">
                                    <select class="form-select" id="idnational" name="Service"
                                        aria-label="Default select example">
                                        <option id="option" selected disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عروض', 'en' => 'Discount']) }}
                                        </option>
                                        @foreach ($all['discount'] as $discount)
                                            <option id="option" value="D{{ $discount->id }}">
                                                {{ $discount->title_ar }}</option>
                                        @endforeach

                                        <option id="option" disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات الاسنان', 'en' => 'Dental']) }}
                                        </option>
                                        @foreach ($all['dental'] as $dental)
                                            <option id="option" value="S{{ $dental->id }}">
                                                {{ $dental->Name_ar }}</option>
                                        @endforeach
                                        <option id="option" disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات الجلدية', 'en' => 'Dermatology']) }}
                                        </option>
                                        @foreach ($all['dermatology'] as $dermatology)
                                            <option id="option" value="S{{ $dermatology->id }}">
                                                {{ $dermatology->Name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group row">

                                    <input id="idnational" maxlength="12" minlength="10" type="text" name="Phone"
                                        class="form-control" placeholder="{{ __('AppReservation.phone') }}  " required>
                                </div>
                                <br>
                                <div class="form-group row mb-0">

                                    <button type="submit" class="btn btn-outline-info" id="idnational">
                                        {{ __('AppReservation.submit') }}

                                    </button>


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@section('checkDate')

    @foreach ($all['Reservations'] as $Reservation)

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#add-country-form{{ $Reservation->id }}').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.allApp').text('');
                        $(form).find('span.AllappApproved').text('');
                        $(form).find('span.sets').text('');
                        $(form).find('span.NearDate').text('');
                    },
                    success: function(data) {

                        $(form).find('span.allApp').text(data.date['AllAppointment']);
                        $(form).find('span.AllappApproved').text(data.date['AllApprovedAppointment']);
                        $(form).find('span.sets').text(data.date['sets']);
                        $(form).find('span.NearDate').text(data.date['NearDate']);
                        document.getElementById('idnationalNew').value = data.date['Date'];



                    }
                });
            });
        </script>
    @endforeach

@endsection
