<!doctype html>
<html lang="en">

<head>
    @include ('layouts.css')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

    <div class="app-wrapper">

        @include ('layouts.header')

        @include ('layouts.sidebar')


        <main class="app-main">
            
            @yield('content')

        </main>

        @include ('layouts.footer')

    </div>
</body>

</html>
@include ('layouts.js')
