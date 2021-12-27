@php
$lang = substr(Request::getPathInfo(), 1, 2);
$sociallinks = App\Models\Lang::where([['langable_type', 'App\Models\FooterLink'], ['name', $lang]])->get();
$footertitles = App\Models\Lang::where([['langable_type', 'App\Models\FooterTitle'], ['name', $lang]])->get();
@endphp

<footer id="footer_showMenu">
    <!-- Footer Line One -->
    <section class="footer-line-one">
        @if (count($footertitles) > 0)
            <div class="order">
                <div class="order-content">
                    <h4 class="p-title">{{ $footertitles[0]->langable->title }}</h4>
                    @if (count($footertitles[0]->langable->contents) !== 0)
                        <p>{{ $footertitles[0]->langable->contents[0]->text }}</p>
                    @endif
                    <a href="">
                        <button class="btn1">فرم ثبت سفارش</button>
                    </a>
                    <a href="signup.html">
                        <button class="btn2">دریافت مشاوره</button>
                    </a>
                </div>
            </div>
        @endif
        @if (count($footertitles) > 1)
            <div class="academy-content">
                <h4 class="p-title">{{ $footertitles[1]->langable->title }}</h4>
                @if (count($footertitles[1]->langable->contents) !== 0)
                    <ul>
                        @foreach ($footertitles[1]->langable->contents as $content)
                            <li><a href="{{ $content->text_link }}"><i
                                        class="fas fa-chevron-left"></i>{{ $content->text }}</a>
                            </li>
                        @endforeach

                    </ul>
                @endif

            </div>
        @endif

        @if (count($footertitles) > 2)
            <div class="useful-link">
                <h4 class="p-title">{{ $footertitles[2]->langable->title }}</h4>
                @if (count($footertitles[2]->langable->contents) !== 0)
                    <ul>
                        @foreach ($footertitles[2]->langable->contents as $content)
                            <li><a href="{{ $content->text_link }}"><i
                                        class="fas fa-chevron-left"></i>{{ $content->text }}</a></li>
                        @endforeach

                    </ul>

                @endif

            </div>
        @endif

        @if (count($footertitles) > 3)
            <div class="contact-us">
                <div class="order-content">
                    <h4 class="p-title">{{ $footertitles[3]->langable->title }}</h4>
                    @if (count($footertitles[3]->langable->contents) !== 0)
                        <p>{{ $footertitles[3]->langable->contents[3]->text }}</p>
                    @endif
                </div>
            </div>
        @endif

    </section>
    <!-- Footer Line two -->
    <section class="footer-line-two">
        <div>
            <div class="line"></div>
        </div>
        <div class="footer-line-two-content">
            <div class="membership">
                <h5>اولین نفری باشید که اخبار آموزش و مقالات تخصصی را دریافت می کنید.</h5>
                <form>

                    <button>
                        <a href="sabtNam.html">عضویت</a>

                    </button>


                    <input type="text" placeholder="آدرس ایمیل خود را وارد کنید">
                </form>
            </div>
            <div class="footer-social-media">
                @if (count($sociallinks) !== 0)

                    <ul>
                        <li><a href="{{ $sociallinks[0]->langable->linkedin_link }}"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li><a href="{{ $sociallinks[0]->langable->skype_link }}"><i class="fab fa-skype"></i></a>
                        </li>
                        <li><a href="{{ $sociallinks[0]->langable->facebook_link }}"><i
                                    class="fab fa-facebook"></i></a>
                        </li>
                        <li><a href="{{ $sociallinks[0]->langable->instagram_link }}"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        @if ($sociallinks[0]->langable->social_1 !== null)
                            <li><a href="{{ $sociallinks[0]->langable->social_1 }}"><i
                                        class="{{ $sociallinks[0]->langable->social_1_icon }}"></i></a>
                            </li>
                        @endif
                        @if ($sociallinks[0]->langable->social_2 !== null)
                            <li><a href="{{ $sociallinks[0]->langable->social_2 }}"><i
                                        class="{{ $sociallinks[0]->langable->social_2_icon }}"></i></a>
                            </li>
                        @endif
                    </ul>
                @endif

            </div>
        </div>
    </section>
    <h6 class="main-title-h6">تمامی حقوق این سایت متعلق به سایت لورد آف آیتی می باشد.</h6>
</footer>
