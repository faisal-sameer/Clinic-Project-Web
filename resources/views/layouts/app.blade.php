<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="css/owl-carousel.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                                <a href="#" class="logo">اسم العيادة أو اللوقو</a>
                         
                                <ul class="nav">
                                    <li class="scroll-to-section"><a href="@yield('we')" style="font-size: large;" class="active">الصفحة الرئيسية</a></li>
                                    <li class="scroll-to-section"><a href="/reservation"  style="font-size: large;">حجز المواعيد</a></li>
                                    <li class="scroll-to-section"><a href=@yield('se')  style="font-size: large;">الخدمات المقدمة</a></li>
                                    
                                   <li class="scroll-to-section"><a href="{{ route('login') }}" style="font-size: large;">تسجيل الدخول للموظفين</a></li>
                                <!--    <li class="submenu">
                                        <a href="javascript:;">Drop Down</a>
                                        <ul>
                                            <li><a href="">About Us</a></li>
                                            <li><a href="">Features</a></li>
                                            <li><a href="">FAQ's</a></li>
                                            <li><a href="">Blog</a></li>
                                        </ul>
                                    </li>-->
                                    <li class="scroll-to-section"><a href=@yield('con')  style="font-size: large;">تواصل معنا</a></li>
                                </ul>
                              <!--المنيو لمن تكون الشاشة صغيرة-->   <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <!-- ***** Menu End ***** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy;AAMF
                
                . Design: <a rel="nofollow" href="https://templatemo.com">Fi9</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    

    <script src="js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="js/owl-carousel.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="js/custom.js"></script>
</body>
</html>
