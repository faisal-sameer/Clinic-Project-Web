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
                                                @if ($reservation->Status == 1)

                                                    <div id="dailogs">

                                                        <button type="submit" data-toggle="modal"
                                                            data-target="#exampleModal{{ $reservation->id }}"
                                                            class="btn btn-warning"> {{ __('UserDashboard.EditB') }}
                                                        </button>

                                                    </div>
                                                @elseif($reservation->Status == 7)



                                                        <button type="submit" data-toggle="modal" style="width:margin-left:90%"
                                                            data-target="#exampleModalNeedToApproved{{ $reservation->id }}"
                                                            class="btn btn-info"> {{ __('UserDashboard.ApprovedApp') }}
                                                        </button>

                                                @endif


                                                <br><br>
                                            </td>
                                            <td colspan="2" id="texttab" style="text-align: center">
                                                @if ($reservation->Status == 1)
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار الموافقة', 'en' => 'Waiting for Approve']) }}
                                                @elseif($reservation->Status == 2 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة ', 'en' => 'Approved']) }}
                                                @elseif($reservation->Status == 3 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'مرفوض', 'en' => 'Rejected ']) }}
                                                @elseif($reservation->Status == 4 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'في العيادة', 'en' => 'Arraive']) }}
                                                @elseif($reservation->Status == 5 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'انتهت الجلسة ', 'en' => 'Completed  ']) }}
                                                @elseif($reservation->Status == 6 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'لم يحظر ', 'en' => 'Did not come ']) }}
                                                @elseif($reservation->Status == 7 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'في انتظار موافقتك  ', 'en' => 'Need your Approval']) }}
                                                @elseif($reservation->Status == 8 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'تمت الموافقة على الموعد', 'en' => 'Appointment accpeted  ']) }}
                                                @elseif($reservation->Status == 9 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'تم رفض الموعد من قبل المراجع', 'en' => 'Appointment Rejected from Patient ']) }}

                                                @elseif($reservation->Status == 10 )
                                                    {{ __('UserDashboard.Status, :lang', ['ar' => 'انتهاء الموعد', 'en' => 'Appointment has been Expart ']) }}

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
                                                                <input id="idnational" type="date"
                                                                    value="{{ $reservation->Date }}" name="Appointment"
                                                                    min="2021-06-01" max="2030-07-30">


                                                            </div>


                                                            <div class="form-group row">

                                                                <select class="form-select" id="idnational"
                                                                    name="Service" aria-label="Default select example">
                                                                    <option selected disabled>
                                                                        {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عروض', 'en' => 'Discount']) }}
                                                                    </option>
                                                                    @foreach ($all['discount'] as $discount)
                                                                        <option value="D{{ $discount->id }}">
                                                                            {{ $discount->title_ar }}</option>
                                                                    @endforeach
                                                                    <option disabled>
                                                                        {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات', 'en' => 'Service']) }}
                                                                    </option>
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



                                        <div class="modal fade" id="exampleModalNeedToApproved{{ $reservation->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title justify-content-center "
                                                            id="exampleModalLabel">
                                                            {{ __('UserDashboard.ApprovedApp') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <form method="POST" id="formTag{{ $reservation->id }}"
                                                            action="{{ route('ApprovedApp') }}">
                                                            @csrf
                                                            <input type="text" name="id" readonly required hidden
                                                                value="{{ $reservation->id }}">
                                                            <div class="form-group justify-content-center">
                                                                <p>{{ __('UserDashboard.date') }} : {{ $reservation->Date }}</p><br>  </div>                                            </div>
                                                            <div class='row '>
                                                                      <div class="col-md-6">  
                                                                <input class="btn btn-danger" type="submit" style="float: right;"
                                                                    id="delete{{ $reservation->id }}" value="{{ __('UserDashboard.Reject') }}" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                <button type='submit' style="float: left" 
                                                                    class='btn btn-success'>     {{ __('UserDashboard.ApprovedApp') }}
                                                                </button>
                                                            </div>
                                                            </div>
                                                            <br>
                                                        </form>

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


@section('script')

@if ($all['data'] == 0)

@else
    @foreach ($all['reservations'] as $reservation)

        <script>
            document.getElementById("delete{{ $reservation->id }}").addEventListener("click", function() {


                    frm.action = '{{ route('PatientRejected') }}';
                });
            </script>
        @endforeach
    @endif
@endsection
