@extends('front.layouts.master')
@section('meta_key')
    {{ $course->meta_keywords }}
@endsection
@section('meta_des')
    {{ $course->meta_description }}
@endsection
@section('main')

    <br><br><br><br><br>
    <!-- breadcrumb-section  -->
    <section class="breadcrumb-section breadcrumb-course">
        <ul id="breadcrumbs">
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('front.courses.all') }}">آموزش</a></li>
        </ul>
    </section>
    <!-- course-content -->
    <h1 class="main-title-h1">{{ $course->title }}</h1>
    <article class="course-content">
        <button><a href="#" class="btn-course">شرکت در دوره</a></button>
        <section class="course-content-wrapp ">
            <article class="course-description">
                <section class="course-pic course-bg">
                    <figure>
                        <img src="{{ asset($course->image->path) }}" alt="{{ $course->image->alt }}"
                            title="{{ $course->image->name }}">
                    </figure>
                </section>
                <section class="course-supp course-bg">
                    <h2>توضیحات تکمیلی</h2>
                    <p>{!! $course->description !!}</p>
                </section>
                <section class="course-Contents course-bg">
                    <h3>فهرست سرفصل های مطرح شده در این دوره</h3>
                    <h3>{{ $course->name }} :</h3>
                    <p>{!! $course->topic_list !!}</p>

                </section>
            </article>
            <section class="course-Info-wrapper course-bg">
                <div class="course-Info">
                    <p>نوع دوره : {{ $course->type }}</p>
                    <p>سطح دوره: {{ $course->level }}</p>
                    <p>پیش نیاز : {{ $course->pre_need }}</p>
                    <p>تعداد جلسات: {{ $course->section }}</p>
                    <p>زبان : {{ $course->lang }}</p>
                </div>
                <button><a href="#">شرکت در دوره</a></button>
            </section>
        </section>
    </article>

    <!-- Order guidance -->

    <article class="guidance-wrapper">
        <p class="guidance-list-wrapper-title">راهنمای سفارش آموزش ها</p>
        <section class="gudiance-content">
            <section class="guidance-pic">
                <figure>
                    <img src="{{ asset('front/imgs/guidance 1d1.png') }}" alt="guidance">
                </figure>
            </section>
            <section class="guidance-list-wrapper">
                <ul class="guidance-list">
                    <li>
                        <span class="gudiance-num">1</span>
                        <span class="gudiance-txt">انتخاب دوره مورد علاقه
                            شما
                        </span>
                    </li>
                    <li>
                        <span class="gudiance-num">2</span><span class="gudiance-txt">ثبت نام سریع و ورود به
                            سایت</span>
                    </li>
                    <li>
                        <span class="gudiance-num">3</span><span class="gudiance-txt">ثبت سفارش </span>
                    </li>
                </ul>
                <p>در مورد این آموزش یا نحوه تهیه آن <span><a href="#">سوالی</a></span> دارید؟</p>
            </section>
        </section>
    </article>
    @if (count($languages) > 4 and $i < 5)
        <section class="related-courses">
            <h3 class="main-title-h1 main-title-h2">دوره های مرتبط</h3>
            <section class="related-courses-content">
                @php
                    $i = 0;
                @endphp
                @foreach ($languages as $language)
                    @php
                        $i++;
                        $course1 = $language->langable;
                    @endphp
                    @if ($i < 5)
                        <div class="related-courses-item">
                            <figure>
                                <a href="{{ route('front.courses.show', $course->id) }}"><img
                                        src="{{ asset($course1->image->path) }}" alt="{{ $course1->image->alt }}"
                                        title="{{ $course1->image->name }}"></a>
                            </figure>
                        </div>
                    @endif

                @endforeach
            </section>
        </section>
    @endif


    <div class="title title-comments">
        <p>نظرات کاربران </p>
    </div>
    <section class="comments">
        <!-- row one comment -->
        @foreach ($comments as $comment)

            <div class="comments-div">
                <div class="row">
                    <img src="imgs/photo-profile.jpg" alt="profile-photo">
                    <p>{{ $comment->writer->name }}</p>
                    <div class="text-comments">
                        {{ $comment->text }}
                    </div>

                    <div class="parent-amozesh-btn cm-btn">
                        <form action="">
                            <button class="amozesh-btn cm-btn" type="submit">
                                <span>پاسخ</span>
                            </button>
                        </form>
                    </div>
                </div>
                @foreach ($comment->answers as $answer)
                    <div class="row">
                        <img src="{{ asset($answer->writer->profile) }}" alt="profile-photo">
                        <p>{{ $answer->writer->name }}</p>
                        <div class="text-comments">
                            {{ $answer->text }}
                        </div>
                    </div>
                @endforeach
                <div class="parenet-didgah">
                    <div class="row-one-didgah">
                        <p>پاسخ شما به این کامنت</p>
                        <form action="{{ route('front.project.comments.store') }}" method="POST">
                            @csrf
                            <textarea type="text" name="didgah" class="textare-didgah"></textarea>
                            <input type="hidden" name="comment" value="course">
                            <input type="hidden" name="id" value="{{ $course->id }}">
                    </div>
                    <div class="row-two-didgah">
                        <button type="submit" class="amozesh-btn cm-btn didgah">
                            <span>پاسخ</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        @endforeach


    </section>
    <div class="parenet-didgah">
        <div class="row-one-didgah">
            <p>دیدگاه شما...</p>
            <form action="{{ route('front.project.comments.store') }}" method="POST">
                @csrf
                <textarea type="text" name="didgah" class="textare-didgah"></textarea>
                <input type="hidden" name="comment" value="course">
                <input type="hidden" name="id" value="{{ $course->id }}">
        </div>
        <div class="row-two-didgah">
            <button type="submit" class="amozesh-btn cm-btn didgah">
                <span>ارسال</span>
            </button>
        </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="{{ asset('front/js/btnEffect.js') }}"></script>
    <script src="{{ asset('front/js/buttonNumber_All_pages.js') }}"></script>
    <script src="{{ asset('front/js/course.js') }}"></script>
    <script src="{{ asset('front/js/menu-with-scroll.js') }}"></script>
@endsection
