@extends('front.layouts.master')
@section('main')

    <form class="main-form" action="">

        <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
        <button type="submit">
            <i class="fa fa-search">
            </i>
        </button>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="slider-demo">
        <div class="slideshow-container">
            @php
                $i = 0;
            @endphp
            @foreach ($sliderlanguages as $sliderlanguage)
                @php
                    $i++;
                    $image = $sliderlanguage->langable->detail;
                @endphp
                @if ($i < 4)
                    <div class="mySlides fade">
                        <div class="numbertext">{{ $i }} / {{ count($sliderlanguages) }}</div>
                        <img src="{{ asset($image->path) }}" alt="{{ $image->alt }}" title="{{ $image->name }}">
                    </div>
                @endif
            @endforeach
        </div>
        <br>

        <div class="dotSlide">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>
    <br>
    <section class="title-home_learning">
        <div>
            <a href="{{ route('home') }}">خانه</a>
            <span>/</span>
            <a href="{{ route('front.courses.all') }}">اموزش</a>
        </div>
    </section>


    <h1 class="main-title-h1">آموزش برنامه نویسی و گرافیک</h1>

    <section class="about-us">
        <article>
            <p>
                ما در سال 2016 با هدف ایجاد تغییر و تحول در فضای وب ایران فعالیت رسمی خود را اغاز کردیم
                و هر سال با تلاش و پشتکار همگام با استاندارد های روز دنیا
                قدم برداشتیم و در کنار این ارزش افرینی مستمر توانستیم لورد اف ایتی را تا اندازه ای چشمگیر تغییر
                دهیم
                .
            </p>
        </article>

    </section>
    <hr>





    <!-- Swiper start -->
    <section class="section-swiper">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @php
                    $i = 0;
                @endphp
                @foreach ($languages as $language)
                    @php
                        $i++;
                        $course = $language->langable;
                    @endphp
                    @if ($i < 7)

                        <div class="swiper-slide">
                            <a href="{{ route('front.courses.show', $course->id) }}"><img
                                    src="{{ asset($course->image->path) }}" alt="algorithm">
                                <div class="one-text-swiper-slide-amozesh">
                                    <p>{{ $course->name }} </p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Swiper JS end  -->

    <div class="why-us">
        <div>
            <section class="sections-title">
                <h2>
                    دوره های آموزشی
                </h2>
            </section>
            <article>
                <p>
                    ما در سال 2016 با هدف ایجاد تغییر و تحول در فضای وب ایران فعالیت رسمی خود را اغاز کردیم
                    و هر سال با تلاش و پشتکار همگام با استاندارد های روز دنیا
                    قدم برداشتیم و در کنار این ارزش افرینی مستمر توانستیم لورد اف ایتی را تا اندازه ای چشمگیر تغییر
                    دهیم
                    .
                </p>
            </article>
        </div>

        <figure>
            <img src="{{ asset('front/imgs/geraphic.jpg') }}" alt="">
        </figure>


    </div>





    <section class="three-box-article">
        <div class="parent-boxes">
            <!-- box-one -->
            <div class="wrapper-box-article-amozesh">
                @php
                    $i = 0;
                @endphp
                @foreach ($languagesarticles as $languagesarticle)
                    @php
                        $i++;
                        $course = $language->langable;
                    @endphp
                    @if ($i < 4)
                        <div>
                            <figure>
                                <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="">
                            </figure>
                            <p class="wrapper-box-article-amozesh-p">کسب کار سنتی یا دیجتال؟</p>
                            <p>
                                استفاده از طرح های گرافیکی و ویدوها یکی از بهترین
                                روش ها برای انتقال پیام تبلیغات و جذب مخاطب
                                هست چون خلاقیت و رنگ های به کار رفته شده در
                                طراح های گرافیکی و ویدوها برای مردم جذاب است
                            </p>
                            <div class="article-bishtar article-amoozesh-bishtar">
                                <a href="#">
                                    <span>بیشتر</span>
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
    <!-- btn -->
    <div class="parent-amozesh-btn">
        <div class="amozesh-btn">
            <a href="#"><span>همه مقالات</span></a>
        </div>
    </div>
    <!-- btn -->

@endsection
@section('scripts')
    <script src="{{ asset('front/js/buttonNumber_All_pages.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('front/js/btnEffect.js') }}"></script>
    <script src="{{ asset('front/js/amozesh.js') }}"></script>
    <script src="{{ asset('front/js/slider-demo.js') }}" type="text/javascript"></script>
@endsection
