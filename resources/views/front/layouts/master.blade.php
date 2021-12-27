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
        
    @include('front.layouts.footer')
</body>
@yield('scripts')
@include('front.layouts.scripts')

</html>
