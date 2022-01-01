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
            <div id="backdiv">

                <button id="back" class="btn btn-light" onclick="history.back()"> <i class="fa fa-arrow-right"
                        aria-hidden="true"></i> </button>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            {{ __('AppReservation.title') }} </div>


                        <div class="card-body">
                            <form method="POST" action="{{ route('NewAppointment') }}">
                                @csrf
                                <input type="text" name="NID" readonly required hidden value="{{ $all['NID'] }}">

                                <div class="form-group row">

                                    <input id="idnational" type="text" name="Name" class="form-control"
                                        placeholder="{{ __('AppReservation.name') }}"
                                        value="{{ $all['user_info'] == null ? null : $all['user_info']->Name }}" required>
                                </div>
                                <div class="form-group row">
                                    <label id="idnational"> {{ __('AppReservation.Date') }}</label> <br>
                                    <!--  <input id="idnational" value="<?php echo Date('Y-m-d\TH:i', time()); ?>" type="datetime-local"
                                                                                                                                                                                                            name="Appointment" min="2021-06-01T10:00" max="2030-07-30T20:00"> -->

                                    <input id="idnational" value="<?php echo Date('Y-m-d', time()); ?>" type="date" name="Appointment"
                                        min="<?php echo Date('Y-m-d', time()); ?>" max="2030-07-30">


                                </div>

                                <div style="margin-left: 40%;  direction: ltr">
                                    <input type="radio" style="margin-right: 2%" onclick="javascript:yesnoCheck();"
                                        name="type" id="yesteeth" class="second" value="1">
                                    <span class="wrap"><strong>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عيادة جلدية', 'en' => 'Dermatology']) }}</strong></span>

                                    <input type="radio" style="margin-right: 2%" onclick="javascript:yesnoCheck();"
                                        name="type" id="yesSken" class="second" value="2">
                                    <span class="wrap"><strong>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عيادة اسنان', 'en' => 'Dental']) }}</strong></span>
                                </div>
                                <!-- Dermatology -->
                                <div style="display: none" id="ifYes" class="form-group row">
                                    <select class="form-select" id="idnational" name="ServiceDermatology"
                                        aria-label="Default select example">
                                        <option selected disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عروض', 'en' => 'Discount']) }}
                                        </option>
                                        @foreach ($all['discount'] as $discount)
                                            <option value="D{{ $discount->id }}">{{ $discount->title_ar }}</option>
                                        @endforeach
                                        <option disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات', 'en' => 'Service']) }}
                                        </option>

                                        @foreach ($all['dermatology'] as $dermatology)
                                            <option value="S{{ $dermatology->id }}">{{ $dermatology->Name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Dental -->
                                <div style="display: none" id="ifNO" class="form-group row">
                                    <select class="form-select" id="idnational" name="ServiceDental"
                                        aria-label="Default select example">
                                        <option selected disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'عروض', 'en' => 'Discount']) }}
                                        </option>
                                        @foreach ($all['discount'] as $discount)
                                            <option value="D{{ $discount->id }}">{{ $discount->title_ar }}</option>
                                        @endforeach
                                        <option disabled>
                                            {{ __('AppReservation.titleSelect, :Lang', ['ar' => 'خدمات ', 'en' => 'Service']) }}
                                        </option>

                                        @foreach ($all['dental'] as $dental)
                                            <option value="S{{ $dental->id }}">{{ $dental->Name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <br>
                                <div class="form-group row">

                                    <input id="idnational" type="text" name="Phone" class="form-control"
                                        value="{{ $all['user_info'] == null ? null : $all['user_info']->Phone }}"
                                        placeholder="{{ __('AppReservation.phone') }}  " required>
                                </div>
                                <br>
                                <div class="form-group row mb-0">

                                    <button type="submit" class="btn btn-outline-info" id="idnational">
                                        {{ __('AppReservation.submit') }}

                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
