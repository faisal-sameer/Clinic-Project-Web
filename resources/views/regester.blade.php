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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="text-align: center">{{ __('احجز موعد جديد') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('NewAppointment') }}">
                                @csrf
                                <input type="text" name="NID" readonly required hidden value="{{ $all['NID'] }}">

                                <div class="form-group row">

                                    <input id="idnational" type="text" name="Name" class="form-control" placeholder="الاسم"
                                        required>
                                </div>
                                <div class="form-group row">

                                    <label id="idnational">اختر اليوم والوقت</label> <br>
                                    <input id="idnational" type="datetime-local" name="Appointment" min="2021-06-01T10:00"
                                        max="2030-07-30T20:00">


                                </div>

                                <div class="form-group row">

                                    <select class="form-select" id="idnational" name="Service"
                                        aria-label="Default select example">

                                        @foreach ($all['services'] as $service)

                                            <option value="{{ $service->id }}">{{ $service->Name }}</option>

                                        @endforeach



                                    </select>


                                </div>
                                <div class="form-group row">

                                    <input id="idnational" type="text" name="Phone" class="form-control"
                                        placeholder="رقم الجوال" required>


                                </div>



                                <br>


                                <div class="form-group row mb-0">

                                    <button type="submit" class="btn btn-outline-info" id="idnational">احجز

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