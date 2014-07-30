<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta charset="UTF-8">

        <!-- Title is defined in each view -->
        <title>Gabi Stats - @yield('title')</title>

        <!-- Includes -->
        {{ HTML::style('/css/style.css') }}
        {{ HTML::script('/js/jquery.min.js') }}

        <!-- For creating charts with js/jquery - is used in custom.js which is included before the end of the body tag (in the statistics view) -->
        {{ HTML::script('/js/Chart.js') }}

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ URL::to('/img/charticon.ico') }}">
    </head>

    <body>
        <!-- This div contains the entire page and the content of the current view is yielded (or inserted) here -->
        <div id="site_container">
            @yield('content')
        </div>
    </body>

</html>