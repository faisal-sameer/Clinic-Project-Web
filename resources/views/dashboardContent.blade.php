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
            <div  class="select-box">
                <div class="select-box__current" tabindex="1">
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked"/>
                    <p class="select-box__input-text">اسم المدير</p>
                  </div>
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="1" value="2" name="Ben" checked="checked"/>
                    <p class="select-box__input-text">كلمة المدير</p>
                  </div>
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2" value="3" name="Ben" checked="checked"/>
                    <p class="select-box__input-text">الصورة</p>
                  </div>
             
                 <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                </div>
                <ul class="select-box__list">
                  <li>
                    <label class="select-box__option" for="0" aria-hidden="aria-hidden">اسم المدير</label>
                  </li>
                  <li>
                    <label class="select-box__option" for="1" aria-hidden="aria-hidden">كلمة المدير</label>
                  </li>
                  <li>
                    <label class="select-box__option" for="2" aria-hidden="aria-hidden">الصورة</label>
                  </li>
                </ul>
              </div>         </div>
    </div>
@endsection