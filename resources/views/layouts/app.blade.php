<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIAKAD - Sistem Informasi Akademik')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>
<body>

    @include('partials.sidebar')

    <div class="main-content" id="mainContent">
        
        @include('partials.navbar')

        <div class="content-area">
            
            @include('partials.flash')

            @yield('content')
            
            @include('partials.footer')
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const openBtn = document.getElementById("openSidebar");
            const closeBtn = document.getElementById("closeSidebar");

            // Munculkan sidebar saat tombol hamburger diklik
            if(openBtn) {
                openBtn.addEventListener("click", function() {
                    sidebar.classList.add("show");
                });
            }

            // Sembunyikan sidebar saat tombol X diklik
            if(closeBtn) {
                closeBtn.addEventListener("click", function() {
                    sidebar.classList.remove("show");
                });
            }
        });
    </script>

    @yield('scripts')
</body>
</html>