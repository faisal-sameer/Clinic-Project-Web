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
        <div class="container" id="container">

            <input class="btn btn-success" type="button" id="Update" value="تحديث" />
            <input class="btn btn-info" type="button" id="New" value="جديد " />
            <input class="btn btn-danger" type="button" id="delete" value="حذف" />

            <div id="updateForm">

                <div id="mangrow" class="form-inline">


                    <div class="select-box" id="select1" style="width: 40%; margin-right: 20%">
                        <div class="select-box__current" tabindex="1">
                            <div class="select-box__value">
                                <input class="select-box__input" value="121" type="radio" id="discount" name="Ben"
                                    checked="checked" />
                                <p class="select-box__input-text">العروض</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="service" name="Ben" />
                                <p class="select-box__input-text">الخدمات</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="doctor" name="Ben" />
                                <p class="select-box__input-text">الاطباء</p>
                            </div>

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="discount" id="discount"
                                    aria-hidden="aria-hidden">العروض</label>
                            </li>
                            <li>
                                <label class="select-box__option" for="service" id="Service"
                                    aria-hidden="aria-hidden">الخدمات</label>
                            </li>
                            <li>
                                <label class="select-box__option" for="doctor" id="doctor"
                                    aria-hidden="aria-hidden">الاطباء</label>
                            </li>
                        </ul>
                    </div>

                    <div class="select-box" id="selectDiscount" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="discount"
                                    checked="checked" />
                                <p class="select-box__input-text">اختار</p>
                            </div>
                            @foreach ($content['discount'] as $discount)

                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id="{{ $discount->id }}" value="4"
                                        name="discount" />
                                    <p class="select-box__input-text">{{ $discount->title }}</p>
                                </div>
                            @endforeach

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">اختار</label>
                            </li>
                            @foreach ($content['discount'] as $discount)
                                <li>
                                    <label class="select-box__option" for="{{ $discount->id }}"
                                        id="Subdiscount{{ $discount->id }}"
                                        aria-hidden="aria-hidden">{{ $discount->title }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="select-box" id="selectService" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="service"
                                    checked="checked" />
                                <p class="select-box__input-text">اختار</p>
                            </div>
                            @foreach ($content['service'] as $service)

                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id="{{ $service->id }}" value="4"
                                        name="service" />
                                    <p class="select-box__input-text">{{ $service->Name }}</p>
                                </div>
                            @endforeach

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">اختار</label>
                            </li>
                            @foreach ($content['service'] as $service)
                                <li>
                                    <label class="select-box__option" for="{{ $service->id }}"
                                        id="Subservice{{ $service->id }}"
                                        aria-hidden="aria-hidden">{{ $service->Name }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>


                    <div class="select-box" id="selectDoctor" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="doctor"
                                    checked="checked" />
                                <p class="select-box__input-text">اختار</p>
                            </div>
                            @foreach ($content['doctor'] as $doctor)

                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id="{{ $doctor->id }}" value="4"
                                        name="doctor" />
                                    <p class="select-box__input-text">{{ $doctor->user->name }}</p>
                                </div>
                            @endforeach

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">اختار</label>
                            </li>
                            @foreach ($content['doctor'] as $doctor)
                                <li>
                                    <label class="select-box__option" for="{{ $doctor->id }}"
                                        id="Subdoctor{{ $doctor->id }}"
                                        aria-hidden="aria-hidden">{{ $doctor->user->name }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>

            </div>
            <div class="row" id="formEditServices">
                <form method="POST" id="formTag" action="{{ route('Update') }}" enctype="multipart/form-data">
                    @csrf
                    <textarea placeholder="id" class="shadow-drop-2-center" readonly
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="id" id="id" cols="1"
                        rows="1"></textarea>
                    <textarea placeholder="type" class="shadow-drop-2-center" readonly
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="type" id="typeText"
                        cols="1" rows="1"></textarea>
                    <div id="UpdateinfoDiscount" class="row">

                        <textarea placeholder="العنوان" class="shadow-drop-2-center textAF"
                            style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="DisTitle" id="DisTitle"
                            cols="1" rows="1"></textarea>

                        <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... وصف العرض "
                            class="shadow-drop-2-center textAF" id="DisText" name="DisText" cols="100" rows="5"></textarea>

                        <textarea placeholder="السعر " class="shadow-drop-2-center textAF"
                            style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="DisPrice" id="DisPrice"
                            cols="1" rows="1"></textarea>
                        <button id="updateB" type="submit" class="btn btn-info">تحديث</button>

                    </div>

                    <div id="UpdateinfoServie">
                        <div class="row">


                            <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... وصف الخدمة  "
                                class="shadow-drop-2-center" name="name" id="managertextarea" cols="100"
                                rows="5"></textarea>
                            <textarea placeholder="التسعيرة " class="shadow-drop-2-center"
                                style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="price"
                                id="managertextarea1" cols="1" rows="1"></textarea>

                        </div>
                        <br><br>

                        <br><br>
                        <button id="updateB" type="submit" class="btn btn-info">تحديث</button>

                    </div>
                    <div id="UpdateinfoDoctor" class="row">
                        <textarea placeholder="الاسم الكامل  " class="shadow-drop-2-center textAF"
                            style="text-align: right ;  width: 20%  ;height: 5%" name="DoctorName" id="DoctorName" cols="1"
                            rows="1"></textarea>
                        <textarea placeholder="البريد الالكتروني " class="shadow-drop-2-center textAF"
                            style="text-align: right ;  width: 20%  ;height: 5%" name="email" id="email" cols="1"
                            rows="1"></textarea>
                        <input placeholder="كلمة المرور " type="password" class="shadow-drop-2-center textAF"
                            style="text-align: right ;  width: 20%  ;height: 5% ;" name="DoctorPassword"
                            id="DoctorPassword">

                        <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... نبذة عن الطبيب  "
                            class="shadow-drop-2-center textAF" name="DoctorInfo" id="DoctorInfo" cols="100"
                            rows="5"></textarea>
                        <div id="filerow" style="margin-left:40%; " class="row">
                            <input type="file" class="foo" name="DoctorImg" id="fileInput"
                                onchange="readURL(this);">
                            <img id="blahDoctor" src="#" alt="your image" />
                        </div>
                        <button id="updateB" type="submit" class="btn btn-info">تحديث</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        document.getElementById("updateB").addEventListener("click", function() {
            //  document.getElementById("typeText").innerText = 3;

        });
        document.getElementById("discount").addEventListener("click", function() {
            const val = document.getElementById("discount").value;

            myFunctionDiscount(val);
        }); //ليبل العروض
        document.getElementById("Service").addEventListener("click", function() {
            const val = document.getElementById('service').value;

            myFunctionService(val);
        }); //ليبل الخدمات
        document.getElementById("doctor").addEventListener("click", function() {
            const val = document.getElementById('doctor').value;
            myFunctiondoctor(val);
        }); //ليبل الاطباء

        @foreach ($content['discount'] as $discount)
            document.getElementById("Subdiscount{{ $discount->id }}").addEventListener("click",
            function(){
            myFunctionSubDiscount({{ $discount->id }});
            });
        @endforeach
        @foreach ($content['service'] as $service)
            document.getElementById("Subservice{{ $service->id }}").addEventListener("click",
            function(){
            myFunctionSubService({{ $service->id }});
            });
        @endforeach
        @foreach ($content['doctor'] as $doctor)
            document.getElementById("Subdoctor{{ $doctor->id }}").addEventListener("click",
            function(){
            myFunctionSubdoctor({{ $doctor->id }});
            });
        @endforeach

        document.getElementById("Update").addEventListener("click", myFunctionUpdate); //زر التحديث
        document.getElementById("New").addEventListener("click", myFunctionNew);

        document.getElementById("formEditServices").style.display = "none"; //hide
        document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide
        document.getElementById("UpdateinfoServie").style.display = "none"; //hide
        document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide

        document.getElementById("updateForm").style.display = "none"; //hide


        function myFunctionUpdate() {
            var frm = document.getElementById('formTag') || null;
            if (frm) {
                frm.action = '{{ route('Update') }}'
            }
            var num = document.getElementById("discount").value = 2;
            var num = document.getElementById("service").value = 2;
            var num = document.getElementById("doctor").value = 2;
            document.getElementById("formEditServices").style.display = "none"; //hide
            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide
            document.getElementById("updateB").innerText = "تحديث";

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateForm").style.display = "block"; //hide

        }

        function myFunctionNew() {
            var frm = document.getElementById('formTag') || null;
            if (frm) {
                frm.action = '{{ route('New') }}'
            }
            var num = document.getElementById("discount").value = 1;
            var num = document.getElementById("service").value = 1;
            var num = document.getElementById("doctor").value = 1;
            document.getElementById("updateB").innerText = "انشاء";

            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateForm").style.display = "block"; //hide

        }

        function myFunctionDiscount($type) { //العروض

            if ($type == 1) {
                document.getElementById("typeText").innerText = 1;

                document.getElementById("formEditServices").style.display = "block"; //hide

                document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide
                document.getElementById("UpdateinfoServie").style.display = "none"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "block"; //hide
            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide

                document.getElementById("selectService").style.display = "none"; //hide
                document.getElementById("selectDoctor").style.display = "none"; //hide
                document.getElementById("selectDiscount").style.display = "block"; //hide
            }
        }

        function myFunctionSubDiscount($id) { //العروض
            var contents = @json($content);
            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');

            document.getElementById("typeText").innerText = 1;
            document.getElementById("formEditServices").style.display = "block"; //hide

            document.getElementById("UpdateinfoDiscount").style.display = "block"; //hide
            document.getElementById("UpdateinfoServie").style.display = "none"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide


            document.getElementById("DisTitle").innerText = contents.discount[$id - 1].title;
            document.getElementById("DisText").innerText = contents.discount[$id - 1].text;
            document.getElementById("DisPrice").innerText = contents.discount[$id - 1].Price;

            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 1;

        }

        function myFunctionService($type) { //الخدمات

            if ($type == 1) {
                document.getElementById("typeText").innerText = 2;

                document.getElementById("formEditServices").style.display = "block"; //hide

                document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide
                document.getElementById("UpdateinfoServie").style.display = "block"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide


            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide
                document.getElementById("selectDiscount").style.display = "none"; //hide
                document.getElementById("selectDoctor").style.display = "none"; //hide
                document.getElementById("selectService").style.display = "block"; //hide
            }
        }

        function myFunctionSubService($id) { //الخدمات

            var contents = @json($content);
            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 2;

            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');
            document.getElementById("formEditServices").style.display = "block"; //hide
            document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide
            document.getElementById("UpdateinfoServie").style.display = "block"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide

            document.getElementById("managertextarea").innerText = contents.service[$id - 1].Name;
            document.getElementById("managertextarea1").innerText = contents.service[$id - 1].Price;
            //document.getElementById("updateB").style.display = "block"; //hide

        }

        function myFunctiondoctor($type) { //الاطباء
            if ($type == 1) {
                document.getElementById("typeText").innerText = 3;
                document.getElementById("formEditServices").style.display = "block"; //hide

                document.getElementById("UpdateinfoDoctor").style.display = "block"; //hide
                document.getElementById("UpdateinfoServie").style.display = "none"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide


            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide

                document.getElementById("selectDiscount").style.display = "none"; //hide
                document.getElementById("selectService").style.display = "none";
                document.getElementById("selectDoctor").style.display = "block"; //hide

            }
        }

        function myFunctionSubdoctor($id) { //الاطباء
            document.getElementById("formEditServices").style.display = "block"; //hide

            document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide
            document.getElementById("UpdateinfoServie").style.display = "none"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "block"; //hide

            document.getElementById("formEditServices").style.display = "block"; //hid
            var contents = @json($content);
            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');

            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 3;
            alert(contents.doctor[$id - 1].path);
            document.getElementById("DoctorName").innerText = contents.doctor[$id - 1].user.name;
            document.getElementById("email").innerText = contents.doctor[$id - 1].user.email;
            document.getElementById("DoctorInfo").innerText = contents.doctor[$id - 1].info;
            document.getElementById('blahDoctor').src = "../" + contents.doctor[$id - 1].path;

        }
    </script>

@endsection
