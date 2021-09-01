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
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>يكتب اي شي </h1>
                        <p >تهتهيمت</p>
                        <a href="/reservation" class="main-button-slider" style="display: flex;  
                        justify-content: center;  
                        align-items: center;  ">احجز موعدك من هنا </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="images/طب الأسنان.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading" style="text-align: center;">
                        <h5 >نبذة عن العيادة</h5>
                    </div>
                    <div class="left-text">
                    <p>{{$text}}</p>
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
            <h2 id="tit">بعض من تعليقات المراجعين</h2>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Ahmed Alsir
                        </h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>

                        <p>
                            يعتبر من أفضل مراكز الأسنان بمكة خدمات ممتازة جدا ودكاترة علي مستوى عالي من الخبرات ..د.فهد أسلوبه جميل جدا مع الأطفال وعمل على مستوي الدقة والاتقان... د.ياسر ما شاء الله رائع جدا في سحب العصب والتركيبات
                            
                        </p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjM vMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button">المزيد من التعليقات</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Nadiya Kutbi</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>تجربة رهيبة لطفلي أول مرة كان يروح طبيب اسنان
                            شجعه وتعامل جداً راقي من الطبيب فهد
                            خرجنا من عنده انا و لدي مبسوطين طاقة ايجابية
                            الموقف اللي اثر فيا يتعامل مع المريض باإحساس خلع سن ولدي و بعدين حضنه الله يسعده  شكراً للطبيب الأسنان المتميز و النادر
                            </p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjMvMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button"> المزيد من التعليقات</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Ayah Sulman</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>يعطيك العافيه دكتور فهد دائماً متميز بشهادتي وشهادة عائلتي الي مايروحو لغيرك ندعمك ودايماً للامام يارب ماشاء الله تبارك الله انت والممرضات والمساعدات ✨✨✨✨✨</p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjMvMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button"> المزيد من التعليقات</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">fatma Al-Ghamdi</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>نفتخر بوجود اطباء سعودين وكل الكادر سعودين وهذا فخر لنا ونشكرهم على إخلاصهم وإتقانهم في العمل وعلى الإنجاز في إيجاز</p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjMvMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button"> المزيد من التعليقات</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">طلال علي</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>للأمانة من خلال تعاملي مع الدكتور / ياسر. في عيادة الاسنان، وجدت تعامل رآقي جداً ناهيك عن إحترافية الدكتور ياسر في عمله ومرونة أكثر من رائعة، حقيقي شُكراً لمجمع الدكتور طلعت الزهراني، ويارب تستمروا دائماً على هذا التَميّز والأبداع.</p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjMvMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button"> المزيد من التعليقات</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Perfume Whiff</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>من افضل عيادات الاسنان وبالذات الاطفال الصراحه دكتور فهد تعامله جدددا ممتاز مع اي طفل عنيد يدخل عنده يقدر انه هو يحتويه ويخرج من عنده مبسووط</p>
                        <a href="https://www.google.com/search?gs_ssp=eJzj4tVP1zc0TDZJNjMvMjAyYLRSNagwNE02Mky0TDJISTE0NjOztDKoMLO0TDRLS05KTTK0MDJJTvNyv7HzZteN5TfWA_EqhRvr9RRuNt5sv7Fe4cb2my03doLElgMZm4BiG4GstptdCkDu9hsrIOKLb2y-2QYSBwB7tj7i&q=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.+%D9%81%D9%87%D8%AF+%D8%B7%D9%84%D8%B9%D8%AA+%D8%A7%D9%84%D8%B2%D9%87%D8%B1%D8%A7%D9%86%D9%8A+%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D8%A3%D8%B3%D9%86%D8%A7%D9%86&oq=%D8%B9%D9%8A%D8%A7%D8%AF%D8%A7%D8%AA+%D8%AF.&aqs=chrome.1.69i57j46i175i199i512l4j0i512j46i175i199i512l3.8589j0j7&sourceid=chrome&ie=UTF-8#lrd=0x15c21a9b0dd13669:0x699a6fcbeb1824cf,1,,," class="main-button"> المزيد من التعليقات</a>
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
                        <h5>الخصومات والعروض المقدمة</h5>
                    </div>
                <!--    <p>Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit. Aenean in feugiat purus.</p>-->
                    <ul>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>العرض الأول</h6>
                                <p>شرح للعرض </p>
                            </div>
                        </li>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>العرض الثاني</h6>
                                <p>شرح للعرض</p>
                            </div>
                        </li>
                        <li>
                            <img width="10%" src="images/discount.png" alt="">
                            <div class="text">
                                <h6>العرض الثالث</h6>
                                <p>شرح للعرض</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
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
                        <p>جير الأسنان أو طبقة القلح هي عبارة عن طبقة لزجة شفافة أو بيضاء من البكتيريا واللعاب وفتات الطعام تتجمع على الأسنان, وان لم تنتزع بالتنظيف اليومي تتصلب لتصبح حصى متماسكة, ويعد الجير هو السبب الأساسي لحدوث ألتهاب اللثة, فهو يهيج اللثة ويفصل بينها وبين جذور الأسنان مكونا فراغات وهذه الفراغات قد تمتلئ بفتات الطعام والصديد ويسبب هذا أحمرارا ونزفا للثة عند عمليه تنظيف الأسنان, وأن أهمل جير الأسنان ولم يعالج يحدث أرتخاء للأسنان وفي النهاية يكون أقتلاعها محتوما. و قد تظهر الجير على شكلين: فوق خطّ اللثة حيث يكون الجير مرئيا تحت خطّ اللثة حيث يتشكّل في الجيوب بين الأسنان واللثة.
                            
                        </p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Second Box Title</h5>
                        <p>Pellentesque vitae urna ut nisi viverra tristique quis at dolor. In non sodales dolor, id egestas quam. Aliquam erat volutpat. </p>
                        <a href="#" class="main-button">Discover More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Third Title Box</h5>
                        <p>Quisque finibus libero augue, in ultrices quam dictum id. Aliquam quis tellus sit amet urna tincidunt bibendum.</p>
                        <a href="#" class="main-button">More Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fourth Service Box</h5>
                        <p>Fusce sollicitudin feugiat risus, tempus faucibus arcu blandit nec. Duis auctor dolor eu scelerisque vestibulum.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/teeth.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fifth Service Title</h5>
                        <p>Curabitur aliquam eget tellus id porta. Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit.</p>
                        <a href="#" class="main-button">Discover</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Sixth Box Title</h5>
                        <p>Ut nibh velit, aliquam vitae pellentesque nec, convallis vitae lacus. Aliquam porttitor urna ut pellentesque.</p>
                        <a href="#" class="main-button">Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Seventh Title Box</h5>
                        <p>Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada odio. Donec non quam.</p>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59431.44373265082!2d39.90473130882059!3d21.410951127631726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee03935880f404af!2z2KfZhNmF2K_Yp9ixINmE2LfYqCDZiNiq2YLZiNmK2YUg2KfZhNij2LPZhtin2YY!5e0!3m2!1sar!2ssa!4v1623239657163!5m2!1sar!2ssa" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                <input name="name" type="text" id="name" placeholder="Full Name" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="E-mail" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Your Message" required="" class="contact-field"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send It</button>
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
   