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
                @include ('front.includes.sidebar')
            </section>
        </div>

{{-- *********  FOOTER ********* --}}
        <footer id="footer">
            <nav>
                @include ('front.includes.footer')
            </nav>
        </footer>
    </body>
</html>

