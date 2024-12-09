<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WareHouse | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/92449afa91.js" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @includeIf('components.navbar')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/home') }}" class="brand-link d-flex justify-content-center align-items-center"
                style="height: 100%; font-size: 1.5rem;">
                <span class="brand-text font-weight-light">WareHouse</span>
            </a>
            <div class="sidebar">
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                    <div class="info text-center">
                        <p class="d-block" style="color: white; font-size: 1.5rem;">{{ Auth::user()->name }}</p>
                        <a class="badge badge-success">{{ Auth::user()->role }}</a>
                    </div>
                </div> --}}
                @includeIf('components.sidebar')

            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            @includeIf('components.footer')
        </footer>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @stack('javascript')
</body>

</html>
