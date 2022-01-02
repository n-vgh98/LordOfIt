@extends('front.layouts.master')
@section('main')

    <!-- {{-- <form class="main-form" action="">

    <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
    <button type="submit">
        <i class="fa fa-search">
        </i>
    </button>
</form> --}} -->



    <form class="main-form" action="">
        <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
        <button type="submit">
            <i class="fa fa-search">
            </i>
        </button>
    </form>

    <!-- breadcrumb -->
    <section class="breadcrumb-section">
        <ul id="breadcrumbs">
            <li><a href="#">خانه</a></li>
            <li><a href="#">آموزش</a></li>
            <li><a href="#">مقالات</a></li>
        </ul>
    </section>
    <h1 class="main-title-h1"> {{ $service->title }} </h1>
    <article class="article-wrapper-content">
        <section class="right-article-wrapper ">

            <div class="article-img-wrapper">
                <figure>
                    <img src="{{ asset($service->image->path) }}" alt="{{ $service->image->alt }}"
                        title="{{ $service->image->name }}">
                </figure>
            </div>

            <section class="article-text-wrapper">
                <div>
                    {!! $service->text_1 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $service->v_link_1 }}
                </div>
                <div>
                    {!! $service->text_2 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $service->v_link_2 }}
                </div>
                <div>
                    {!! $service->text_3 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $service->v_link_3 }}
                </div>
                <div>
                    {!! $service->text_4 !!}
                </div>
                <div class="video-1 article-video">
                    {{ $service->v_link_4 }}
                </div>

                <!-- <div class="article-page-wiriter">
                                        <p><span>نویسنده:</span> امید فتاحی</p>
                                    </div> -->
            </section>
        </section>

        @include('front.layouts.sidebar')
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
                            <input type="hidden" name="model" value="service">
                            <input type="hidden" name="id" value="{{ $service->id }}">
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
            <form action="{{ route('front.project.comments.store') }}" method="POST">
                @csrf
                <textarea type="text" name="didgah" class="textare-didgah"></textarea>
                <input type="hidden" name="comment" value="service">
                <input type="hidden" name="id" value="{{ $service->id }}">
        </div>
        <div class="row-two-didgah">
            <button type="submit" class="amozesh-btn cm-btn didgah">
                <span>ارسال</span>
            </button>
        </div>
        </form>
    </div>
