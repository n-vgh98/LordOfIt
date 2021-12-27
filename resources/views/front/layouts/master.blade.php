<!DOCTYPE html>
@if ($local = app()->getLocale() == 'fa')
    <html lang="fa" dir="rtl">
@else
    <html lang="en" dir="ltr">
@endif
@yield('head')
@include('front.layouts.head')
<title>@yield('title')</title>


<body>


    <header>
        <!-- scroll start -->
        <div id="progressbarScorll"></div>
        <div id="scorllPath"></div>
        <!-- scorll end  -->
        @include('front.layouts.menu')
        @yield('header')
    </header>
    @yield('main')
    <main>
        <!-- start sections-titles -->

        <section class="sections-title">
            <h1>
                لورد آف آیتی
            </h1>

        </section>

        <div class="why-us">
            <div>
                <section class="sections-title">
                    <p>
                        چرا ما
                    </p>

                </section>
                <article>
                    <p>
                        ما در سال 2016 با هدف ایجاد تغییر و تحول در فضای وب ایران فعالیت رسمی خود را اغاز کردیم
                        و هر سال با تلاش و پشتکار همگام با استاندارد های روز دنیا
                        قدم برداشتیم و در کنار این ارزش افرینی مستمر توانستیم لورد اف ایتی را تا اندازه ای چشمگیر
                        تغییر
                        دهیم
                        .
                    </p>
                </article>
            </div>

            <figure>
                <img src="imgs/geraphic.jpg" alt="">
            </figure>


        </div>




        <!-- end sections-titles -->



        <!-- start btn -->
        <section class="parent-all-btns">

            <div class="all-btns first-btn-reading-more">

                <p>
                    <a href="">
                        بیشتر بخوانید
                        <i class="fas fa-long-arrow-alt-left"></i>

                    </a>
                </p>

            </div>


        </section>
        <!-- end btn -->
        <h2 class="article-title-h2">دسته بندی خدمات شرکت </h2>
        <!-- start six-boxes-section -->
        <section class="parent-boxes-grid-hompage-boxes">
            <!-- box-one -->
            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/seo.jpg" alt="seo" loading="lazy">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>بهینه سازی سایت (سئو)</p>

                        <div class="text-info">
                            <p>
                                واژه سئو مخفف (optimazition Engine Search) و ما به زبان فارسی بهش بهینه سازی موتور
                                جستجو
                                می گیم اگر بخوایم به زبان سازده سئو رو براتون تشریح کنیم باید بگیم که بهینه سازی
                                موتورهای
                            </p>
                        </div>
                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <!-- box-two -->

            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/web-desing.jpg" alt="web-desing" loading="lazy" title="ali">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>طراحی سایت</p>

                        <div class="text-info">
                            <p>
                                امروزه طراحی سایت نقش بسزایی در رشد و پیشرفت یک کسب و کار است
                                پیشنهاد میکنم قبل از خواندن این مطلب مقاله های اهمیت داشتن وبسایت و تفاوت کسب و
                                کارهای سنتی و امروزی را بخوانید

                            </p>
                        </div>




                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>


            <!-- box-three -->

            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/mobile-app.jpg" alt="mobile-app" loading="lazy">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>ساخت اپلیکیشن موبایل</p>

                        <div class="text-info">
                            <p>
                                طراحی اپلیکشن مو بایل به شما این فرصت را می دهد که ارتباط و دسترسی بیشتری با مشتریان
                                خود داشته باشید.
                                شما هم می توانید با شاخت اپلیکشن قدرتمند, کاربردی و زیبا , یک پل ارتباطی مناسب با
                                مشتری
                                ها داشته باشید
                            </p>
                        </div>



                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>

            <!-- box-four -->
            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/geraphic.jpg" alt="geraphic" loading="lazy">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>طراحی گرافیک</p>
                        <div class="text-info">
                            <p>
                                استفاده از طرح های گرافیکی و ویدوهای یکی از بهترین روش ها برای انتقال پیام,
                                تبلیغات و جذب مخاطب هست چون خلاقیت و رنگ های به کار رفته شده در طرح های گرافیکی و
                                ویدوها برای مردم جذاب هست,
                            </p>
                        </div>
                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>

            <!-- box-five -->
            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/digital-marketing.jpg" alt="" loading="lazy">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>دیجیتال مارکتینگ</p>

                        <div class="text-info">
                            <p>
                                برای هوشمند سازی کسب و کار , تیم هوشمند سازی رفتار کاربران سایت و اپلیکیشن شما را
                                بررسی میکنه و اطلاعات
                                مفیدی استخراج میکنه و با تجزیه و تحلیل این اطلاعات
                                مثلا با توجه به اینکه یک کاربر چه چیزی در سایت
                            </p>
                        </div>

                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>

            <!-- box-six -->
            <div class="wrapper-box">
                <div class="box">
                    <!-- img -->
                    <figure>
                        <a href="#">
                            <img src="imgs/Content-production.jpg" alt="Content-production" loading="lazy">
                        </a>
                    </figure>
                    <!-- text-content -->
                    <div class="text-contetn-box">
                        <p>سفارش تولید محتوا</p>
                        <div class="text-info">
                            <p>
                                محتوا بخش بزرگی از زندگی روزمره شما است .
                                اجتناب از ان دشوار بوده , اما چرا به دنبال ان هستید؟
                                محتوا ما را اگاه میکند, باعث می شود لبخند بزنیم,
                                در تصمیم گیری راهنماییمان می کند و ...
                            </p>
                        </div>
                        <div class="all-btns">
                            <p>

                                <a href="">
                                    مشاهده جزئیات
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- end six-boxes-section -->


        <!-- start title - section-slider  -->
        <section class="sections-title titles skills-title">
            <h3>
                پروژه های اخیر ما
            </h3>
        </section>


        <!-- end title - section-slider  -->

        <!-- start section-slider  -->

        <!-- Swiper -->
        <section class="section-slider">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">


                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/digital-marketing.jpg" loading="lazy" alt="digital-marketing">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/geraphic.jpg" loading="lazy" alt="geraphic">
                    </div>
                    <div class="swiper-slide">

                        <img src="imgs/web-desing.jpg" loading="lazy" alt="web-desing">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/mobile-app.jpg" alt="mobile-app" loading="lazy">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/seo.jpg" alt="seo" loading="lazy">
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

            </div>

        </section>



        <!-- end section-slider -->

        <!-- start section-from -->
        <section class="section-from">
            <div class="content-text-section-from">
                <p>دریافت مشاوره رایگان</p>
                <p>برای گرفتن بهترین تصمیم از مشاوره لورد اف ایتی استفاده کنید</p>
            </div>
            <form>
                <input type="text" placeholder="شماره موبایل" />
                <textarea name="" id="" cols="30" rows="10" placeholder="شرح درخواست"></textarea>
                <button type="submit" id="show-apply-form">ثبت</button>
            </form>

            <section class="form-apply">
                <div class="form-apply-content">
                    <div class="form-head">
                        <h4> درخواست شما با موفقیت ثبت شد <i class="fas fa-check-square"></i></h4>
                        <p>در اسرع وقت با شما تماس می گیریم</p>
                        <textarea name="Text1" cols="30" rows="3" placeholder="شرح درخواست"></textarea>
                    </div>
                    <div class="form-button">
                        <button type="submit" class="form-apply-edit">ویرایش</button>
                        <button type="submit" class="form-apply-cancel">لغو</button>
                    </div>
                </div>
            </section>

        </section>
        <!-- start section-from -->

        <section class="sections-title titles skills-title">
            <h3>
                مهارت ما
            </h3>
        </section>

        <!-- start parent-section skills -->

        <section class="parent-skills">
            <div class="ciracel-skills">

                <!-- around-imgs  -->
                <div class="around-imgs">

                    <!-- img-1 -->
                    <div>
                        <img src="imgs/skill-web.png" alt="skill-web" id="around-imgs" loading="lazy">
                    </div>
                    <!-- img-2 -->
                    <div>
                        <img src="imgs/skill-app.png" alt="skill-app" id="around-imgs" loading="lazy">
                    </div>
                    <!-- img-3 -->
                    <div>
                        <img src="imgs/skill-seo.png" alt="seo" id="around-imgs" loading="lazy">
                    </div>
                    <!-- img-4-->
                    <div>
                        <img src="imgs/skill-graghic.png" alt="graghic" id="around-imgs" loading="lazy">
                    </div>
                    <!-- img-5-->
                    <div>
                        <img src="imgs/skill-i.png" alt="skill-i" id="around-imgs" loading="lazy">
                    </div>
                    <!-- img-6 -->
                    <div class="midel-img">
                        <img src="imgs/main pic.jpg" alt="LordOFit" id="midel-img" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- div bars start  -->
            <div class="parenet-bars">
                <div class="skill-bars">
                    <div class="bar" data-id="1">
                        <p>
                            طراحی سایت
                            <span>90%</span>
                        </p>
                    </div>
                </div>

                <div class="skill-bars">
                    <div class="bar" data-id="1">
                        <p>
                            طراحی اپلیکیشن موبایل
                            <span>90%</span>
                        </p>
                    </div>
                </div>

                <div class="skill-bars">
                    <div class="bar" data-id="3">
                        <p>
                            سئو
                            <span>
                                75%
                            </span>
                        </p>

                    </div>
                </div>
                <div class="skill-bars">
                    <div class="bar" data-id="4">
                        <p>
                            طراحی گرافیک
                            <span>
                                80%
                            </span>
                        </p>
                    </div>
                </div>
                <div class="skill-bars">
                    <div class="bar" data-id="3">
                        <p>
                            هوشمند سازی کسب و کار
                            <span>75%</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- start parent-section skills -->
        </section>

        <!-- counter Animation -->
        <section class="counter-animation">
            <div class="counter-wrapper">
                <div>
                    <form action="#">

                        <input id="view" value="0" class="SetNum" disabled></input>
                        <span class="plus">+</span>
                        <p>تعداد بازدید های سایت</p>
                    </form>

                </div>
                <div>
                    <form action="#">
                        <input id="customer" value='0' class="SetNum" disabled></input>
                        <span class="plus">+</span>
                        <p>مشتری های ما</p>
                    </form>

                </div>
                <div>
                    <form action="#">
                        <input id="project" value='0' class="SetNum" disabled></input>
                        <span class="plus">+</span>
                        <p>پروژه های انجام شده</p>
                    </form>
                </div>
            </div>
        </section>

        <!--START Video gallery Section -->
        <section class="video-gallery">
            <h3>گالری ویدئو</h3>
            <div class="video-wrapper">
                <div class="video-1">
                    <iframe src="https://www.aparat.com/video/video/embed/videohash/peRtY/vt/frame"></iframe>
                    <div class="caption-video">
                        <span>معرفی طراحی گرافیک</span>
                    </div>
                </div>
                <div class="video-1">
                    <iframe src="https://www.aparat.com/video/video/embed/videohash/VzL1w/vt/frame"></iframe>
                    <div class="caption-video">
                        <span>معرفی خدمات</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- START academy Section -->
        <section class="academy">
            <h3>آموزش</h3>
            <div class="academy-post">
                <div class="post1 post-academy-hompage">
                    <figure>
                        <img src="imgs/chortke.jpeg" alt="">
                        <a href="#">
                            <button>کسبر کار سنتی یا دیجیتال؟</button>
                        </a>
                    </figure>
                </div>
                <div class="post2 post-academy-hompage">
                    <figure>
                        <img src="imgs/1607953769برای-مقاله-اهمیت-سایت.jpg" alt="">
                        <a href="#">
                            <button>مزیت های داشتن سایت</button>
                        </a>
                    </figure>
                </div>
                <div class="post3 post-academy-hompage">
                    <figure>
                        <img src="imgs/chortke.jpeg" alt="" loading="lazy">
                        <a href="#">
                            <button>سایت های داینامیک واستاتیک</button>
                        </a>
                    </figure>
                </div>
            </div>
        </section>


        <!-- start fixed online conversition icon  -->
        <section class="parent-chat-img">

            <img src="imgs/messages.png" alt="chat-icon" id="icon-chat-box">

            <div class="chat-box">
                <textarea type="text" name="" id="top-input-chat"
                    placeholder="تا چند لحظه دیگر گفتگو انلاین شما شروع می شود" rows="3" cols="3">
                                    </textarea>
                <input type="text" name="" id="down-input-chat" placeholder="متن خود را تایپ کنید">
                <div class="parent-btn-chat">
                    <div class="send-chat-btn">
                        ارسال چت
                    </div>
                    <div class="cancel-chat-btn">
                        لغو چت
                    </div>
                </div>

            </div>
        </section>
        <!-- end fixed online conversition icon  -->

    </main>
    @include('front.layouts.footer')
</body>
@yield('scripts')
@include('front.layouts.scripts')

</html>
