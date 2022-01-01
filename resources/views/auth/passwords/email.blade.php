
@extends('front.layouts.master')
@section('main')
    <!-- Third Page -->
    <section class="third-page-wrapper">
        <div class="third-page">
            <div>
                <div class="third-page-header">
                    <p>{{ __('translation.forgot-email') }}</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit">{{ __('translation.reset-password-link') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
