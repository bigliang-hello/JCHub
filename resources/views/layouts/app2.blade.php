<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title','JCHub')</title>

    <link rel="shortcut icon" href={{url("/favicon.ico")}} type="image/x-icon">

    <link rel="stylesheet" type="text/css" href={{url("assets/css/bootstrap.min.css")}}>

    <link rel="stylesheet" type="text/css" href={{url("assets/css/main.css")}}>

</head>
<body>
<div class="wrapper-page">
    @yield('content')
</div>

<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>


<script src={{url("assets/js/jquery-min.js")}}></script>
<script src={{url("assets/js/bootstrap.min.js")}}></script>
<script src={{url("assets/js/jquery.app.js")}}></script>
<script src={{url("assets/js/main.js")}}></script>

</body>
</html>