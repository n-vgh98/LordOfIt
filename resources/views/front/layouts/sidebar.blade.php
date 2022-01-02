<section class="left-article-wrapper">
    <section class="article-input-wrapper">
        {!! Form::open(['method'=>'GET' , 'action'=>'App\Http\Controllers\Front\FrontSearchController@searchTitle', 'class' => 'article-input-group']) !!}
        <input type="text" name="title" id="title" placeholder="جستجو ...">
        <span>
            <i class="fa fa-search"></i>
        </span>
        {!! Form::close() !!}
        <div class="article-category">
            <h4>آخرین مقالات</h4>
            @php
            $side_article = App\Models\Article::all()->sortBy('created_at')->take(5);
            @endphp
            <div class="article-category-list">
                @foreach($side_article as $side)
                <div>
                    <i class="fa fa-chevron-left "></i>
                    @if($side->lang->name == app()->getLocale())
                    <a href="{{route('front.articles.show',[$side->id,$side->slug])}}"><span>{{$side->title}}</span>
                        @endif
                </div>
                @endforeach
            </div>

        </div>

        <!-- <div class="article-adds">
                            <span class="article-adds-close">
                                <i class="fas fa-times"></i>
                            </span>
                            <h4>تبلیغات</h4>
                            <div class="article-content">
                                <div class="article-content-adds">
                                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="">
                                    <p>عنوان دوره : دوره گرافیک</p>
                                    <span class="article-img-caption">دوره ی آموزش طراحی UI/UX توسعه گران جهان رایانه،
                                        طی 7 جلسه، فراگیر را با طراحی UI/UX آشنا می کند.</span>
                                </div>
                                <div class="article-content-adds">
                                    <img src="imgs/1629958522www.tahkimghias.comانتقال مال به غیر.jpg" alt="">
                                    <p class="article-content-head">عنوان دوره : دوره گرافیک</p>
                                    <span class="article-img-caption">دوره ی آموزش طراحی UI/UX توسعه گران جهان رایانه،
                                        طی 7 جلسه، فراگیر را با طراحی UI/UX آشنا می کند.</span>
                                </div>
                            </div>
                        </div> -->
    </section>
</section>