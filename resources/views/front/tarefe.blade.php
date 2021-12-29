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
                <li><a href="#{{ $category->title }}">طراحی سایت</a></li>
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

    <div class="title-tarefe">
        <h2 id="tarahi-site">تعرفه طراحی سایت</h2>
        <p>عوامل موثر بر تعیین طراحی سایت:</p>
    </div>
    <!-- end title -->

    <!-- start article-tarefe-page -->
    <article class="text-tarefe-tow">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده
        </p>

    </article>
    <!-- end article-tarefe-page -->

    <!-- start title -->
    <div class="title-tarefe">
        <p>پلن های ویژه</p>
    </div>
    <!-- end title -->

    <!-- start section-one for swiper slider - pelan -->

    <section class="tarfe-swiper-slider-parent">


        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                <!-- box-one-tarfe-swiper-slider -->
                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن پایه</p>
                    <p>640 هزار تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>

                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-two-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اقتصادی</p>
                    <p>1.3 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-three-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن حرفه ای </p>
                    <p>2.4 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>

                <!-- box-four-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اختصاصی</p>
                    <p>2.9 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- end section-one for swiper slider - pelan -->


    <!-- start title -->
    <div class="title-tarefe">
        <p>سایت های ویژه</p>
    </div>
    <!-- end title -->

    <!-- start section-two for swiper slider - pelan -->

    <section class="tarfe-swiper-slider-parent">


        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                <!-- box-one-tarfe-swiper-slider -->
                <div class="swiper-slide box-swiper-tarfe">
                    <p>سایت پزشکی</p>
                    <p>3.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-two-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>سایت چند منظوره</p>
                    <p>5.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-three-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>سایت شرکتی </p>
                    <p>4.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>

                <!-- box-four-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>سایت خبری</p>
                    <p>2.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- end section-two for swiper slider - pelan -->


    <!-- start title -->
    <div class="title-tarefe">
        <p>سایت فروشگاهی</p>
    </div>
    <!-- end title -->


    <!-- start section-three for swiper slider - pelan -->

    <section class="tarfe-swiper-slider-parent">


        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                <!-- box-one-tarfe-swiper-slider -->
                <div class="swiper-slide box-swiper-tarfe">
                    <p>فروشگاه اینترنتی پایه</p>
                    <p>4.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-two-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>فروشگاه اینترنتی کامل</p>
                    <p>5.5 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-three-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>فروشگاه اینترنتی حرفه ای </p>
                    <p>9 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>

                <!-- box-four-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>فروشگاه اینترنتی فوق حرفه ای</p>
                    <p>21 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- end section-three for swiper slider - pelan -->


    <!-- start title -->
    <div class="title-tarefe UI_UX_title">
        <p>سایت اختصاصی</p>

    </div>
    <!-- end title -->

    <!-- start special site section  -->

    <section class="special-site-parent-tarefe-page">
        <!-- start box-one -->
        <div class="tarefe-box-wrapper">
            <p>سایت اختصاصی</p>
            <p>شروع از 5 میلیون تومان</p>

            <nav class="tarfe-boxes">
                <ul>
                    <li>نصب قالب اماده</li>
                    <li> سیستم مدیریت محتوا وردپرس</li>
                    <li>مدیریت منوی سایت</li>
                    <li>اجرا اصول پایه سئو</li>
                    <li> گالری تصاویرو اسلایدر </li>
                    <li>معرفی شبکه های اجتماعی</li>
                    <li>طراحی واکنش گرا</li>


                </ul>

            </nav>

            <div class="btn-swiper-tarefe">
                <a href="#">مشاوره رایگان</a>
            </div>

        </div>
        <!-- end box-one -->
    </section>

    <!-- end special site section  -->

    <!-- start title -->
    <div class="title-tarefe UI_UX_title">
        <h3 id="tarefe-ui-ux">تعرفه UX/UI</h3>
        <p>عوامل موثر بر تعیین طراحی سایت</p>
    </div>
    <!-- end title -->



    <!-- start article-tarefe-page -->
    <article class="text-tarefe">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده

        </p>

    </article>
    <!-- end article-tarefe-page -->

    <!-- start section-two-boxes ui/ux -->
    <section class="tarfe-swiper-slider-parent">


        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                <!-- box-one-tarfe-swiper-slider -->
                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن پایه</p>
                    <p>640 هزار تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>

                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-two-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اقتصادی</p>
                    <p>1.3 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-three-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن حرفه ای </p>
                    <p>2.4 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>

                <!-- box-four-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اختصاصی</p>
                    <p>2.9 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>
    <!-- end section-two-boxes ui/ux -->


    <!-- start title -->
    <div class="title-tarefe UI_UX_title">
        <h3 id="khadamat-graphic">تعرفه خدمات گرافیک</h3>
        <p>عوامل موثر بر خدمات گرافیکی</p>
    </div>
    <!-- end title -->



    <!-- start article-tarefe-page -->
    <article class="text-tarefe">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده

        </p>

    </article>
    <!-- end article-tarefe-page -->

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
                <tr>
                    <td>بنر وبمستر</td>
                    <td>80-250</td>
                    <td>1 - 2 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>کارت ویزیت</td>
                    <td>50-200</td>
                    <td>1 - 2 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>کاتالوگ و بروشور و ست اداری</td>
                    <td>100-300</td>
                    <td>1 - 3 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>قالب پست و استوری اینستاگرام</td>
                    <td>500-1/5</td>
                    <td>3 - 7 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>طراحی لوگو</td>
                    <td>300-2</td>
                    <td>3 - 6 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>ui/ux</td>
                    <td>3-500</td>
                    <td>7 - 10 &nbsp; روز</td>
                </tr>
                <tr>
                    <td>طراحی سر رسید و پلتر</td>
                    <td>500-2</td>
                    <td>5 - 7 &nbsp; روز</td>
                </tr>

            </tbody>
        </table>

        <div class="table-btn-wrapper">
            <button class="table-btn"><a href="#">مشاوره رایگان</a></button>
        </div>
    </section>
    <!-- end Table Section -->

    <!-- start title -->
    <div class="title-tarefe title-seo">
        <h3 id="seo-content">تعرفه طراح سئو و تولید محتوا</h3>
        <p>عوامل موثر بر سیو و تولید محتوا</p>
    </div>
    <!-- end title -->


    <!-- start article-tarefe-page -->
    <article class="text-tarefe">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده

        </p>

    </article>
    <!-- end article-tarefe-page -->
    <!-- Start Pakage-Box Section -->
    <article class="pakage-sec-wrapper">

        <section>

            <div class="pakage-sec">
                <div class="pakage-head">
                    <p class="pakage-sec-p">پکیج نقره ای </p>
                    <p><span>ماهیانه 8 میلیون تومان</span> (مدت زمان پروژه 12 ماه)</p>
                </div>
                <div class="pakage-text-wrapper">
                    <div class="pakage-text-right">
                        <p>تولید محتوا حداقل 16000 کلمه</p>
                        <p>تولید محتوا برای محصولات یا خدمات تا 5000 کلمه</p>
                        <p>تولید کامنت در سایت تا 1000 کلمه</p>
                        <p>پیدا کردن کلمات کلیدی</p>
                        <p>افزایش رتبه حداقل 50 کلمه کلیدی</p>
                    </div>
                    <div class="pakage-text-left">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                    </div>

                    <!-- khastin text ezafe konin dar in ghesmat  -->

                    <div class="pakage-text-continue">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>

                    </div>
                </div>
                <div class="pakage-btn-wrapper">
                    <button class="pakage-btn">بیشتر</button>
                </div>
            </div>

        </section>

        <section>

            <div class="pakage-sec">
                <div class="pakage-head">
                    <p class="pakage-sec-p">پکیج نقره ای </p>
                    <p><span>ماهیانه 8 میلیون تومان</span> (مدت زمان پروژه 12 ماه)</p>
                </div>
                <div class="pakage-text-wrapper">
                    <div class="pakage-text-right">
                        <p>تولید محتوا حداقل 16000 کلمه</p>
                        <p>تولید محتوا برای محصولات یا خدمات تا 5000 کلمه</p>
                        <p>تولید کامنت در سایت تا 1000 کلمه</p>
                        <p>پیدا کردن کلمات کلیدی</p>
                        <p>افزایش رتبه حداقل 50 کلمه کلیدی</p>
                    </div>
                    <div class="pakage-text-left">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                    </div>

                    <!-- khastin text ezafe konin dar in ghesmat  -->

                    <div class="pakage-text-continue">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>

                    </div>
                </div>
                <div class="pakage-btn-wrapper">
                    <button class="pakage-btn">بیشتر</button>
                </div>
            </div>

        </section>


        <section>

            <div class="pakage-sec">
                <div class="pakage-head">
                    <p class="pakage-sec-p">پکیج نقره ای </p>
                    <p><span>ماهیانه 8 میلیون تومان</span> (مدت زمان پروژه 12 ماه)</p>
                </div>
                <div class="pakage-text-wrapper">
                    <div class="pakage-text-right">
                        <p>تولید محتوا حداقل 16000 کلمه</p>
                        <p>تولید محتوا برای محصولات یا خدمات تا 5000 کلمه</p>
                        <p>تولید کامنت در سایت تا 1000 کلمه</p>
                        <p>پیدا کردن کلمات کلیدی</p>
                        <p>افزایش رتبه حداقل 50 کلمه کلیدی</p>
                    </div>
                    <div class="pakage-text-left">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                    </div>

                    <!-- khastin text ezafe konin dar in ghesmat  -->

                    <div class="pakage-text-continue">
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>
                        <p>بهینه سازی کد ها</p>
                        <p>بهینه سازی سرعت سایت</p>
                        <p>لینک سازی داخل</p>
                        <p>بررسی ریدایرکت ها</p>
                        <p>رفع خطای 404</p>
                        <p>چک کردن لینک های نا معتبر</p>

                    </div>
                </div>
                <div class="pakage-btn-wrapper">
                    <button class="pakage-btn">بیشتر</button>
                </div>
            </div>

        </section>



    </article>



    <div class="title-tarefe UI_UX_title">
        <h3 id="tarefe-application">تعرفه طراحی اپلیکیشن</h3>
        <p>عوامل موثر بر تعیین طراحی اپلیکیشن</p>
    </div>
    <!-- end title -->



    <!-- start article-tarefe-page -->
    <article class="text-tarefe">

        <p>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
            متون بلکه
            روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود
            ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده

        </p>

    </article>
    <!-- end article-tarefe-page -->

    <!-- start section-two-boxes ui/ux -->
    <section class="tarfe-swiper-slider-parent">


        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                <!-- box-one-tarfe-swiper-slider -->
                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن پایه</p>
                    <p>640 هزار تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>

                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-two-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اقتصادی</p>
                    <p>1.3 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
                <!-- box-three-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن حرفه ای </p>
                    <p>2.4 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>

                <!-- box-four-tarfe-swiper-slider -->

                <div class="swiper-slide box-swiper-tarfe">
                    <p>پلن اختصاصی</p>
                    <p>2.9 میلیون تومان</p>

                    <nav class="parent-ul-tarfe-box-swiper">
                        <ul>
                            <li>نصب قالب اماده</li>
                            <li> سیستم مدیریت محتوا وردپرس</li>
                            <li>مدیریت منوی سایت</li>
                            <li>اجرا اصول پایه سئو</li>
                            <li> گالری تصاویرو اسلایدر </li>
                            <li>معرفی شبکه های اجتماعی</li>
                            <li>طراحی واکنش گرا</li>


                        </ul>

                    </nav>

                    <div class="btn-swiper-tarefe">
                        <a href="#">مشاوره رایگان</a>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>
    <!-- end section-two-boxes ui/ux -->

@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('front/js/menu-with-scroll.js') }}"></script>
    <script src="{{ asset('front/js/Tarefe.js') }}"></script>
    <script src="{{ asset('front/Scroll_FooteR_mouse.js') }}"></script>
    <script src="front/js/ArrowUpIcon.js"></script>
@endsection
