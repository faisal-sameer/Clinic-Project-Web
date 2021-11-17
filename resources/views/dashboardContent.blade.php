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

            <div id="updateform">

                <div id="mangrow" class="form-inline">


                    <div class="select-box" id="select1" style="width: 40%; margin-right: 20%">
                        <div class="select-box__current" tabindex="1">
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="discount" value="1" name="Ben"
                                    checked="checked" />
                                <p class="select-box__input-text">العروض</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="services" value="2" name="Ben" />
                                <p class="select-box__input-text">الخدمات</p>
                            </div>
                            <div class="select-box__value">
                                <input class="select-box__input" type="radio" id="doctors" value="3" name="Ben" />
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
                                <label class="select-box__option" for="services" id="Service"
                                    aria-hidden="aria-hidden">الخدمات</label>
                            </li>
                            <li>
                                <label class="select-box__option" for="doctors" id="doctor"
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
                                    <p class="select-box__input-text">{{ $discount->text }}</p>
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
                                        aria-hidden="aria-hidden">{{ $discount->text }}</label>
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

            <form method="POST" action="{{ route('Update') }}">
                @csrf
                <div id="mangrow3" class="row">

                    <textarea placeholder="id" class="shadow-drop-2-center-hidden"
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="id" id="id" cols="1"
                        rows="1"></textarea>
                    <textarea placeholder="type" class="shadow-drop-2-center-hidden"
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="type" id="typeText"
                        cols="1" rows="1"></textarea>
                    <textarea style="margin-left:5%;text-align: right ;height: 30%;" placeholder=" ... كلمة مدير المستشفى "
                        class="shadow-drop-2-center-hidden" name="name" id="managertextarea" cols="100" rows="5"></textarea>
                    <textarea placeholder="التسعيرة " class="shadow-drop-2-center-hidden"
                        style="text-align: right ;width: 20% ;margin-left: 5% ;height: 5%" name="price"
                        id="managertextarea1" cols="1" rows="1"></textarea>

                </div>
                <br><br>
                <div id="filerow" style="margin-left:40%; " class="row">

                    <input type="file" class="foo" id="fileInput" onchange="readURL(this);">
                    <img id="blah" src="#" alt="your image" />
                </div>
                <br><br>
                <div id="mangrow2" class="row">
                    <button id="updateB" type="submit" class="btn btn-info">تحديث</button>

                </div>
            </form>
        </div>
    </div>



    </div>
    </div>
@endsection
@section('script')

    <script>
        document.getElementById("discount").addEventListener("click", myFunctionDiscount); //ليبل العروض
        document.getElementById("Service").addEventListener("click", myFunctionService); //ليبل الخدمات
        document.getElementById("doctor").addEventListener("click", myFunctiondoctor); //ليبل الاطباء

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
        //ليبل الخدمات
        //   document.getElementById("Subdoctor").addEventListener("click", myFunctionSubdoctor); //ليبل الخدمات

        document.getElementById("Update").addEventListener("click", myFunctionUpdate); //زر التحديث
        document.getElementById("New").addEventListener("click", myFunctionNew);
        document.getElementById("managertextarea").style.display = "none"; //hide
        document.getElementById("managertextarea1").style.display = "none"; //hide
        document.getElementById("filerow").style.display = "none"; //hide

        document.getElementById("updateform").style.display = "none"; //hide
        document.getElementById("newform").style.display = "none"; //hide
        document.getElementById("updateB").style.display = "none"; //hide

        function myFunctionUpdate() {

            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide

            document.getElementById("container").setAttribute('style', 'margin-top:10% !important;');
            document.getElementById("updateform").style.display = "block"; //hide
            document.getElementById("newform").style.display = "none"; //hide
        }

        function myFunctionNew() {
            document.getElementById("updateB").style.display = "none"; //hide

            document.getElementById("updateform").style.display = "none"; //hide
            document.getElementById("newform").style.display = "block"; //hide
        }

        function myFunctionDiscount() { //العروض

            document.getElementById("managertextarea").style.display = "none"; //show
            document.getElementById("managertextarea1").style.display = "none"; //show
            document.getElementById("filerow").style.display = "none"; //hide

            document.getElementById("selectService").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide
            document.getElementById("selectDiscount").style.display = "block"; //hide
        }

        function myFunctionSubDiscount() { //العروض
            var contents = @json($content);

            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');

            document.getElementById("typeText").innerText = 1;

            document.getElementById("managertextarea").style.display = "block"; //show
            document.getElementById("managertextarea1").style.display = "block"; //show
            document.getElementById("filerow").style.display = "none"; //hide

            document.getElementById("managertextarea").innerText = contents.Discount[1];
            document.getElementById("updateB").style.display = "block"; //hide

        }

        function myFunctionService() { //الخدمات
            document.getElementById("managertextarea").style.display = "none"; //show
            document.getElementById("managertextarea1").style.display = "none"; //show
            document.getElementById("filerow").style.display = "none"; //hide

            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectDoctor").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "block"; //hide
        }

        function myFunctionSubService($id) { //الخدمات
            var contents = @json($content);
            document.getElementById("id").innerText = $id;
            document.getElementById("typeText").innerText = 2;

            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');
            document.getElementById("managertextarea").style.display = "block"; //show
            document.getElementById("managertextarea1").style.display = "block"; //hide
            document.getElementById("filerow").style.display = "none"; //hide

            document.getElementById("managertextarea").innerText = contents.service[$id - 1].Name;
            document.getElementById("managertextarea1").innerText = contents.service[$id - 1].Price;
            document.getElementById("updateB").style.display = "block"; //hide

        }

        function myFunctiondoctor() { //الاطباء

            document.getElementById("managertextarea").style.display = "none"; //show
            document.getElementById("managertextarea1").style.display = "none"; //show
            document.getElementById("filerow").style.display = "none"; //hide

            document.getElementById("selectDiscount").style.display = "none"; //hide
            document.getElementById("selectService").style.display = "none";
            document.getElementById("selectDoctor").style.display = "block"; //hide


        }

        function myFunctionSubdoctor($id) { //الاطباء
            var contents = @json($content);
            document.getElementById("typeText").innerText = 3;

            document.getElementById("welcome").setAttribute('style', 'height: 300%; !important;');
            document.getElementById("managertextarea").style.display = "block"; //show
            document.getElementById("managertextarea1").style.display = "block"; //hide
            document.getElementById("filerow").style.display = "block"; //hide

            document.getElementById("managertextarea1").innerText = contents.doctor[$id - 1].user.name;
            document.getElementById("managertextarea").innerText = contents.doctor[$id - 1].info;
            document.getElementById('blah').src = "../" + contents.doctor[$id - 1].path;
            document.getElementById("updateB").style.display = "block"; //hide
        }
    </script>
@endsection
