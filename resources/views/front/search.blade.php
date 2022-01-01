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

<h1 class="main-title-h1">نتیجه جستجو برای:{{$query}} </h1>

<article class="article-background">
    <!-- breadcrumb -->

   
    <section class="articles-wrapper">
       
        <section class="articles">
        @foreach($articles as $article)
       @if($article->lang == app()->getLocale())
        @php
        $article->increment('views');
        @endphp
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

        @endif
        @endforeach
        </section>
        
    </section>
   
</article>



<!-- <section class="articles-wrapper"> -->


       
    <article>  
    
      
       
        <section class="articles-wrapper">
        <section class="articles">
        @foreach($services as $service)
            <div class="article">
                <div class="img-wrapper">
                    <img src="{{asset($service->image->path)}}" alt="{{$service->image->alt}}" title="{{$service->image->name}}">
                    <a href="{{route('front.services',$service->title)}}"></a>
                </div>
                <p> {{$service->title}}</p>
                <span class="article-text">
                    {!!Str::limit($service->text_1 , '400') !!}
                </span><span class="article-dots">...</span>
                <div class="article-bishtar">
                    <div>
                        <i class="fa fa-eye"></i>
                        <p>
                            بازدید{{$service->views}}
                        </p>
                    </div>

                    <div>
                        <i class="fa fa-calendar-alt"></i>
                        <p>
                            {{$service->created_at}}
                        </p>
                    </div>

                    <a href="{{route('front.services',$service->title)}}">
                        <span>بیشتر</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>  
        @endforeach
        </section>
         
        </section>
   
       
    <!-- </section> -->
 
</article>



<!-- DOOOOOKKMEEE -->

<section class="pagination-wrapper">
    <ul class="pagination">
  
        <!-- <li class="page-item">
            <a href="#" class="pagination-arrow" id="arrowRight-course-btns-pages"><i class="fas fa-arrow-right"></i></a>
        </li> -->
        <!-- <li class="page-item">
           
        </li> -->
        <!-- <li class="page-item">
            <a href="#" class="active">2</a>
        </li>
        <li class="page-item">
            <a href="#">3</a>
        </li>
        <li class="page-item">
            <a href="#" class="pagination-arrow" id="arrowLeft-course-btns-pages"><i class="fas fa-arrow-left"></i></a>
        </li> -->
    </ul>
</section>


@endsection