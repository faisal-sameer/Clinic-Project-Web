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

            <input class="btn btn-success" type="button" id="Update" value="{{ __('dashboardContent.Update') }}" />
            <input class="btn btn-info" type="button" id="New" value="{{ __('dashboardContent.New') }} " />
            <input class="btn btn-danger" type="button" id="delete" value="{{ __('dashboardContent.Delete') }}" />

            <div id="updateForm">

                <div id="mangrow" class="form-inline">


                    <div class="select-box  " id="select1" style="width: 40%;  margin-right: 20%">
                        <div class="select-box__current" tabindex="1">
                            <div class="select-box__value">
                                <input class="select-box__input " type="radio" name="Ben" checked="checked" />
                                <p class="select-box__input-text " id="choiceFirst"> {{ __('dashboardContent.Chose') }} </p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="aboutClinic" name="Ben" />
                                <p class="select-box__input-text" id="aboutClinic"> {{ __('dashboardContent.Clinic') }} </p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="discount" name="Ben" />
                                <p class="select-box__input-text">{{ __('dashboardContent.discount') }}</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="service" name="Ben" />
                                <p class="select-box__input-text">{{ __('dashboardContent.service') }}</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="doctor" name="Ben" />
                                <p class="select-box__input-text">{{ __('dashboardContent.doctor') }}</p>
                            </div>

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" id="choiceFirst" aria-hidden="aria-hidden">
                                    {{ __('dashboardContent.Chose') }} </label>
                            </li>
                            <li>
                                <label class="select-box__option" for="aboutClinic" id="aboutClinics"
                                    aria-hidden="aria-hidden"> {{ __('dashboardContent.Clinic') }} </label>
                            </li>
                            <li>
                                <label class="select-box__option" for="discount" id="discount"
                                    aria-hidden="aria-hidden">{{ __('dashboardContent.discount') }}</label>
                            </li>
                            <li>
                                <label class="select-box__option" for="service" id="Service"
                                    aria-hidden="aria-hidden">{{ __('dashboardContent.service') }}</label>
                            </li>
                            <li>
                                <label class="select-box__option" for="doctor" id="doctor"
                                    aria-hidden="aria-hidden">{{ __('dashboardContent.doctor') }}</label>
                            </li>
                        </ul>
                    </div>

                    <div class="select-box" id="selectDiscount" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="discount"
                                    checked="checked" />
                                <p class="select-box__input-text">{{ __('dashboardContent.Chose') }}</p>
                            </div>
                            @foreach ($content['discount'] as $discount)

                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id="{{ $discount->id }}" value="4"
                                        name="discount" />
                                    <p class="select-box__input-text">{{ $discount->title_ar }}</p>
                                </div>
                            @endforeach

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">{{ __('dashboardContent.Chose') }}</label>
                            </li>
                            @foreach ($content['discount'] as $discount)
                                <li>
                                    <label class="select-box__option" for="{{ $discount->id }}"
                                        id="Subdiscount{{ $discount->id }}"
                                        aria-hidden="aria-hidden">{{ $discount->title_ar }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="select-box" id="selectService" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="service"
                                    checked="checked" />
                                <p class="select-box__input-text">{{ __('dashboardContent.Chose') }}</p>
                            </div>
                            @foreach ($content['service'] as $service)

                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id="{{ $service->id }}" value="4"
                                        name="service" />
                                    <p class="select-box__input-text">{{ $service->Name_ar }}</p>
                                </div>
                            @endforeach

                            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                alt="Arrow Icon" aria-hidden="true" />
                        </div>
                        <ul class="select-box__list">
                            <li>
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">{{ __('dashboardContent.Chose') }}</label>
                            </li>
                            @foreach ($content['service'] as $service)
                                <li>
                                    <label class="select-box__option" for="{{ $service->id }}"
                                        id="Subservice{{ $service->id }}"
                                        aria-hidden="aria-hidden">{{ $service->Name_ar }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>


                    <div class="select-box" id="selectDoctor" style="width: 40%">
                        <div class="select-box__current" tabindex="2">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="0" value="4" name="doctor"
                                    checked="checked" />
                                <p class="select-box__input-text">{{ __('dashboardContent.Chose') }}</p>
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
                                <label class="select-box__option" for="0" id="0" aria-hidden="aria-hidden">{{ __('dashboardContent.Chose') }}</label>
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
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5% ;" name="id" id="id" cols="1"
                        rows="1"></textarea>
                    <!--لاظهار الاي دي    display: none;  -->
                    <textarea placeholder="type" class="shadow-drop-2-center" readonly
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%; " name="type" id="typeText"
                        cols="1" rows="1"></textarea>
                    <!--لاظهار نوع اللست سواء طبيب أو عروض أو الخ-->

                    <div id="UpdateinfoAbout" class="row">
                        <!--تحديث معلومات العيادة-->


                        <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" {{ __('dashboardContent.about') }}"
                            class="shadow-drop-2-center textAF" id="AboutText" name="AboutText" cols="100"
                            rows="5"></textarea>


                        <div id="filerow" style="margin-left:40%; " class="row">
                            <input type="file" class="foo" name="AboutImg" id="fileInputAbout"
                                onchange="readURL(this);">
                            <img id="blahAbout" style="height: 25%; width: 25%" src="#" alt="your image" />
                        </div>

                        <button id="updateBAbout" type="submit" class="btn btn-info"></button>

                    </div>

                    <div id="UpdateinfoDiscount" class="row">
                        <!--تحديث معلومات العروض-->
                        <div id="doctor-update-content">
                            <textarea placeholder="العنوان" class="shadow-drop-2-center textAF" name="DisTitle"
                                id="DisTitle" cols="1" rows="1"></textarea>
                            <textarea placeholder="السعر " class="shadow-drop-2-center textAF" name="DisPrice" id="DisPrice"
                                cols="1" rows="1"></textarea>
                        </div>

                        <textarea style="margin-left:1%;text-align: right ;height: 30%;" placeholder=" ... وصف العرض "
                            class="shadow-drop-2-center textAF" id="DisText" name="DisText" cols="100" rows="5"></textarea>


                        <button id="updateBDiscount" type="submit" class="btn btn-info"></button>

                    </div>

                    <div id="UpdateinfoServie">
                        <!--تحديث معلومات الخدمات-->
                        <div class="row">
                            <div class="form-group row">

                                <select class="form-select" id="idnational" name="clinic"
                                    aria-label="Default select example">
                                    <option selected disabled>Discount</option>
                                    @foreach ($content['clinics'] as $clinic)

                                        <option value="{{ $clinic->id }}">{{ $clinic->text_ar }}
                                        </option>

                                    @endforeach



                                </select>


                            </div>
                            <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... وصف الخدمة  "
                                class="shadow-drop-2-center" name="name" id="managertextarea" cols="100"
                                rows="5"></textarea>
                            <textarea placeholder="التسعيرة " class="shadow-drop-2-center"
                                style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="price"
                                id="managertextarea1" cols="1" rows="1"></textarea>

                        </div>
                        <br><br>


                        <button id="updateBService" type="submit" style="width: 100%" class="btn btn-info"></button>

                    </div>
                    <div id="UpdateinfoDoctor" class="row">
                        <!--تحديث معلومات الاطباء-->
                        <div id="doctor-update-content">
                            <textarea placeholder="الاسم الكامل  " class="shadow-drop-2-center textAF" name="DoctorName"
                                id="DoctorName" cols="1" rows="1"></textarea>
                            <textarea placeholder="البريد الالكتروني " class="shadow-drop-2-center textAF" name="email"
                                id="email-content" cols="1" rows="1"></textarea>
                        </div>
                        <input placeholder="كلمة المرور " type="password" class="shadow-drop-2-center textAF"
                            style="text-align: right ;  width: 20%  ;height: 5% ;display:none" name="DoctorPassword"
                            id="DoctorPassword">

                        <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... نبذة عن الطبيب  "
                            class="shadow-drop-2-center textAF" name="DoctorInfo" id="DoctorInfo" cols="100"
                            rows="5"></textarea>
                        <div id="filerow" style="margin-left:40%; " class="row">
                            <input type="file" class="foo" name="DoctorImg" id="fileInput"
                                onchange="readURL(this);">
                            <img id="blahDoctor" style="height: 25%; width: 25%" src="#" alt="your image" />
                        </div>
                        <button id="updateBDoctor" type="submit" class="btn btn-info">تحديث</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        document.getElementById("updateBAbout").addEventListener("click", function() {
            //  document.getElementById("typeText").innerText = 3;

        });
        document.getElementById("aboutClinic").addEventListener("click", function() {
            const val = document.getElementById("aboutClinic").value;

            myFunctionAboutClinic(val);
        }); //ليبل التفاصيل 

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
        // البيانات 

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
        document.getElementById("delete").addEventListener("click", myFunctionDelete);

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
            $('#choiceFirst').removeClass('new-content');
            $('#choiceFirst').removeClass('delete-content');

            var f = document.getElementById("choiceFirst");
            f.className += " update-content";
            document.getElementById("aboutClinics").hidden = false;


            var num = document.getElementById("aboutClinic").value = 2;
            var num = document.getElementById("discount").value = 2;
            var num = document.getElementById("service").value = 2;
            var num = document.getElementById("doctor").value = 2;
            document.getElementById("formEditServices").style.display = "none"; //hide
            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide
            document.getElementById("updateBAbout").innerText = "تحديث";
            document.getElementById("updateBDiscount").innerText = "تحديث";
            document.getElementById("updateBService").innerText = "تحديث";
            document.getElementById("updateBDoctor").innerText = "تحديث";

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateForm").style.display = "block"; //hide

        }

        function myFunctionNew() {
            var frm = document.getElementById('formTag') || null;
            if (frm) {
                frm.action = '{{ route('New') }}'
            }
            document.getElementById("aboutClinics").hidden = true;
            $('#choiceFirst').removeClass('update-content');
            $('#choiceFirst').removeClass('delete-content');

            var f = document.getElementById("choiceFirst");
            f.className += " new-content";
            var num = document.getElementById("aboutClinic").value = 1;
            var num = document.getElementById("discount").value = 1;
            var num = document.getElementById("service").value = 1;
            var num = document.getElementById("doctor").value = 1;

            document.getElementById("updateBAbout").innerText = "انشاء";
            document.getElementById("updateBDiscount").innerText = "انشاء";
            document.getElementById("updateBService").innerText = "انشاء";
            document.getElementById("updateBDoctor").innerText = "انشاء";

            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateForm").style.display = "block"; //hide

        }

        function myFunctionDelete() {
            var frm = document.getElementById('formTag') || null;
            if (frm) {
                frm.action = '{{ route('Delete') }}'
            }
            document.getElementById("aboutClinics").hidden = true;


            $('#choiceFirst').removeClass('update-content');
            $('#choiceFirst').removeClass('new-content');

            var f = document.getElementById("choiceFirst");
            f.className += " delete-content";
            var num = document.getElementById("aboutClinic").value = 3;
            var num = document.getElementById("discount").value = 3;
            var num = document.getElementById("service").value = 3;
            var num = document.getElementById("doctor").value = 3;

            document.getElementById("updateBAbout").innerText = "حذف";
            document.getElementById("updateBDiscount").innerText = "حذف";
            document.getElementById("updateBService").innerText = "حذف";
            document.getElementById("updateBDoctor").innerText = "حذف";
            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateForm").style.display = "block"; //hide

        }

        function myFunctionAboutClinic($type) {
            var contents = @json($content);


            document.getElementById("formEditServices").style.display = "block"; //hide
            document.getElementById("UpdateinfoAbout").style.display = "block"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide
            document.getElementById("UpdateinfoServie").style.display = "none"; //hide
            document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide

            document.getElementById("id").innerText = 1;
            document.getElementById("typeText").innerText = 4;
            document.getElementById("AboutText").innerText = contents.about[1].text;
            document.getElementById('blahAbout').src = "../" + contents.about[1].path;

        }


        function myFunctionDiscount($type) { //العروض

            if ($type == 1) {
                document.getElementById("typeText").innerText = 1;

                document.getElementById("formEditServices").style.display = "block"; //hide
                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
                document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide
                document.getElementById("UpdateinfoServie").style.display = "none"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "block"; //hide
            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide
                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide

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

            document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
            document.getElementById("UpdateinfoDiscount").style.display = "block"; //hide
            document.getElementById("UpdateinfoServie").style.display = "none"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide


            document.getElementById("DisTitle").innerText = contents.discount[$id - 1].title_ar;
            document.getElementById("DisText").innerText = contents.discount[$id - 1].text_ar;
            document.getElementById("DisPrice").innerText = contents.discount[$id - 1].Price;

            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 1;

        }

        function myFunctionService($type) { //الخدمات

            if ($type == 1) {
                document.getElementById("typeText").innerText = 2;

                document.getElementById("formEditServices").style.display = "block"; //hide

                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
                document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide
                document.getElementById("UpdateinfoServie").style.display = "block"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide


            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide
                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
                document.getElementById("selectDiscount").style.display = "none"; //hide
                document.getElementById("selectDoctor").style.display = "none"; //hide
                document.getElementById("selectService").style.display = "block"; //hide
            }
        }

        function myFunctionSubService($id) { //الخدمات

            var contents = @json($content['service']);
            var result = contents.find(({
                id
            }) => id === $id);
            console.log(result);
            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 2;
            document.getElementById(
                "welcome").setAttribute('style', 'height: 300%; !important;');
            document.getElementById(
                "formEditServices").style.display = "block"; //hide
            document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
            document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide
            document.getElementById("UpdateinfoServie").style.display = "block"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "none"; //hide

            document.getElementById("managertextarea").innerText = result.Name_ar;
            document
                .getElementById("managertextarea1").innerText = result.Price;
            //document.getElementById("updateB").style.display = "block"; //hide

        }

        function myFunctiondoctor($type) { //الاطباء
            if ($type == 1) {
                document.getElementById("typeText").innerText = 3;
                document.getElementById("formEditServices").style.display = "block"; //hide
                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
                document.getElementById("UpdateinfoDoctor").style.display = "block"; //hide
                document.getElementById("UpdateinfoServie").style.display = "none"; //hide
                document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide


            } else {

                document.getElementById("formEditServices").style.display = "none"; //hide
                document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
                document.getElementById("selectDiscount").style.display = "none"; //hide
                document.getElementById("selectService").style.display = "none";
                document.getElementById("selectDoctor").style.display = "block"; //hide

            }
        }

        function myFunctionSubdoctor($id) { //الاطباء
            document.getElementById("formEditServices").style.display = "block"; //hide
            document.getElementById("UpdateinfoAbout").style.display = "none"; //hide
            document.getElementById("UpdateinfoDiscount").style.display = "none"; //hide
            document.getElementById("UpdateinfoServie").style.display = "none"; //hide
            document.getElementById("UpdateinfoDoctor").style.display = "block"; //hide

            document.getElementById("formEditServices").style.display = "block"; //hid
            var contents = @json($content);
            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');

            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 3;
            document.getElementById("DoctorName").innerText = contents.doctor[$id - 1].user.name;
            document.getElementById("email-content").innerText = contents.doctor[$id - 1].user.email;
            document.getElementById("DoctorInfo").innerText = contents.doctor[$id - 1].info_ar;
            document.getElementById('blahDoctor').src = "../" + contents.doctor[$id - 1].path;

        }
    </script>

@endsection
