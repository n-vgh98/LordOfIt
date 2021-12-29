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


    </section>
    <!-- breadcrumb -->
    <section class="breadcrumb-section">
        <ul id="breadcrumbs">
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('front.project.categories') }}">نمونه کار ها</a></li>

        </ul>
    </section>
    <h1 class="project-title-h1">نمونه پروژه های {{ $samples[0]->category->title }}</h1>
    <section class="article-wrapper-content">
        <section class="right-article-wrapper-full">

            <div class="question-project">
                <p>عنوان توضیحات کلی در مورد سایت ها</p>
                <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                    کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
            </div>

            <section class="article-text-wrapper">

                <!--                           examples project-demo first start                  -->
                <div class="examples-project-main">

                    <h2 id="project-id1" class="project-title-h2">پروژه های {{ $samples[0]->category->title }}</h2>
                    <section class="examples-project-full">
                        @if ($samples[0]->category->title == 'UI/UX' or $samples[0]->category->title == 'UX/UI' or $samples[0]->category->title == 'گرافیک' or $samples[0]->category->title == 'Graphic' or $samples[0]->category->title == 'graphic')
                            @foreach ($samples as $sample)
                                <a href="#">
                                    <div class="examples-project-item">
                                        <img onClick="bigPhoto(this)" src="{{ asset($sample->image->path) }}"
                                            alt="{{ $sample->image->alt }}" title="{{ $sample->image->name }}">
                                        <p>{{ $sample->title }}</p>
                                        <p>@php
                                            echo strip_tags(html_entity_decode($sample->text));
                                        @endphp
                                        </p>
                                    </div>
                                </a>
                            @endforeach

                        @else
                            @foreach ($samples as $sample)
                                <a href="{{ $sample->link }}">
                                    <div class="examples-project-item">
                                        <img src="{{ $sample->image->path }}" alt="{{ $sample->image->alt }}"
                                            title="{{ $sample->image->name }}">
                                        <p>{{ $sample->title }}</p>
                                        <p></p>
                                    </div>
                                </a>
                            @endforeach

                        @endif



                    </section>
                </div>
                <!--                           examples project-demo first start                  -->
            </section>
        </section>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('front/js/bigPhoto.js') }}" type="text/javascript"></script>
@endsection
