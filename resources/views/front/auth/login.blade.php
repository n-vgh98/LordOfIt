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

                <button type="submit">{{ __('translation.login') }}</button>
            </form>
            <br>
            <p class="btn-forget"><span class="btn-link2"><a
                        href="{{ route('register') }}">{{ __('translation.not-registered-yet') }}</a>
            </p>
            <br>
            <p class="btn-forget"><span class="btn-link2"><a
                        href="password/reset">{{ __('translation.forgot-password-text') }}</a>
            </p>

        </section>
    </article>
@endsection
