@extends('front.layouts.master')
@section('main')
    <!-- Third Page -->
    <section class="third-page-wrapper">
        <div class="third-page">
            <div>
                <div class="third-page-header">
                    <p>{{ __('translation.enter-email') }}</p>
                </div>
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="text" placeholder="{{ __('translation.enter-email') }}" required>
                    <button type="submit">{{ __('translation.reset-password') }}</button>
                </form>
            </div>
        </div>
    </section>

@endsection
