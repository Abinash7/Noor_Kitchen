@include('Backend.Admin.header')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('Backend.Admin.sidebar')

            @include('Backend.Admin.top-nav')
            @yield('content')
            @include('Backend.Admin.footer')