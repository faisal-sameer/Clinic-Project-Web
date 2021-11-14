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
            
    <input class="btn btn-success" type="button" id="Update"   value="تحديث"/>
    <input class="btn btn-info" type="button" id="New"  value="جديد "/>
    <input class="btn btn-danger" type="button" id="delete"  value="حذف"/>

          <div id="updateform">
           
            <div id="mangrow" class="row"> 

            <div  class="select-box">
                <div class="select-box__current" tabindex="1">
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked"/>
                    <p class="select-box__input-text">العروض</p>
                  </div>
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="1" value="2" name="Ben" />
                    <p class="select-box__input-text">الخدمات</p>
                  </div>
                  <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2" value="3" name="Ben" />
                    <p class="select-box__input-text">الاطباء</p>
                  </div>
             
                 <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                </div>
                <ul class="select-box__list">
                  <li>
                    <label class="select-box__option" for="0" id="discount" aria-hidden="aria-hidden">العروض</label>
                  </li>
                  <li>
                    <label class="select-box__option" for="1" id="Service" aria-hidden="aria-hidden">الخدمات</label>
                  </li>
                  <li>
                    <label class="select-box__option" for="2" id="doctor" aria-hidden="aria-hidden">الاطباء</label>
                  </li>
                </ul>
              </div>      
            </div>
            
        <div  id="mangrow3" class="row"> 
          <textarea placeholder=" ... كلمة مدير المستشفى " class="shadow-drop-2-center-hidden"   name="Edit" id="managertextarea" cols="100" rows="10"></textarea>
          
          </div>
          <div id="mangrow2"   class="row">
            <button id="updateB" type="submit" class="btn btn-info">تحديث</button>
    
        </div>

          </div>
         
         
         
            </div>
    </div>
@endsection
@section('script')
    
<script>
    document.getElementById("discount").addEventListener("click", myFunctionDiscount);//ليبل العروض
    document.getElementById("Service").addEventListener("click", myFunctionService);//ليبل الخدمات
    document.getElementById("doctor").addEventListener("click", myFunctiondoctor);//ليبل الاطباء

    document.getElementById("Update").addEventListener("click", myFunctionUpdate);//زر التحديث
    document.getElementById("New").addEventListener("click", myFunctionNew);
    document.getElementById("managertextarea").style.display = "none";  //hide
    document.getElementById("updateform").style.display = "none";  //hide
    document.getElementById("newform").style.display = "none";  //hide
    document.getElementById("updateB").style.display = "none";  //hide
    
    document.getElementById("mangrow1").style.display = "none";  //hide

 function myFunctionUpdate(){
    document.getElementById("updateform").style.display = "block";  //hide
    document.getElementById("newform").style.display = "none";  //hide
 }
 function myFunctionNew(){
  document.getElementById("updateB").style.display = "none";  //hide

    document.getElementById("updateform").style.display = "none";  //hide
    document.getElementById("newform").style.display = "block";  //hide
 }
 function myFunctionDiscount() {//العروض
  var contents = @json($content);


	document.getElementById("managertextarea").style.display = "block"; //show
   document.getElementById("managertextarea").innerText = contents.discount;
   document.getElementById("updateB").style.display = "block";  //hide

 }

 function myFunctionService() {//الخدمات
  var contents = @json($content);

   document.getElementById("managertextarea").style.display = "block"; //show
   document.getElementById("managertextarea").innerText   = contents.service;
   document.getElementById("updateB").style.display = "block";  //hide

 }
 
 function myFunctiondoctor() {//الاطباء
  var contents = @json($content);

	document.getElementById("managertextarea").style.display = "block"; //show
  document.getElementById("managertextarea").innerText  = contents.doctor;

  document.getElementById("updateB").style.display = "block";  //hide
 }
     </script>
@endsection
