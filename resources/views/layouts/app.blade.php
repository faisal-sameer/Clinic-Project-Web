<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('app.Title') }}</title>

    <!-- Scripts -->
    <script src="../js/app.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="../css/owl-carousel.css">
    <link href="../css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <!-- Styles -->
</head>

<body>


    <body class="main-layout">




        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>


        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <a href="#" class="logo"> اللوقو</a>

                            <ul class="nav">
                                <li class="scroll-to-section"><a href="@yield('we')" style="font-size: large;"
                                        class="active"> {{ __('app.HomePage') }}</a></li>
                                <li class="scroll-to-section"><a
                                        href="{{ \LaravelLocalization::localizeURL('/reservation') }}"
                                        style="font-size: large;"> {{ __('app.reservation') }}</a></li>
                                <li class="scroll-to-section"><a href=@yield('se') style="font-size: large;">
                                        {{ __('app.services') }}</a></li>
                                <li class="scroll-to-section nav-item dropdown">
                                    <a style="font-size: large" href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ __('app.lang') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        style="margin-bottom: 5%;padding-left: 0%" aria-labelledby="navbarDropdownBlog">

                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)



                                            <a style="text-align: center" rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>

                                        @endforeach
                                    </div>
                                </li>




                                <li class="scroll-to-section"><a href=@yield('con') style="font-size: large;">
                                        {{ __('app.contactUs') }}</a></li>
                                @if (Auth::user() == null)
                                    <!-- يظهر عندما لا يوجد حساب -->

                                    <li class="scroll-to-section"><a href="{{ route('login') }}"
                                            style="font-size: large;"> {{ __('app.LoginStaff') }}</a></li>
                                @endif
                                <!--يظهر عند تسجيل الدخول-->
                                @if (Auth::user() != null)


                                    <li class="scroll-to-section nav-item dropdown">
                                        <a style="font-size: large" href="#" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ __('app.DashBoard') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" style="margin-bottom: 5%"
                                            aria-labelledby="navbarDropdownBlog">
                                            <a class="dropdown-item" style="color: black;text-align: right"
                                                href="/TodayAppointments">لوحة المواعيد</a>
                                            <a class="dropdown-item" style="color: black;text-align: right"
                                                href="dashboardContent">تعديل على المحتوى</a>
                                        </div>
                                    </li>
                                    <li class="scroll-to-section"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                                            style="font-size: large;"><i class="fas fa-sign-out-alt "></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                            </ul>
                            <!--المنيو لمن تكون الشاشة صغيرة--> <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-4">
            @include('sweetalert::alert')

            @yield('content')
        </main>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <p class="copyright"> {{ __('app.Copyright') }} &copy;AF

                            . Design: <a rel="nofollow" href="#">Fi9</a></p>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-snapchat"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>



                <script src="../js/jquery-2.1.0.min.js"></script>

                <!-- Bootstrap -->
                <script src="../js/popper.js"></script>
                <script src="../js/bootstrap.min.js"></script>

                <!-- Plugins -->
                <script src="../js/owl-carousel.js"></script>
                <script src="../js/scrollreveal.min.js"></script>
                <script src="../js/waypoints.min.js"></script>
                <script src="../js/jquery.counterup.min.js"></script>
                <script src="../js/imgfix.min.js"></script>

                <!-- Global Init -->
                <script src="../js/custom.js"></script>


                <script>
                    function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput0");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[5];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>


                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#blah')
                                    .attr('src', e.target.result)
                                    .width(200)
                                    .height(200);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>


                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#blahDoctor')
                                    .attr('src', e.target.result)
                                    .width(200)
                                    .height(200);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#blahAbout')
                                    .attr('src', e.target.result)
                                    .width(200)
                                    .height(200);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
                <script>
                    $(document).on("change", ".file_multi_video", function(evt) {

                        var $source = $('#video_here');

                        $source[0].src = URL.createObjectURL(this.files[0]);

                        $source.parent()[0].load();

                    });
                </script>
                <script>
                    function myFunction1() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput1");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable1");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[5];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
                <script>
                    function myFunction2() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput2");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable2");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[5];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>

                <script>
                    /*   document.addEventListener('contextmenu', function(e) {
                                                                        e.preventDefault();
                                                                    });
                                                                    document.onkeydown = function(e) {
                                                                        if (event.keyCode == 123) { //F12 keycode is 123
                                                                            return false;
                                                                        }
                                                                    }*/
                </script>
                @yield('script')
    </body>

</html>
