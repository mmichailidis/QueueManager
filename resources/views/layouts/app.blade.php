<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body id="app-layout">
    @include('partials._nav')

    @yield('content')

    @include('partials._footer')

    @include('partials._javascript')
</body>
</html>
