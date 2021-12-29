@extends('front.layouts.master')
@section('main')

    <div id="big-photo-id" class="big-photo">
        <i onClick="closePhoto()" class="fas fa-times"></i>
        <div class="big-photo-divImg">
            <img id="big-photo-show" src="imgs/Content-production.jpg" alt="">
        </div>
    </div>

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
                        @if ($category->title == 'UI/UX' or $category->title == 'UX/UI' or $category->title == 'گرافیک' or $category->title == 'Graphic' or $category->title == 'graphic')
                            <section class="examples-project">
                                @foreach ($category->samples as $sample)
                                    <a href="#">
                                        <div class="examples-project-item">
                                            <img onClick="bigPhoto(this)" src="{{ asset($sample->image->path) }}"
                                                alt="{{ $sample->image->alt }}" title="{{ $sample->image->name }}">
                                            <p>{{ $sample->title }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </section>
                        @else
                            <section class="examples-project">
                                @foreach ($category->samples as $sample)
                                    <a href="{{ $sample->link }}">
                                        <div class="examples-project-item">
                                            <img src="{{ asset($sample->image->path) }}"
                                                alt="{{ $sample->image->alt }}" title="{{ $sample->image->name }}">
                                            <p>{{ $sample->title }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </section>
                        @endif
                        <a class="more-examples" href="{{ route('front.project.show', $category->id) }}">بیشتر...</a>
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
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                            $i++;
                            $category = $language->langable;
                        @endphp
                        @foreach ($category->samples as $sample)
                            @if ($sample->status == 2 and $i < 4)
                                <a href="#">
                                    <div class="examples-project-item">
                                        <img onClick="bigPhoto(this)" src="{{ asset($sample->image->path) }}"
                                            alt="{{ $sample->image->alt }}" title="{{ $sample->image->name }}">
                                        <p>{{ $sample->title }}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach

                    @endforeach



                </section>

            </div>
            <!--                           Development examples project end                    -->


            {{-- jadidtarin ha be soorate adi khodesh miad niazi be in ghesmat nist --}}
            {{-- <!--                           more newer examples project start                    -->
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
            <!--                           more newer examples project start                    --> --}}

        </section>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('front/js/bigPhoto.js') }}" type="text/javascript"></script>
@endsection
