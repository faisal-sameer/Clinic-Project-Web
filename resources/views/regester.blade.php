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
                      
    
    
                            <div class="form-group row">
    
                                    <input id="idnational" type="text"  class="form-control" placeholder="الاسم"  required >
    
                               
                            </div>
                            
                            
                            <div class="form-group row">
    
                                <label id="idnational" >اختر اليوم والوقت</label> <br>                                   
                                    <input id="idnational"  type="datetime-local" 
                                    name="meeting-time" 
                                    min="2021-06-01T10:00" max="2021-07-30T20:00" >
    
                               
                            </div>
                            
                            <div class="form-group row">
    
                                    <select class="form-select" id="idnational" aria-label="Default select example">
                                        <option selected>اختر الخدمة التي تريدها</option>
                                        <option value="1"></option>
                                        <option value="2"></option>
                                        <option value="3"></option>
                                      </select>
    
                               
                            </div>
                            <div class="form-group row">
    
                                    <input id="idnational" type="text"  class="form-control" placeholder="رقم الجوال"  required >
    
                               
                            </div>
                            
                            
    
                            <br>
                          
    
                            <div class="form-group row mb-0">
                               
                                    <a  class="btn btn-outline-info" id="idnational" href="/dashboardUser">احجز
    
                                    </a>
    
                           
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
