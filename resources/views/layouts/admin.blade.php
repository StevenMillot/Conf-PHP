<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    {{--asset fais reference au dossier public--}}
    {{--<link rel="stylesheet" href="{{asset('asset/css/main.css')}}"/>--}}
    <link rel="stylesheet" href="{{asset('asset/css/normalize.css')}}"/>
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}"/>
    <script src="{{asset('asset/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

{{-- *********  HEADER ********* --}}
<div class="header-container">
    <header class="wrapper clearfix">
        <h1><a href="{{url('/')}}">Administration</a></h1>
        <nav>
            @include ('dashboard.partials.menu')
        </nav>
    </header>
</div>{{--#Header--}}

{{-- *********  CONTAINER ********* --}}
<div class="main-container">
    <div class="main wrapper">
        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
    </div>
</div>

{{-- *********  SIDEBAR ********* --}}
<div class="main-container">
    <div class="main wrapper clearfix">
        @section('sidebar')
            <aside>
                <h2>Sidebar</h2>
                <a href="{{url('student/')}}"> -> Go Students <- </a><br>
                <a href="{{url('user/')}}"> -> Go Users <- </a><br>
                <a href="{{url('post/')}}"> -> Go Post <- </a><br><br>
                <a href="{{url('auth/logout')}}"> -> LogOut <- </a><br>
                <a href="{{url('dashboard/')}}"> -> Go Dashboard <- </a><br><br>
            </aside>
        @show
    </div>
</div>

{{-- *********  FOOTER ********* --}}
<footer class="footer-container">
    <div class="footer">
        @section('footer')
            <ul>
                <li><a href="{{url('/')}}">Mentions Légales</a></li>
            </ul>
        @show
    </div>
</footer>

@yield('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<js src="{{asset('asset/js/jquery-1.11.3.min.js')}}"><\/js>')</script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
