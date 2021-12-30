@extends('front.layouts.master')
@section('main')

{{-- <form class="main-form" action="">

    <input type="text" name="" id="" placeholder="دنبال چی میگردی؟">
    <button type="submit">
        <i class="fa fa-search">
        </i>
    </button>
</form> --}}



<section class="breadcrumb-section">
    <ul id="breadcrumbs">
        <li><a href="#">خانه</a></li>
        <li><a href="#">آموزش</a></li>
        <li><a href="#">مقالات</a></li>
    </ul>
</section>

<h1 class="main-title-h1">مقالات </h1>

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




<article class="article-background">
    <!-- breadcrumb -->
    <h2 class="article-title-h2">جدید ترین ها</h2>

    <section class="articles-wrapper">
        @foreach ($languages as $language)
        @php
        $article = $language->langable;
        $article->orderBy('created_at','desc')
        ->paginate('4');
        $article->increment('views');
        @endphp
        <section class="articles">
            <div class="article">
                <div class="img-wrapper">
                    <img src="{{asset($article->image->path)}}" alt="{{$article->image->alt}}" title="{{$article->image->name}}">
                    <a href="{{route('front.articles.show',$article->slug)}}"></a>
                </div>
                <p> {{$article->title}}</p>
                <span class="article-text">
                    {!!Str::limit($article->text_1 , '400') !!}
                </span><span class="article-dots">...</span>
                <div class="article-bishtar">


                    <div>
                        <i class="fa fa-eye"></i>
                        <p>
                            بازدید{{$article->views}}
                        </p>
                    </div>

                    <div>
                        <i class="fa fa-calendar-alt"></i>
                        <p>
                            {{$article->created_at}}
                        </p>
                    </div>

                    <a href="{{route('front.articles.show',$article->slug)}}">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>


        </section>
        @endforeach
    </section>

</article>

<article class="article-background">
    <!-- breadcrumb -->
    <h3 class="article-title-h2">پر بازدید</h3>


    <section class="articles-wrapper">

        <section class="articles">
            <div class="article">
                <div class="img-wrapper">
                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="article-pic">
                    <a href="#"></a>
                </div>
                <p>کسب و کار سنتی یا دیجیتال؟</p>
                <span class="article-text">اولین سوالی که ممکن است با شنیدن این دو کلمه ( کسب و کار سنتی و
                    کسب و کار دیجیتال) برایتان ایجاد شود این است که چه تفاوتی بین این دو هست، در این مقاله
                    به معرفی کسب و کار دیجیتال و کسب و کار سنتی و تفاوت این دو مدل کسب و کار می پردازیم. با
                    ما همراه باشید.



                    کسب وکار سنتی: به مجموعه عملیاتی که در فضای واقعی سبب فروش محصولات و خدمات می شود کسب و
                    کار سنتی می گویند که به آن trading marketing هم گفته می شود.

                </span><span class="article-dots">...</span>
                <div class="article-bishtar">
                    <a href="#">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="article">
                <div class="img-wrapper">
                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="article-pic">
                    <a href="#"></a>
                </div>
                <p>کسب و کار سنتی یا دیجیتال؟</p>
                <span class="article-text">اولین سوالی که ممکن است با شنیدن این دو کلمه ( کسب و کار سنتی و
                    کسب و کار دیجیتال) برایتان ایجاد شود این است که چه تفاوتی بین این دو هست، در این مقاله
                    به معرفی کسب و کار دیجیتال و کسب و کار سنتی و تفاوت این دو مدل کسب و کار می پردازیم. با
                    ما همراه باشید.



                    کسب وکار سنتی: به مجموعه عملیاتی که در فضای واقعی سبب فروش محصولات و خدمات می شود کسب و
                    کار سنتی می گویند که به آن trading marketing هم گفته می شود.

                </span><span class="article-dots">...</span>
                <div class="article-bishtar">
                    <a href="#">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            <div class="article">
                <div class="img-wrapper">
                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="article-pic">
                    <a href="#"></a>
                </div>
                <p>کسب و کار سنتی یا دیجیتال؟</p>
                <span class="article-text">اولین سوالی که ممکن است با شنیدن این دو کلمه ( کسب و کار سنتی و
                    کسب و کار دیجیتال) برایتان ایجاد شود این است که چه تفاوتی بین این دو هست، در این مقاله
                    به معرفی کسب و کار دیجیتال و کسب و کار سنتی و تفاوت این دو مدل کسب و کار می پردازیم. با
                    ما همراه باشید.



                    کسب وکار سنتی: به مجموعه عملیاتی که در فضای واقعی سبب فروش محصولات و خدمات می شود کسب و
                    کار سنتی می گویند که به آن trading marketing هم گفته می شود.

                </span><span class="article-dots">...</span>
                <div class="article-bishtar">
                    <a href="#">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            <div class="article">
                <div class="img-wrapper">
                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="article-pic">
                    <a href="#"></a>
                </div>
                <p>کسب و کار سنتی یا دیجیتال؟</p>
                <span class="article-text">اولین سوالی که ممکن است با شنیدن این دو کلمه ( کسب و کار سنتی و
                    کسب و کار دیجیتال) برایتان ایجاد شود این است که چه تفاوتی بین این دو هست، در این مقاله
                    به معرفی کسب و کار دیجیتال و کسب و کار سنتی و تفاوت این دو مدل کسب و کار می پردازیم. با
                    ما همراه باشید.



                    کسب وکار سنتی: به مجموعه عملیاتی که در فضای واقعی سبب فروش محصولات و خدمات می شود کسب و
                    کار سنتی می گویند که به آن trading marketing هم گفته می شود.

                </span><span class="article-dots">...</span>
                <div class="article-bishtar">
                    <a href="#">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>


        </section>
    </section>



</article>
<!-- DOOOOOKKMEEE -->
<section class="pagination-wrapper">
    <ul class="pagination">
        <li class="page-item">
            <a href="#" class="pagination-arrow" id="arrowRight-course-btns-pages"><i class="fas fa-arrow-right"></i></a>
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


@endsection