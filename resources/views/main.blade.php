<!DOCTYPE html>
<html>
    <head>
        @include('partials._head')
    </head>

    <body class="landing">
        @include('partials._nav')
        <div id="page-wrapper">
            @yield('content')
            @include('partials._footer')
        </div>

        @include('partials._scripts')
        @yield('scripts')
    </body>
</html>