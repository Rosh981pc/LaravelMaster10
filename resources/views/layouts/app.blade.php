<!DOCTYPE html>
<html>
    <head>
        <title>TaskApp</title>
        @yield('styles')
    </head>
    <body>
        <h1 style="color: blue;">@yield('title')</h1>
        <hr>
        <div>
            @if(session()->has('success'))
            <div>{{session('success')}}</div>
            @endif
            @yield('content')
        </div>
    </body>
</html>