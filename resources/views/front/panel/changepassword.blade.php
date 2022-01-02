@extends('front.layouts.master')
@section('main')
    <main class="panelKarbari-wrapper">
        <article>
            <section class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
                    <li><a href="{{ route('front.panel.index') }}">{{ __('translation.panel') }}</a></li>
                </ul>
            </section>
            <section class="panel-content">

                <div class="changepass">
                    <div class="changepass changepass-2">
                        <h3>{{ __('translation.update-password-text') }} </h3>
                        <form class="changepass-form" action="{{ route('front.panel.update.password') }}" method="post">
                            @csrf
                            <input type="text" name="password" placeholder="{{ __('translation.password') }}" required>
                            <input type="text" name="password_confirmation"
                                placeholder="{{ __('translation.password_confirmation') }}" required>
                            <button type="submit">{{ __('translation.change') }}</button>
                        </form>

                    </div>
                </div>

                <div class="userInfo-wrapper">
                    <div class="userInfo">
                        <div>
                            <p>{{ auth()->user()->name }}</p>
                            <p>{{ auth()->user()->phone }}</p>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <img src="{{ asset('front/imgs/Vector.svg') }}" alt="user">
                            <a href="{{ route('front.panel.edit') }}">{{ __('translation.edit') }}</a>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="userInfo-Btns">
                            <button class="changePassword"><a
                                    href="{{ route('front.panel.edit.password') }}">{{ __('translation.change-password') }}</a></button>
                            <button type="submit" class="out">{{ __('translation.logout') }}</button>

                        </div>
                    </form>
                </div>

            </section>
        </article>
    </main>
@endsection
