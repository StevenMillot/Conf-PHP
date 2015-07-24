<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta content="conférence PHP" name="description">
        <meta content="Steven ECOLEM" name="author">
        <meta content="Paris, France" name="geo.placename">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('/asset/css/style.css')}}"/>
    </head>

    <body >
{{-- *********  HEADER ********* --}}
        <header id="banner" role="banner">
            @include ('front.includes.header')
        </header>

{{-- *********  CONTAINER ********* --}}
        <div id="main" role="main">
            <section id="post" >
                @yield('content')
            </section>

{{-- *********  SIDEBAR ********* --}}
            <section id="sidebar">
                <h1>sponsors</h1>
                <a href="http://www.elao.com/fr">
                    <img class="logo" src="{{asset('asset/images/logos/elao_logo_150px.png')}}">
                </a>
                <a href="http://www.zol.fr/">
                    <img class="logo" src="{{asset('asset/images/logos/zol-logo.png')}}">
                </a>
                <a href="http://www.jolicode.com">
                    <img class="logo" src="{{asset('asset/images/logos/logo-large.png')}}">
                </a>
                <a href="http://php.net/">
                    <img class="logo" src="{{asset('asset/images/logos/Elephpant.png')}}">
                </a>
            </section>
        </div>>

{{-- *********  FOOTER ********* --}}
        <footer id="footer">
            <nav role="navigation" id="navigation">
                @include ('front.partials.menu')
            </nav>
        </footer>
    </body>
</html>

