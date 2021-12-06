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
                <h2> {{ __('ReservationDashboard.Future') }}</h2>

                <input type="text" id="myInput2" onkeyup="myFunction2()"
                    placeholder="{{ __('ReservationDashboard.search, :lang', ['ar' => '....البحث بالهوية الوطنية', 'en' => 'Search By National ID.....']) }}"
                    title="Type in a name">

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
                            @foreach ($Reservations as $Reservation)
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
                                        @if ($Reservation->Status == 5)
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}
                                        @elseif($Reservation->Status == 9)
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'مرفوض', 'en' => 'Rejected']) }}

                                        @else
                                            {{ __('ReservationDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}
                                        @endif
                                    </td>

                                    <td colspan="2" id="texttab">
                                        {{ $Reservation->service == null ? $Reservation->discount->title_ar : $Reservation->service['Name_ar'] }}
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




        </div>
    </div>
@endsection
