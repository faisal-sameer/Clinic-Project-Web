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
                        <button id="adduser" class="btn btn-light" type="submit"> {{ __('UserDashboard.NewApp') }} <i
                                class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table id="myTable" class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th colspan="1"> {{ __('UserDashboard.action') }}</th>
                                <th colspan="2"> {{ __('UserDashboard.StatusT') }}</th>
                                <th colspan="2"> {{ __('UserDashboard.service') }}</th>
                                <th colspan="2" scope="col"> {{ __('UserDashboard.Shift') }}</th>
                                <th colspan="2" scope="col">{{ __('UserDashboard.Date') }}</th>
                                <th colspan="2" scope="col">{{ __('UserDashboard.Name') }}</th>

                            </tr>
                        </thead>
                        @if ($all == 0)


                            <tr>

                                <td colspan="10"><strong> {{ __('UserDashboard.NoData') }}</strong> </td>


                            </tr>
                        @else

                            <tbody>

                                @if ($all['data'] == 0)

                                @else
                                    @foreach ($all['reservations'] as $reservation)



                                        <tr>
                                            <td colspan="1" id="texttab" style="text-align: center">

                                                <div id="dailogs">

                                                    <input type="number" value="{{ $reservation->id }}" name="id"
                                                        readonly hidden required />
                                                    <button type="submit" data-toggle="modal"
                                                        data-target="#exampleModal{{ $reservation->id }}"
                                                        class="btn btn-warning"> {{ __('UserDashboard.EditB') }} </button>

                                                </div>
                                                <br><br>
                                            </td>
                                            <td colspan="2" id="texttab" style="text-align: center">
                                                @if ($reservation->Status == 1)
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}
                                                @elseif($reservation->Status == 2 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'في صالة الانتظار ', 'en' => 'Waiting Room']) }}
                                                @elseif($reservation->Status == 3 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'لم تحضر', 'en' => 'Did not come ']) }}
                                                @elseif($reservation->Status == 4 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'انهيت الجسلة', 'en' => 'finished']) }}
                                                @elseif($reservation->Status == 5 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}
                                                @elseif($reservation->Status == 6 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'غادرت', 'en' => 'Leave']) }}
                                                @elseif($reservation->Status == 7 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'انهيت الجلسة بدون موعد', 'en' => 'Leave without Appointment']) }}
                                                @endif
                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ $reservation->service == null ? $reservation->discount->title_ar : $reservation->service->Name_ar }}
                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ $reservation->service['id'] }} Shift


                                            </td>

                                            <td colspan="2" id="texttab" style="text-align: center">
                                                {{ $reservation->Date }}
                                            </td>
                                            <td style="text-align: center" colspan="2" id="texttab">
                                                {{ $reservation->Name }}</td>

                                        </tr>

                                        <div class="modal fade" id="exampleModal{{ $reservation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('UserDashboard.EditApp') }}
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
                                                                    class="form-control"
                                                                    placeholder=" {{ __('UserDashboard.AppName') }}"
                                                                    value="{{ $reservation->Name }}">
                                                            </div>
                                                            <div class="form-group row">

                                                                <label id="idnational">
                                                                    {{ __('UserDashboard.AppDate') }}</label> <br>
                                                                <input id="idnational" type="datet"
                                                                    value="{{ $reservation->Date }}" name="Appointment"
                                                                    min="2021-06-01" max="2030-07-30">


                                                            </div>

                                                            <div class="form-group row">

                                                                <select class="form-select" id="idnational"
                                                                    name="Service" aria-label="Default select example">
                                                                    <option selected disabled>Discount</option>

                                                                    @foreach ($all['discount'] as $discount)

                                                                        <option value="D{{ $discount->id }}">
                                                                            {{ $discount->title_ar }}</option>

                                                                    @endforeach
                                                                    <option disabled>Service</option>

                                                                    @foreach ($all['services'] as $service)

                                                                        <option value="S{{ $service->id }}">
                                                                            {{ $service->Name_ar }}</option>

                                                                    @endforeach



                                                                </select>


                                                            </div>
                                                            <div class="form-group row">

                                                                <input id="idnational" type="text" name="Phone"
                                                                    class="form-control"
                                                                    placeholder=" {{ __('UserDashboard.AppPhone') }}"
                                                                    value="{{ $reservation->Phone }}" required>


                                                            </div>

                                                            <br>

                                                            <div class="form-group row mb-0">

                                                                <button type="submit" class="btn btn-outline-info"
                                                                    id="idnational"> {{ __('UserDashboard.AppUpdate') }}

                                                                </button>


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                            {{ __('UserDashboard.AppClose') }}</button>

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
