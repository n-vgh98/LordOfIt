@extends('front.layouts.master')

@section('main')
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
                <li><a href="#{{ $category->title }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </section>
    <!-- start title -->
    <h1 class="main-title-h1">تعرفه خدمات</h1>
    <article class="text-tarefe">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده

        </p>

    </article>

    @foreach ($languages as $language)
        @php
            $category = $language->langable;
        @endphp
        <div class="title-tarefe">
            <h2 id="{{ $category->title }}">تعرفه {{ $category->title }}</h2>
            <p>عوامل موثر بر تعیین {{ $category->title }}:</p>
        </div>
        <!-- end title -->

        <!-- start article-tarefe-page -->
        <article class="text-tarefe-tow">

            <p>
                {!! $category->text !!}
            </p>

        </article>
        <!-- end article-tarefe-page -->

        @foreach ($category->subcategories as $subcategory)
            @if ($category->title == 'گرافیک' or $category->title == 'Graphic')

            @else
                <!-- start title -->
                <div class="title-tarefe">
                    <p>پلن های {{ $subcategory->title }}</p>
                </div>
                <!-- end title -->
            @endif



            @if ($category->title == 'گرافیک' or $category->title == 'Graphic')
                <!-- Start Table Section -->
                <section class="graphic-services">

                    <table class="blueTable">
                        <caption>خدمات گرافیک</caption>
                        <thead>
                            <tr>
                                <th>نوع خدمات</th>
                                <th>قیمت</th>
                                <th>مدت زمان</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->subcategories as $subcategory)
                                @foreach ($subcategory->services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->time }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    <div class="table-btn-wrapper">
                        <button class="table-btn"><a href="#">مشاوره رایگان</a></button>
                    </div>
                </section>
                <!-- end Table Section -->
            @else
                <!-- start section-one for swiper slider - pelan -->

                <section class="tarfe-swiper-slider-parent">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper ">
                            <!-- box-one-tarfe-swiper-slider -->
                            @foreach ($subcategory->services as $service)
                                <div class="swiper-slide box-swiper-tarfe">
                                    <p>پلن {{ $service->name }}</p>
                                    <p>{{ $service->price }}</p>

                                    <nav class="parent-ul-tarfe-box-swiper">
                                        @php
                                            $attributes = explode('|', $service->attributes);
                                        @endphp
                                        <ul>
                                            @foreach ($attributes as $attribute)
                                                <li>{{ $attribute }}</li>
                                            @endforeach
                                            @if (count($attributes) < 11)
                                                @php
                                                    $i = 7 - count($attributes);
                                                    $x = 0;
                                                @endphp
                                                @while ($x < $i)
                                                    <li>
                                                        {{ '_________________' }}
                                                    </li>
                                                    @php
                                                        $x++;
                                                    @endphp
                                                @endwhile

                                            @endif


                                        </ul>

                                    </nav>

                                    <div class="btn-swiper-tarefe">
                                        <a href="#">مشاوره رایگان</a>
                                    </div>

                                </div>
                                <!-- box-two-tarfe-swiper-slider -->
                            @endforeach


                        </div>

                </section>
            @endif



        @endforeach
    @endforeach
    <!-- end section-one for swiper slider - pelan -->




@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('front/js/menu-with-scroll.js') }}"></script>
    <script src="{{ asset('front/js/Tarefe.js') }}"></script>
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="front/js/ArrowUpIcon.js"></script>
@endsection
