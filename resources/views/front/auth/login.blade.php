@extends('front.layouts.master')
@section('main')
    <!-- Vorod -->
    <article class="sabte-nam second-page">
        <section class="sabte-nam-information">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="m-or-E">
                    <p>{{ __('translation.email') }} *</p>
                    <input name="email" type="email" required>
                </div>
                <div class="form-password">
                    <p>{{ __('translation.password') }}*</p>
                    <input name="password" type="password">
                </div>

                {{-- <div class="security-code">
                    <p>کد امنیتی</p>
                    <div>
                        <input type="number" required>
                        <span>
                            <p>79+3</p>
                        </span>
                    </div>
                </div> --}}

                <button type="submit">ورود</button>
            </form>
            <p class="btn-forget"><span class="btn-link2"><a
                        href="{{ route('register') }}">{{ __('translation.not-registered-yet') }}</a>
            </p>
            {{-- <p class="btn-forget">آیا رمز عبور را <a href="forgetPassword.html" class="btn-link3">فراموش</a>
                کرده اید؟</p> --}}
        </section>
    </article>
@endsection
