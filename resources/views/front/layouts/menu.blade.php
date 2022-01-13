<!-- start parent main menu and logo -->
@php
use Stichoza\GoogleTranslate\GoogleTranslate;
$lang = substr(Request::getPathInfo(), 1, 2);
$languages = App\Models\Lang::where([['langable_type', 'App\Models\ServiceCategory'], ['name', $lang]])->get();
$translator = new GoogleTranslate();
$translator->setSource('fa');
$translator->setTarget($lang);
@endphp
<section class="parent-main-logo-sigin_and_main-menu">

    <!-- start main logo big scop and sigin -->
    <div class="main-logo-sigin">
        <ul class="main-menu-two-ul">
            <li class="li-moshvereh">

                <a href="sms:989174477749">
                    {{ $translator->translate('مشاوره تخصصی') }}
                    <i class="fas fa-phone-alt animate-phone-big-menu"></i>
                </a>
            </li>
            <li><a href="tel:989174477749">09174477749

                </a></li>
            <div class="change-language-wrapper">
                <li class="change-language">
                    @php
                        $x = substr(Request::getPathInfo(), 3);
                        $lang = substr(Request::getPathInfo(), 1, 2);
                        if ($lang == 'fa') {
                            $lang = 'en';
                            $link = $lang . $x;
                        } else {
                            $lang = 'fa';
                            $link = $lang . $x;
                        }
                    @endphp
                    @if ($lang == 'fa')
                        <a href="/{{ $link }}">Fa</a>
                        <div class="change-language-line"></div>
                        <a href="#">En</a>
                    @else
                        <a href="/{{ $link }}">En</a>
                        <div class="change-language-line"></div>
                        <a href="#">Fa</a>

                    @endif

                </li>
            </div>
        </ul>
        <figure class="big-mediaquery-logo">
            <img src="{{ asset('front/imgs/small-logo.png') }}" alt="logo">
            <p>LORD OF IT</p>
        </figure>

        <ul class="ul-sign">
            @if (Auth::check())
                <li>
                    <a class="user-info" href="{{ route('front.panel.index') }}"> <i class="fa fa-user"></i>
                        {{ auth()->user()->name }}</a>
                </li>
            @else
                <li>
                    <a href="{{ route('register') }}">
                        {{ __('translation.signup') }} /
                    </a>
                    <a href="{{ route('login') }}">
                        {{ __('translation.login') }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <!-- end main logo big scop and sigin -->

    <!-- start main menu  -->
    <nav class="main-menu">
        <ul class="main-menu-first-ul">
            <li><a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    {{ $translator->translate(' خانه') }}


                </a></li>
            <li><a>
                    <i class="fa fa-hands-helping"></i>
                    {{ $translator->translate(' خدمات') }}


                    <i class="fas fa-chevron-down"></i>
                    <div class="submenu">
                        <ul class="submenu-ul">
                            @foreach ($languages as $language)
                                @php
                                    $category = $language->langable;
                                @endphp
                                <li>

                                    @if ($category->parent_id == null)
                                        <a href="{{ route('front.services', $category->slug) }}">
                                            <span> {{ $category->title }}</span>
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                        <ul class="submenu-ul-ul">
                                        @elseif ($category->parent_id !== null || $category->parent_id == $category->id)
                                            <li><a
                                                    href="{{ route('front.services', $category->slug) }}">{{ $category->title }}</a>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </a></li>
            <li><a href="{{ route('front.project.categories') }}">
                    <i class="fa fa-project-diagram"></i>
                    {{ $translator->translate('نمونه کار') }}
                </a></li>
            <li><a href="{{ route('front.courses.all') }}">
                    <i class="fa fa-book-reader"></i>
                    {{ $translator->translate(' آموزش') }}

                </a></li>
            <li><a href="{{ route('front.articles.index') }}">
                    <i class="fa fa-newspaper"></i>

                    {{ $translator->translate('مقالات') }}
                </a></li>

            <li>
                <!-- تعرفه خدمات  -->
                <a href="{{ route('front.project.serviceprice.category') }}">
                    <i class="fa fa-hand-holding-usd"></i>

                    {{ $translator->translate('تعرفه خدمات') }}
                </a>
                <!-- پایان  تعرفه خدمات -->
            </li>
            <li><a href="{{ route('front.about_us') }}">
                    <i class="fa fa-address-card"></i>

                    {{ $translator->translate('درباره ما') }}
                </a></li>
            <li><a href="{{ route('front.ourteam.index') }}">
                    <i class="fa fa-users"></i>

                    {{ $translator->translate(' تیم ما') }}
                </a></li>
        </ul>

    </nav>
    <!-- end main menu  -->
</section>
<!--end parent main menu and logo -->

<!-- start responsive menu -->
<nav class="parent-sign-up_and_iconbar">

    <ul class="parent-icon-bar">
        <a href="#progressbarScorll">
            <li>
                <i class="fas fa-bars"></i>
            </li>
        </a>
    </ul>



    <ul class="parent-responsive-logo_tell">

        <li class="be_most_none_if_sticky"><a href="sms:989174477749">
                <i class="fas fa-phone-alt"></i>
                {{ $translator->translate('مشاوره تخصصی') }}


            </a>
        </li>
        <li class="be_most_none_if_sticky">

            <a href="tel:989174477749">09174477749

            </a>
        </li>




        <ul class="logo-sticky-responsive">
            <li><a href="sms:989174477749">
                    <i class="fas fa-phone-alt"></i>
                    {{ $translator->translate('مشاوره تخصصی') }}

                </a>
            </li>
            <li>

                <a href="tel:989174477749">09174477749

                </a>
            </li>
            <li>

                <a href="#">
                    <img src="{{ asset('front/imgs/small-logo.png') }}" alt="logo">

                </a>

            </li>


        </ul>

    </ul>

    <figure class="big-mediaquery-logo">
        <img src="{{ asset('front/imgs/small-logo.png') }}" alt="logo">
        <p>LORD OF IT</p>
    </figure>

</nav>

<nav class="responsive-nav">
    <ul class="responsive-menu">
        <ul class="responsive-sigin">
            @if (Auth::check())
                <li>
                    <a class="user-info" href="{{ route('front.panel.index') }}"> <i class="fa fa-user"></i>
                        {{ auth()->user()->name }}</a>
                </li>
            @else
                <li>
                    <a href="{{ route('register') }}">
                        {{ __('translation.signup') }} /
                    </a>
                    <a href="{{ route('login') }}">
                        {{ __('translation.login') }}
                    </a>
                </li>
            @endif
        </ul>
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">{{ $translator->translate(' خانه') }}</a>

        </li>
        <div class="toggle">
            <i class="fa fa-hands-helping"></i>

            {{ $translator->translate('خدمات') }}

            <i class="fas fa-caret-left"></i>
        </div>
        <ul class="wrapper-menu-responsive">
            <!-- طراحی سایت -->
            <div class="toggle">

                {{ $translator->translate('طراحی سایت') }}

                <i class="fas fa-caret-left"></i>
            </div>
            <!-- start web design wrapper -->
            <!-- زیر منو طراحی سایت -->
            <ul class="wrapper-menu-responsive">
                <li><a href="#">طراحی سایت فروشگاهی</a></li>
                <li><a href="#">طراحی سایت ورد پرس</a></li>
                <li><a href="#">طراحی سایت اختصاصی</a></li>
            </ul>
            <!-- end web design wrapper -->

            <!-- start app  wrapper -->
            <!-- طراحی اپلیکیشن -->
            <div class="toggle">
                طراحی اپلیکیشن موبایل
                <i class="fas fa-caret-left"></i>
            </div>
            <!-- زیر منو اپلیکیشن -->
            <ul class="wrapper-menu-responsive">
                <li><a href="#">اندروید</a></li>
                <li><a href="#">IOS</a></li>
            </ul>
            <!-- end app  wrapper -->

            <!-- start seo -->
            <!-- سئو -->
            <div class="toggle">
                بینه سازی سایت (سئو)
                <i class="fas fa-caret-left"></i>
            </div>
            <!-- زیر منوی سئو -->
            <ul class="wrapper-menu-responsive">
                <li><a href="#">سئو داخلی</a></li>
                <li><a href="#">سئو خارجی</a></li>
                <li><a href="#">سئو تکنیکال</a></li>
            </ul>
            <!-- end seo -->

            <!-- start Graphic -->
            <!-- گرافیک -->
            <div class="toggle">
                طراحی گرافیک
                <i class="fas fa-caret-left"></i>
            </div>
            <!-- زیر منوی گرافیک -->
            <ul class="wrapper-menu-responsive">
                <li><a href="#">لوگو یا ارم</a></li>
                <li><a href="#">موشن گرافیک</a></li>
                <li><a href="#">UX/UI</a></li>
                <li><a href="#">ساخت بنر تبلیغاتی</a></li>
            </ul>
            <!-- end Graphic -->
            <!-- مارکتینگ -->
            <div class="toggle">
                <a href="#">دیجیتال مارکتینگ</a>
            </div>
            <!-- تولید محتوا -->
            <div class="toggle">
                <a href="#">سفارش تولید محتوا</a>
            </div>

            <!--START DONT TUOCH THIS , THIS MUST BE ALWYS END OF RESPONSIVE MENU -->
            <div class="empty"></div>
            <!-- END DONT TUOCH THIS -->
        </ul>

        <li><a href="#">
                <i class="fa fa-project-diagram"></i>
                {{ $translator->translate(' نمونه کا') }}</a>
        </li>
        <li><a href="#">
                <i class="fa fa-book-reader"></i>
                {{ $translator->translate(' آموزش') }}

            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-newspaper"></i>

                {{ $translator->translate('مقالات') }}

            </a>
        </li>

        <!-- تعرفه خدمات -->
        <li>
            <a href="Tarefe.html">
                <i class="fa fa-hand-holding-usd"></i>

                {{ $translator->translate(' تعرفه خدمات') }}

            </a>
        </li>

        <!--  پایان تعرفه خدمات -->
        <li>
            <a href="#">
                <i class="fa fa-address-card"></i>

                {{ $translator->translate(' درباره ما') }}
            </a>
        </li>

        <li>
            <i class="fa fa-users"></i>
            <a href="#">{{ $translator->translate(' تیم ما') }}</a>
        </li>
    </ul>
</nav>
<!-- end responsive menu -->



<!--end menu-->
