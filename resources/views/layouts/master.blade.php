<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @section('head')
        @include('partials.head')
    @show
</head>
<body>
    @include('partials.btnav')
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>