@extends('front.layouts.master')
@section('main')

    <form class="main-form" action="">

        <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
        <button type="submit">
            <i class="fa fa-search">
            </i>
        </button>
    </form>

    <section class="section-one-tarfe-page">
        <div class="wrapper-tarfe">
            <figure>
                <img src="{{ asset('front/imgs/tarfe_header.png') }}" alt="">
            </figure>

        </div>

        <ul class="tarefe-ul">
            @foreach ($languages as $language)
                @php
                    $category = $language->langable;
                @endphp
                <li><a href="#project-site">پروژه های {{ $category->title }}</a></li>
            @endforeach

        </ul>
    </section>
    <!-- breadcrumb -->
    <section class="breadcrumb-section">
        <ul id="breadcrumbs">
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('front.project.categories') }}">نمونه کار ها</a></li>
        </ul>
    </section>
    <h1 class="project-title-h1">نمونه پروژه های لورد آف آی تی</h1>
    <section class="article-wrapper-content">
        <section class="right-article-wrapper ">

            <div class="question-project">
                <p>چند تا سوال مهم ازتون دارم؟</p>
                <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                    کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
            </div>

            <section class="article-text-wrapper">




                <!--                           web examples project start                    -->
                @php
                    $i = 0;
                @endphp
                @foreach ($languages as $language)
                    @php
                        $category = $language->langable;
                        $i++;
                    @endphp
                    <div class="examples-project-main">
                        @if ($i == 1)
                            <h2 id="project-site" class="project-title-h2">پروژه های {{ $category->title }}</h2>
                        @else
                            <h3 id="project-site" class="project-title-h2">پروژه های {{ $category->title }}</h3>

                        @endif
                        <section class="examples-project">
                            @foreach ($category->samples as $sample)
                                <a href="#">
                                    <div class="examples-project-item">
                                        <img src="{{ asset($sample->image->path) }}" alt="{{ $sample->image->alt }}"
                                            title="{{ $sample->image->name }}">
                                        <p>{{ $sample->title }}</p>
                                    </div>
                                </a>
                            @endforeach

                        </section>
                        <a class="more-examples" href="#">بیشتر...</a>
                    </div>
                @endforeach
                <!--                           web examples project end                    -->
            </section>

        </section>

        <section class="left-article-wrapper">

            <!--                           Development examples project start                    -->
            <div class="examples-project-main">

                <p class="project-title-h2">در حال پیشرفت</p>
                <section class="examples-project-left">

                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>

                </section>

            </div>
            <!--                           Development examples project end                    -->
            <!--                           more newer examples project start                    -->
            <div class="examples-project-main">

                <p class="project-title-h2">جدید ترین ها</p>
                <section class="examples-project-left">

                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/مزیت داشتن سایت.png" alt="">
                            <p>عنوان</p>
                        </div>
                    </a>

                </section>

            </div>
            <!--                           more newer examples project start                    -->

        </section>
    </section>
    <div class="title title-comments">
        <p>نظرات کاربران </p>
    </div>
    <section class="comments">
        <!-- row one comment -->
        <div class="row">
            <img src="imgs/photo-profile.jpg" alt="profile-photo">
            <div class="text-comments">
                بنظرم محتوای خیلی خوبی داشت
            </div>

            <div class="parent-amozesh-btn cm-btn">
                <form action="">
                    <button class="amozesh-btn cm-btn" type="submit">
                        <span>پاسخ</span>
                    </button>
                </form>

            </div>
        </div>
        <!-- row two comment-->
        <div class="row">
            <img src="imgs/photo-profile-2.jpg" alt="profile-photo">
            <div class="text-comments">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                چاپگرها
                و متون بلکه روزنامه
                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با
                هدف
                بهبود ابزارهای
                کاربردی می باشد.
            </div>
            <div class="parent-amozesh-btn cm-btn">
                <form action="">
                    <button class="amozesh-btn cm-btn" type="submit">
                        <span>پاسخ</span>
                    </button>
                </form>
            </div>
        </div>


    </section>
    <section class="pagination-wrapper">
        <ul class="pagination">
            <li class="page-item">
                <a href="#" class="pagination-arrow" id="arrowRight-course-btns-pages"><i
                        class="fas fa-arrow-right"></i></a>
            </li>
            <li class="page-item">
                <a href="#">1</a>
            </li>
            <li class="page-item">
                <a href="#" class="active">2</a>
            </li>
            <li class="page-item">
                <a href="#">3</a>
            </li>
            <li class="page-item">
                <a href="#" class="pagination-arrow" id="arrowLeft-course-btns-pages"><i class="fas fa-arrow-left"></i></a>
            </li>
        </ul>
    </section>



    <div class="parenet-didgah">
        <div class="row-one-didgah">
            <p>دیدگاه شما...</p>
            <form>
                <textarea type="text" name="didgah" class="textare-didgah"></textarea>
            </form>
        </div>
        <div class="row-two-didgah">

            <form action="">
                <input type="text" name="" id="" placeholder="نام خانوادگی">
                <input type="mail" name="" id="" placeholder="ایمیل">
                <button class="amozesh-btn cm-btn didgah">
                    <span>ارسال</span>
                </button>
            </form>
        </div>
    </div>
@endsection
