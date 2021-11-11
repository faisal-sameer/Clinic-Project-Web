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


                <a href="/FutureAppointments" class="btn btn-outline-light"> {{ __('ReservationDashboard.Future') }} </a>

                <a href="/TodayAppointments" class="btn btn-outline-light"> {{ __('ReservationDashboard.Today') }}</a>
                <a href="/PastAppointments" class="btn btn-outline-light"> {{ __('ReservationDashboard.Past') }}</a>

            </div>

            <div id="London" class=" city">
                <br>
                <h2> {{ __('ReservationDashboard.Today') }}</h2>

                <input type="text" id="myInput0" onkeyup="myFunction()" placeholder="Search for names.."
                    title="Type in a name">

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
                            @foreach ($Reservations as $Reservation)
                                <tr>
                                    <td colspan="2">
                                        @if ($Reservation->Status == 1)
                                            <div id="dailogs3">

                                                <form method="POST" action="{{ route('Coming') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />

                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'وصول', 'en' => 'Arrive']) }}</button>
                                                </form>

                                            </div>
                                            <br>
                                            <br>
                                            <div id="dailogs4">
                                                <form method="POST" action="{{ route('DidCome') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" class="btn btn-warning">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'لم يحضر', 'en' => 'Did not Arrived']) }}</button>
                                                </form>
                                            </div>
                                            <br><br>
                                        @elseif($Reservation->Status == 5 )
                                            <div style="margin:auto">
                                                <form method="POST" action="{{ route('Complete') }}">
                                                    @csrf
                                                    <input type="number" value="{{ $Reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('ReservationDashboard.Status, :lang', ['ar' => 'انهاء الجلسة', 'en' => 'Completed']) }}</button>
                                                </form>
                                            </div>
                                            <br>

                                        @endif
                                    </td>
                                    <td colspan="1" id="texttab">

                                        @if ($Reservation->Status == 1)

                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}

                                        @elseif($Reservation->Status == 2 )
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'في صالة الانتظار ', 'en' => 'Waiting Room']) }}
                                        @elseif($Reservation->Status == 3 )
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'لم تحظر', 'en' => 'Did not come ']) }}
                                        @elseif($Reservation->Status == 4 )
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'انهيت الجسلة', 'en' => 'finished']) }}
                                        @elseif($Reservation->Status == 5 )
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}

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
