@extends('front.layouts.master')
@section('main')
    <!-- SabtNam  -->
    <article class="sabte-nam first-page">
        <form action="{{ route('register') }}" method="POST" class="form-first-sabtNam">
            @csrf
            <section class="sabte-nam-information">
                <!-- Set Gender -->

                {{-- <div class="gender">
                    <p>{{ __('translation.gender') }} *</p>
                    <label for="female" class="gender-radio">
                        <input class="checkmark-position1" type="radio" name="setGender" id="gender" value="Female" checked>
                        <span class="checkmark checkmark-position1"></span>
                        <p>{{ __('translation.femail') }}</p>
                    </label>

                    <label for="male" class="gender-radio">
                        <input class="checkmark-position2" type="radio" name="setGender" value="Men">
                        <span class="checkmark checkmark-position2"></span>
                        <p>{{ __('translation.male') }}</p>
                    </label>
                </div> --}}

                <!-- JOB -->
                <div class="m-or-E">
                    <p>{{ __('translation.name') }}</p>
                    <input type="text" name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="job">
                    <p>{{ __('translation.job') }}</p>
                    <input type="text" name="" required>
                </div> --}}

                <div class="m-or-E">
                    <p>{{ __('translation.email') }} *</p>
                    <input type="email" name="email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-password">
                    <p>{{ __('translation.password') }}*</p>
                    <input type="text" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-password">
                    <p>{{ __('translation.password_confirmation') }}*</p>
                    <input type="text" name="password_confirmation" required>
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
                <button type="submit">{{ __('translation.signup') }}</button>
        </form>
        </section>
        <section class="or-line">
            <div></div>
            <p>{{ __('translation.or') }}</p>
            <div></div>
        </section>
        <section class="google-login">
            <button class="google-login-icon google-login-button">
                <span>{{ __('translation.signup') }}/{{ __('translation.google-login') }}</span> <i
                    class="fab fa-google"></i></button>
            <p>{{ __('translation.have-account') }} <span class="btn-link1"><a
                        href="Vorod.html">{{ __('translation.login') }}</a></span>
            </p>

        </section>

    </article>

@endsection
