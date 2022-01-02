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
            <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
            <li><a href="{{ route('front.courses.all') }}">{{ __('translation.amoozesh') }}</a></li>
            <li><a href="#">{{ $course->name }}</a></li>
        </ul>
    </section>
    <!-- course-content -->
    <h1 class="main-title-h1">{{ $course->title }}</h1>
    <article class="course-content">
        <button><a href="#" class="btn-course">{{ __('translation.course-add') }}</a></button>
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
                    <p>{{ __('translation.course-type') }} : {{ $course->type }}</p>
                    <p>{{ __('translation.course-level') }}: {{ $course->level }}</p>
                    <p>{{ __('translation.course-pre-need') }}: {{ $course->pre_need }}</p>
                    <p>{{ __('translation.course-sessions') }}: {{ $course->section }}</p>
                    <p>{{ __('translation.language') }} : {{ $course->lang }}</p>
                </div>
                <button><a href="#">{{ __('translation.course-add') }}</a></button>
            </section>
        </section>
    </article>

    <!-- Order guidance -->

    <article class="guidance-wrapper">
        <p class="guidance-list-wrapper-title">{{ __('translation.how-to-sign-courses') }}</p>
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
                        <span class="gudiance-txt">{{ __('translation.choose-favorite-course') }}
                        </span>
                    </li>
                    <li>
                        <span class="gudiance-num">2</span><span
                            class="gudiance-txt">{{ __('translation.fast-login') }}</span>
                    </li>
                    <li>
                        <span class="gudiance-num">3</span><span
                            class="gudiance-txt">{{ __('translation.sign-course') }} </span>
                    </li>
                </ul>
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
        @foreach ($comments as $comment)
            <!-- row one comment -->
            <div class="comments-div">
                <div class="row">
                    <img src="{{ asset('front/imgs/user-avatar.png') }}" alt="profile-photo">
                    <p>{{ $comment->writer->name }}</p>
                    <div class="text-comments">
                        <p>
                            {{ $comment->text }}
                        </p>

                    </div>
                    @if (auth()->check())
                        <div class="parent-amozesh-btn cm-btn">
                            <form action="">
                                <button id="pasokh" class="amozesh-btn cm-btn" type="button">
                                    <span>{{ __('translation.comment-answer') }}</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <p>{{ __('translation.login-text') }}</p>
                        <a href="{{ route('login') }}" class="amozesh-btn cm-btn">{{ __('translation.login') }}</a>
                    @endif
                </div>
                @foreach ($comment->answers as $answer)
                    @if ($answer->status == 1)
                        <div class="row">
                            @php
                                $roles = [];
                            @endphp
                            @foreach ($answer->writer->roles as $role)
                                @php
                                    array_push($roles, $role->name);
                                @endphp
                            @endforeach
                            @if (in_array('admin', $roles))
                                <img src="{{ asset('front/imgs/admin-avatar.jpg') }}" alt="profile-photo">
                                <p>{{ 'admin' }}</p>
                            @else
                                <img src="{{ asset('front/imgs/user-avatar.png') }}" alt="profile-photo">
                                <p>{{ $answer->writer->name }}</p>
                            @endif
                            <div class="text-comments">
                                <p>
                                    {{ $answer->text }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <form action="{{ route('front.project.comments.store') }}" method="POST">
                    @csrf
                    <div id="pasokh-div2" class="row">
                        <img src="{{ asset('front/imgs/user-avatar.png') }}" alt="profile-photo">
                        <p>{{ auth()->user()->name }}</p>
                        <div class="text-comments">
                            <textarea name="text" class="textarea-comment" rows="5" required="required"
                                placeholder="{{ __('translation.your-comment') }}"></textarea>
                        </div>
                        <div class="parent-amozesh-btn cm-btn">
                            <input type="hidden" name="comment" value="answer">
                            <input type="hidden" name="model" value="course">
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <button id="pasokh" class="amozesh-btn cm-btn" type="submit">
                                <span>{{ __('translation.send') }}</span>
                            </button>



                        </div>
                    </div>
                </form>

            </div>

        @endforeach
    </section>

    @auth

        <div class="parenet-didgah">
            <div class="row-one-didgah">
                <p>{{ __('translation.your-comment') }}</p>
                <form action="{{ route('front.project.comments.store') }}" method="POST">
                    @csrf
                    <textarea type="text" name="didgah" class="textare-didgah"></textarea>
                    <input type="hidden" name="comment" value="course">
                    <input type="hidden" name="id" value="{{ $course->id }}">
            </div>
            <div class="row-two-didgah">
                <button type="submit" class="amozesh-btn cm-btn didgah">
                    <span>{{ __('translation.send') }}</span>
                </button>
            </div>
            </form>
        </div>
    @endauth

@endsection
@section('scripts')
    <script src="{{ asset('front/js/buttonNumber_All_pages.js') }}"></script>
    <script src="{{ asset('front/js/ArrowUpIcon.js') }}"></script>
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="{{ asset('front/js/btnEffect.js') }}"></script>
    <script src="{{ asset('front/js/menuWhithOutScroll.js') }}"></script>
    <script src="{{ asset('front/js/article-close.js') }}"></script>
    <script src="{{ asset('front/js/jqure.js') }}" type="text/javascript"></script>


@endsection
