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
                        <div class="card-header" style="text-align: center"> {{ __('reservation.title') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('NewReservation') }}">
                                @csrf

                                <div class="form-group row">
                                    <input id="idnational" type="text" name="NID" maxlength="12" minlength="10"
                                        class="form-control" placeholder=" {{ __('reservation.NID') }} " required>
                                    <input type="number" readonly required hidden value="0" name="page">
                                </div>
                                <br>
                                <div class="form-group row mb-0">
                                    <button class="btn btn-outline-info" type="submit">
                                        {{ __('reservation.Next') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
