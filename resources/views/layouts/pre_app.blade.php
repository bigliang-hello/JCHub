<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title','JCHub')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href={{url("/favicon.ico")}} type="image/x-icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css_section')

</head>
<body>
<div id="app" class="{{ route_class() }}-page">

        @include('common.pre_header')

        <main class="py-2">

        @include('common.error')
        @include('common.message')

        @yield('content')
        </main>
</div>

<script src="{{ asset('js/app.js') }}"></script>

@yield('js_section')
</body>
</html>