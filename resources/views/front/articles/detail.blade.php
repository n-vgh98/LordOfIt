@extends('front.layouts.master')
@section('main')
    <br />
    <br />
    <br />
    <br />
    <br />

    <!-- breadcrumb -->
    <section class="breadcrumb-section">
        <ul id="breadcrumbs">
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('front.articles.index') }}">مقالات</a></li>
            <li><a>{{ $article->title }}</a></li>
        </ul>
    </section>
    <h1 class="main-title-h1"> {{ $article->title }} </h1>
    <article class="article-wrapper-content">
        <section class="right-article-wrapper ">

            <div class="article-img-wrapper">
                <figure>
                    <img src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}"
                        title="{{ $article->image->name }}">
                </figure>
            </div>

            <section class="article-text-wrapper">
                <div>
                    {!! $article->text_1 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $article->v_link_1 }}
                </div>
                <div>
                    {!! $article->text_2 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $article->v_link_2 }}
                </div>
                <div>
                    {!! $article->text_3 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $article->v_link_3 }}
                </div>
                <div>
                    {!! $article->text_4 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $article->v_link_4 }}
                </div>

                <!-- <div class="article-page-wiriter">
                                                        <p><span>نویسنده:</span> امید فتاحی</p>
                                                    </div> -->
            </section>
        </section>


    </article>
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
                            <input type="hidden" name="model" value="article">
                            <input type="hidden" name="id" value="{{ $article->id }}">
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
    <div class="parenet-didgah">
        <div class="row-one-didgah">
            <p>دیدگاه شما...</p>
            <form action="{{ route('front.project.comments.store') }}" method="POST">
                @csrf
                <textarea type="text" name="didgah" class="textare-didgah"></textarea>
                <input type="hidden" name="comment" value="article">
                <input type="hidden" name="id" value="{{ $article->id }}">
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
    <script src="{{ asset('front/js/buttonNumber_All_pages.js') }}"></script>
    <script src="{{ asset('front/js/ArrowUpIcon.js') }}"></script>
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="{{ asset('front/js/btnEffect.js') }}"></script>
    <script src="{{ asset('front/js/menuWhithOutScroll.js') }}"></script>
    <script src="{{ asset('front/js/article-close.js') }}"></script>
    <script src="{{ asset('front/js/jqure.js') }}" type="text/javascript"></script>
@endsection
