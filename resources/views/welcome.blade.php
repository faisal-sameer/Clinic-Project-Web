@extends('layouts.app')
@section('we')
    #welcome
@endsection
@section('se')
    #services
@endsection
@section('con')
    #contact-us
@endsection
@section('content')

    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1 style="text-align: center">{{ __('app.Welcome') }}</h1>
                        <a href="/reservation" class="main-button-slider"
                            style="display: flex;  
                                                                                                                                                    justify-content: center;  
                                                                                                                                                    align-items: center;  ">
                            {{ __('app.reservationHome') }}
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="images/teeth.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>

    <!-- ***** Welcome Area End ***** -->
    <a id="dds" href="#" class="float">
        <i class="fa fa-envelope my-float"></i>
    </a>
    <div class="label-container">
        <div class="label-text"> {{ __('app.contactUs') }}</div>
        <i class="fa fa-play label-arrow"></i>
    </div>

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ $all['aboutUs']['path'] }}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading" style="text-align: center;">
                        <h5> {{ __('app.AboutUs') }}</h5>
                    </div>
                    <div class="left-text">
                        <p style="text-align: right">
                            {{ __('app.AboutText, :Lang', ['ar' => $all['aboutUs']['text_ar'], 'en' => $all['aboutUs']['text_en']]) }}

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <section class="section" id="services">
        <div class="container">
            <h2 id="tit"> {{ __('app.Comments') }}</h2>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Mohammed Allehyani
                        </h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>

                        <p>
                            تقييمي كشخص متعامل مع الدكتور عمرو بخصوص التقويم للاسنان
                            اكملت سنة ..شخصية محترمة و هادئة تجيب ع كل التساؤلات و ملم بعمله انصح فيه للامانة
                        </p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">سلمان الحربي</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>شكرا د/ عفاف مبدعه ويديها خفيفه جدا وقمه في التعامل ومتعاونه مع المرضى
                        </p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">7moodi Al-zahrani</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>العياده ما شاء الله ممتازة والتعامل ممتاز خصوصا في قسم التقويم الدكتور عمرو الله يسعده على
                            الاسلوب والتعامل 🙏 </p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Ayah ALKENANI</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>دكتور عمرو غازي من افضل الدكاترة الا تعاملت معاهم شغلة جداً ممتاز ماشاءالله تبارك الله</p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fares Alhamaly</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>عياده الماجد افضل عياده اسنان وافضل دكتور الدكتور حسن مطر
                            تعامله راقي مع الكبار وخاصه الصغار
                            اشكر الدكتور حسن على حسن تعامله</p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">وداد الفهمي</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>عملت اسناني عند الدكتور حسن مطر افضل دكتور بالمجمع يده خفيفه وسريع وشغله دقيق مره لايفوتكم .
                        </p>
                        <a href="https://www.google.com/search?q=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A&oq=%D9%85%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D9%85%D8%A7%D8%AC%D8%AF+%D8%A7%D9%84%D8%B7%D8%A8%D9%8A+&aqs=chrome.0.69i59j46i175i199i512l2j0i22i30l2.1033j0j9&sourceid=chrome&ie=UTF-8#lrd=0x15c1f64d264db10d:0x9f0b18c816560873,1,,,"
                            class="main-button"> {{ __('app.MoreComments') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5> {{ __('app.Offers') }}</h5>
                    </div>
                    <!--    <p>Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit. Aenean in feugiat purus.</p>-->
                    <ul>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>
                                    {{ __('app.OffersTopic, :NameAR', ['ar' => 'الاول', 'en' => 'first']) }}

                                </h6>
                                <p> {{ __('app.OffersTopicExplain') }}
                                </p>
                            </div>
                        </li>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>
                                    {{ __('app.OffersTopic, :NameAR', ['name' => 'الثاني', 'en' => 'Second']) }}

                                </h6>
                                <p> {{ __('app.OffersTopicExplain') }}
                                </p>
                            </div>
                        </li>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>
                                    {{ __('app.OffersTopic, :NameAR', ['name' => 'الثالث', 'en' => 'thired']) }}

                                </h6>
                                <p> {{ __('app.OffersTopicExplain') }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="images/tooth.png" class="rounded img-fluid d-block mx-auto" style="width: 40%;" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">تنظيف الجير وتبييض الأسنان
                        </h5>
                        <p>جير الأسنان أو طبقة القلح هي عبارة عن طبقة لزجة شفافة أو بيضاء من البكتيريا واللعاب وفتات الطعام
                            تتجمع على الأسنان, وان لم تنتزع بالتنظيف اليومي تتصلب لتصبح حصى متماسكة, ويعد الجير هو السبب
                            الأساسي لحدوث ألتهاب اللثة, فهو يهيج اللثة ويفصل بينها وبين جذور الأسنان مكونا فراغات وهذه
                            الفراغات قد تمتلئ بفتات الطعام والصديد ويسبب هذا أحمرارا ونزفا للثة عند عمليه تنظيف الأسنان, وأن
                            أهمل جير الأسنان ولم يعالج يحدث أرتخاء للأسنان وفي النهاية يكون أقتلاعها محتوما. و قد تظهر الجير
                            على شكلين: فوق خطّ اللثة حيث يكون الجير مرئيا تحت خطّ اللثة حيث يتشكّل في الجيوب بين الأسنان
                            واللثة.

                        </p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Second Box Title</h5>
                        <p>Pellentesque vitae urna ut nisi viverra tristique quis at dolor. In non sodales dolor, id egestas
                            quam. Aliquam erat volutpat. </p>
                        <a href="#" class="main-button">Discover More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Third Title Box</h5>
                        <p>Quisque finibus libero augue, in ultrices quam dictum id. Aliquam quis tellus sit amet urna
                            tincidunt bibendum.</p>
                        <a href="#" class="main-button">More Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fourth Service Box</h5>
                        <p>Fusce sollicitudin feugiat risus, tempus faucibus arcu blandit nec. Duis auctor dolor eu
                            scelerisque vestibulum.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fifth Service Title</h5>
                        <p>Curabitur aliquam eget tellus id porta. Proin justo sapien, posuere suscipit tortor in, fermentum
                            mattis elit.</p>
                        <a href="#" class="main-button">Discover</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Sixth Box Title</h5>
                        <p>Ut nibh velit, aliquam vitae pellentesque nec, convallis vitae lacus. Aliquam porttitor urna ut
                            pellentesque.</p>
                        <a href="#" class="main-button">Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Seventh Title Box</h5>
                        <p>Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada
                            odio. Donec non quam.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- ***** Features Small End ***** -->


    <!-- ذFrequently Question Start 
                                                                                                                                <section class="section" id="frequently-question">
                                                                                                                                    <div class="container">
                                                                                                                                    Section Title Start ف
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-lg-12">
                                                                                                                                                <div class="section-heading">
                                                                                                                                                    <h2>Frequently Asked Questions</h2>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="offset-lg-3 col-lg-6">
                                                                                                                                                <div class="section-heading">
                                                                                                                                                    <p>Vivamus venenatis eu mi ac mattis. Maecenas ut elementum sapien. Nunc euismod risus ac lobortis congue. Sed erat quam.</p>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                         ***** Section Title End ق

                                                                                                                                        <div class="row">
                                                                                                                                            <div class="left-text col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                <h5>Class aptent taciti sociosqu ad litora torquent per conubia</h5>
                                                                                                                                                <div class="accordion-text">
                                                                                                                                                    <p>Curabitur placerat diam in risus lobortis, laoreet porttitor est elementum. Nulla ultricies risus quis risus scelerisque, a aliquam tellus maximus. Cras pretium nulla ac convallis iaculis. Aenean bibendum erat vitae odio sodales, in facilisis tellus volutpat.</p>
                                                                                                                                                    <p>Sed lobortis pellentesque magna ac congue. Suspendisse quis molestie magna, id eleifend ex. Ut mollis ultricies diam nec dictum. Morbi commodo hendrerit mi vel vulputate. Proin non tincidunt dui. Lorem ipsum dolor sit amet.</p>
                                                                                                                                                    <span>Email: <a href="#">email@company.com</a><br></span>
                                                                                                                                                    <a href="#contact-us" class="main-button">Contact Us</a>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                <div class="accordions is-first-expanded">
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>First Common Question</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Duis vulputate porttitor urna sit amet pretium. Phasellus sed pulvinar eros, condimentum consequat ex. Suspendisse potenti.
                                                                                                                                                                <br><br>
                                                                                                                                                                Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>Second Question Answer</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Sed odio elit, cursus sed consequat at, rutrum eget augue. Cras ac eros iaculis, tempor quam sit amet, scelerisque mi. Quisque eu risus eget nunc porttitor vestibulum at a ante.
                                                                                                                                                                <br><br>
                                                                                                                                                                Praesent ut placerat turpis, vel pellentesque dolor. Sed rutrum eleifend tortor, eu luctus orci sagittis in. In blandit fringilla mollis.</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>Third Answer for you</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Proin feugiat ante ut vulputate rutrum. Nam quis erat turpis. Nullam maximus pharetra lorem, eu condimentum est iaculis ut. Pellentesque mattis ultrices dignissim. 
                                                                                                                                                                <br><br>
                                                                                                                                                                Etiam et enim finibus, feugiat massa efficitur, finibus sapien. Sed cursus lacus quis arcu scelerisque, eget ornare risus maximus. Aenean non lectus id odio rhoncus pharetra.</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>Fourth Question Asked</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Phasellus eu purus ornare, eleifend orci nec, egestas nulla. Sed sed aliquet sapien. Proin placerat, ipsum eu posuere blandit, tellus quam consectetur nisi, id sollicitudin diam ex at nisi.
                                                                                                                                                                <br><br>
                                                                                                                                                                Aenean fermentum eget turpis egestas semper. Sed finibus mollis venenatis. Praesent at sem in massa iaculis pharetra.</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>Fifth Ever Question</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Quisque aliquet ipsum ut magna rhoncus, euismod lacinia elit rhoncus. Sed sapien elit, mollis ut ultricies quis, fermentum nec ante.
                                                                                                                                                                <br><br>
                                                                                                                                                                Sed nec ex nec tortor fermentum sollicitudin id ut ligula. Ut sagittis rutrum lectus, non sagittis ante euismod eu. </p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                    <article class="accordion">
                                                                                                                                                        <div class="accordion-head">
                                                                                                                                                            <span>Sixth Sense Question</span>
                                                                                                                                                            <span class="icon">
                                                                                                                                                                <i class="icon fa fa-chevron-right"></i>
                                                                                                                                                            </span>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="accordion-body">
                                                                                                                                                            <div class="content">
                                                                                                                                                                <p>Suspendisse potenti. Ut dapibus leo ut massa vulputate semper. Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </article>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </section>
                                                                                                                               Frequently Question End  -->


    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                        <!-- How to change your own map point
                                                                                                                                                       1. Go to Google Maps
                                                                                                                                                       2. Click on your location point
                                                                                                                                                       3. Click "Share" and choose "Embed map" tab
                                                                                                                                                       4. Copy only URL and paste it within the src="" field below
                                                                                                                                                -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14842.793851587834!2d39.7748164!3d21.5586428!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f0b18c816560873!2z2YXYrNmF2Lkg2KfZhNmF2KfYrNivINin2YTYt9io2Yo!5e0!3m2!1sar!2ssa!4v1632129288950!5m2!1sar!2ssa"
                            width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name"
                                            placeholder=" {{ __('app.FeedbackName') }}" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email"
                                            placeholder="  {{ __('app.FeedbackEmail') }}" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message"
                                            placeholder=" {{ __('app.FeedbackMessage') }}" required=""
                                            class="contact-field"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" onClick="window.location.reload();" id="form-submit"
                                            class="main-button"> {{ __('app.FeedbackSent') }}</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
@endsection

<!-- ***** Footer Start ***** -->
