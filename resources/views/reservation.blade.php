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
                <div class="card-header" style="text-align: center">{{ __('احجز موعدك') }}</div>

                <div class="card-body">
                  


                        <div class="form-group row">

                            <div class="col-md-6" id="idnational1">
                                <input id="idnational" type="text" maxlength="10" minlength="10" class="form-control" placeholder="ادخل رقم هويتك"  required >

                           
                            </div>
                        </div>

                        <br>
                      

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" id="next">
                                <button id="sub" type="submit" class="btn btn-primary">
                                    {{ __('التالي') }}
                                </button>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
