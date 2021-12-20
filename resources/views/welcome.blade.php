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
                            style="display: flex;justify-content: center;align-items: center;  ">
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
            <h2 id="tit">خدماتنا</h2>

            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($all['services'] as $service)

                        <div class="item service-item">

                            <h2 id="title-header">{{ $service->Name_ar }}</h2>

                        </div>

                    @endforeach

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
                        @foreach ($all['discounts'] as $discount)

                            <li>
                                <img width="10%" src="images/discount.png" alt="">
                                <div class="text">
                                    <h6>
                                        {{ $discount->title_ar }}
                                    </h6>
                                    <p>
                                        {{ $discount->text_ar }} = {{ $discount->Price }} ريال
                                    </p>
                                </div>
                            </li>
                        @endforeach
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
                    @foreach ($all['doctor'] as $doctor)
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="{{ $doctor->path }}" alt=""></i>
                        </div>
                        <h5 class="service-title">{{ $doctor->user->name}}
                        </h5>
                        <p>
                            {{$doctor->info_ar}}
                        </p>
                     
                    </div>
                 
                        
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- 
                                <section class="section" id="doctor">
                                    <div class="container">
                                        <div class="row">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item service-item">
                                                    <img src="images/doctor1.png" id="imagestaff" alt="">
                                                    <h5 class="service-title">د.سالم عوني
                                                    </h5>
                                                    <p>طبيب جراحة فم وأسنان</p>
                                                    <p>الخبرات</p>
                                                    <ul>
                                                        <li>حاصل على بكالوريس طب وجراحة الفم والأسنان</li>
                                                        <li>ممتاز مع مرتبة الشرف الأولى</li>
                                                        <li>معيد سابق في كلية ابن سينا</li>
                                                        <li>خبرة سريرية مع مجموعات طبية</li>
                                                    </ul>
                                                    <a href="#" class="main-button">Read More</a>
                                                </div>

                                                <div style="height: 100%" class="item service-item">
                                                    <img src="images/doctor3.png" id="imagestaff" alt="">

                                                    <h5 class="service-title">د.معمر الصامت</h5>
                                                    <p>استشاري تقويم الأسنان والفكين</p>
                                                    <p>الخبرات</p>
                                                    <ul>
                                                        <li style="font-size: 80%;font-weight: 900">أستاذ جامعي سابق في جامعة العلوم والتكنولوجيا </li>
                                                        <li style="font-size: 80%;font-weight: 900">حاصل على شهادة البورد في تقويم الأسنان </li>
                                                        <li style="font-size: 80%;font-weight: 900">أستاذ جامعي سابق في جامعة جازان</li>
                                                        <li style="font-size: 80%;font-weight: 900">خبرة سريرية مع مجموعات طبية</li>
                                                        <li style="font-size: 80%;font-weight: 900">خبرة 15 سنة</li>
                                                    </ul>
                                                    <a href="#" class="main-button">Read More</a>
                                                </div>
                                                <div class="item service-item">
                                                    <img src="images/doctor4.png" id="imagestaff" alt="">

                                                    <h5 class="service-title">د.أمل خصروف</h5>
                                                    <p>طبيبة جراحة فم وأسنان </p>
                                                    <p>الخبرات</p>
                                                    <ul>
                                                        <li>حاصلة على بكالوريس طب وجراحة الفم والأسنان</li>
                                                        <li>ممتاز مع مرتبة الشرف الأولى </li>
                                                        <li>معيدة سابقا في جامعة العلوم والتكنولوجيا</li>
                                                        <li>خبرة سريرية مع مجموعات طبية</li>
                                                    </ul>
                                                    <a href="#" class="main-button">Read More</a>
                                                </div>
                                                <div style="height: 100%" class="item service-item">
                                                    <img src="images/doctor2.png" id="imagestaff" alt="">

                                                    <h5 class="service-title">د.رغد كراوغ</h5>
                                                    <p>طبيبة جراحة فم وأسنان</p>
                                                    <a href="#" class="main-button">Read More</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <br><br>-->
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
                        <form id="contact" action="{{ route('SendEmail') }}" method="POST">
                            @csrf
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
