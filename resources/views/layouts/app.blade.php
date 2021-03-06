<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title','JCHub')</title>

    <link rel="shortcut icon" href={{url("/favicon.ico")}} type="image/x-icon">

    <link rel="stylesheet" type="text/css" href={{url("assets/css/bootstrap.min.css")}}>

    <link rel="stylesheet" type="text/css" href={{url("assets/fonts/line-icons.css")}}>

    <link rel="stylesheet" href={{url("assets/plugins/morris/morris.css")}}>

    <link rel="stylesheet" type="text/css" href={{url("assets/css/main.css")}}>

    <link rel="stylesheet" type="text/css" href={{url("assets/css/responsive.css")}}>

    @yield('css_section')

</head>
<body>
<div class="app header-default side-nav-dark">
    <div class="layout">

        @include('common.header')


        @include('common.side')


        <div class="page-container">

            <div class="main-content">
                <div class="container-fluid">
                    @include('common.message')
                    @yield('content')
                </div>
            </div>


            @include('common.footer')

        </div>

    </div>
</div>

<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>


<script src={{url("assets/js/jquery-min.js")}}></script>
<script src={{url("assets/js/popper.min.js")}}></script>
<script src={{url("assets/js/bootstrap.min.js")}}></script>
<script src={{url("assets/js/jquery.app.js")}}></script>
<script src={{url("assets/js/main.js")}}></script>

{{--<script src={{url("assets/plugins/morris/morris.min.js")}}></script>--}}
<script src={{url("assets/plugins/raphael/raphael-min.js")}}></script>
{{--<script src={{url("assets/js/dashborad1.js")}}></script>--}}
@yield('js_section')
</body>
</html>