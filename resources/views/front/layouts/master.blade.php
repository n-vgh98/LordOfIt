<!DOCTYPE html>
@if ($local = app()->getLocale() == 'fa')
    <html lang="fa" dir="rtl">
@else
    <html lang="en" dir="ltr">

@endif


@include('front.layouts.head')
@yield('head')
<title>@yield('title')</title>


<body>

    <header>

        @include('front.layouts.menu')
        @yield('header')
    </header>
    <!-- scroll start -->
    <div id="progressbarScorll"></div>
    <div id="scorllPath"></div>
    <!-- scorll end  -->
    @yield('main')


    @include('front.layouts.sweetalert.error')



    @include('front.layouts.footer')
</body>
@yield('scripts')
@include('front.layouts.scripts')

</html>
