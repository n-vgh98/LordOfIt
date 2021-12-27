@extends('front.layouts.master')
@section('main')

    {{-- <form class="main-form" action="">

    <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
    <button type="submit">
        <i class="fa fa-search">
        </i>
    </button>
</form> --}}






    <h1 class="ourTeam-title">تیم ما</h1>

    <div id="slider-demo">

        <div class="slideshow-container">
            @php
                $i = 0;
            @endphp
            @foreach ($languages as $language)
                @php
                    $i++;
                    $image = $language->langable->detail;
                @endphp
                <div class="mySlides fade">
                    <div class="numbertext">{{ $i }} / {{ count($languages) }}</div>
                    <img src="{{ asset($image->path) }}">
                    <div class="text">Caption Text</div>
                </div>

            @endforeach

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div class="dotSlide">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>


    <br>

    <section class="ourTeamWrapper">
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
        <!-- 1 -->
        <div class="team-card">

            <div class="team-card-content">
                <h3>نرگس واقفی</h3>
                <p>برنامه نویس ارشد سایت</p>
                <p>5 سال سابقه طراحی و پیاده سازی کسب و کار های اینترنتی (طراحی سایت ) و ۲ سال مدیریت تیم طراحی
                    سایت در شرکت Lord Of IT</p>
            </div>
            <figure class="team-card-img">
                <img class="img-change1" src="imgs/16087662523.jpg" alt="">
                <img class="img-change2" src="imgs/1608766482omid.jpg" alt="">
            </figure>



        </div>
        <!-- 2 -->
    </section>
    <!-- start fixed arrow up  -->
    <div class="fixed-arrow-up-parent">
        <a href="#smoothy-scorlltop">
            <i class="fas fa-arrow-up"></i>
        </a>

    </div>
    <!-- end fixed arrow up  -->
@endsection
@section('scripts')
    <script src="{{ asset('front/js/menuWhithOutScroll.js') }}"></script>
    <script src="{{ asset('front/js/ArrowUpIcon.js') }}"></script>
    <script src="{{ asset('front/js/slider-demo.js') }}" type="text/javascript"></script>
    <script>
        let bl_img = true;
        let a_img = document.getElementsByClassName("img-change1");
        let b_img = document.getElementsByClassName("img-change2");
        m1();

        function m1() {

            for (let i = 0; i < a_img.length; i++) {
                a_img[i].style.display = "block";
                b_img[i].style.display = "none";
            }
            //                  console.log("aaaaaa");
            setTimeout(m2, 7000);
        }

        function m2() {

            for (let i = 0; i < a_img.length; i++) {
                a_img[i].style.display = "none";
                b_img[i].style.display = "block";
            }
            //                  console.log("bbbbbb");
            setTimeout(m1, 7000);

        }
    </script>
@endsection
