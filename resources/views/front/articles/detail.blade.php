@extends('front.layouts.master')
@section('main')
<br/>
<br/>
<br/>
<br/>
<br/>

            <!-- breadcrumb -->
            <section class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('front.articles.index')}}">مقالات</a></li>
                    <li><a>{{$article->title}}</a></li>
                </ul>
            </section>
             <h1 class="main-title-h1"> {{$article->title}} </h1>
            <article class="article-wrapper-content">
                <section class="right-article-wrapper ">
                    
                    <div class="article-img-wrapper">
                        <figure>
                            <img src="{{asset($article->image->path)}}" alt="{{$article->image->alt}}" title="{{$article->image->name}}">
                        </figure>
                    </div>

                    <section class="article-text-wrapper">
                        <div>
                            {!! $article->text_1 !!}
                        </div>
                        <div class="video-1 article-video">
                            {{$article->v_link_1}}
                        </div>
                        <div>
                        {!! $article->text_2 !!}
                        </div>
                        <div class="video-1 article-video">
                            {{$article->v_link_2}}
                        </div>
                        <div>
                        {!! $article->text_3 !!}
                        </div>
                        <div class="video-1 article-video">
                            {{$article->v_link_3}}
                        </div>
                        <div>
                        {!! $article->text_4 !!}
                        </div>
                        <div class="video-1 article-video">
                            {{$article->v_link_4}}
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
                            <input type="hidden" name="comment" value="article">
                            <input type="hidden" name="id" value="{{ $article->id }}">
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
    @section('scripts')
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="{{ asset('front/js/btnEffect.js') }}"></script>
    <script src="{{ asset('front/js/buttonNumber_All_pages.js') }}"></script>
    <script src="{{ asset('front/js/course.js') }}"></script>
    <script src="{{ asset('front/js/menu-with-scroll.js') }}"></script>
@endsection
