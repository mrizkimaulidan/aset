@include('layouts.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('layouts.navbar')

            <div class="main-sidebar">
                @include('layouts.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $section_header ?? '' }}</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
            @include('layouts.footer')