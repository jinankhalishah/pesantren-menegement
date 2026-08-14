<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #14532d;
            z-index: 1100;
            transition: all 0.3s;
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 70px !important;
        }


        .sidebar.collapsed .menu-text,
        .sidebar.collapsed #sidebar-text {
            display: none;
        }

        .content.collapsed {
            margin-left: 70px;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
        }

        .sidebar.collapsed .icon {
            margin: 0 !important;
            font-size: 18px;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center !important;
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar.collapsed .toggle-btn {
            padding: 0;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #f8f9fa;
            line-height: 1;
        }

        .sidebar.collapsed .bi-chevron-down {
            display: none !important;
        }

        .sidebar.collapsed .collapse {
            display: none !important;
        }

        .sidebar.collapsed .sidebar-footer {
            justify-content: center;
        }

        .sidebar.collapsed .sidebar-footer .avatar {
            margin-right: 0 !important;
        }

        /* MOBILE */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 12px;
            left: 12px;
            z-index: 1200;
            width: 42px;
            height: 42px;
            border-radius: 10px;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }

        @media (max-width: 991.98px) {

            .sidebar,
            .sidebar.collapsed {
                width: 260px !important;
                transform: translateX(-100%);
            }

            .sidebar.mobile-open,
            .sidebar.mobile-open.collapsed {
                transform: translateX(0);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            }

            .content,
            .content.collapsed {
                margin-left: 0 !important;
            }

            .mobile-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .content-wrapper {
                padding: 1rem !important;
                padding-top: 4.5rem !important;
            }
        }
    </style>
</head>

<body>

    <!-- Mobile toggle -->
    <button id="mobileToggle" class="btn btn-success mobile-toggle" type="button" onclick="toggleSidebar()"
        aria-label="Buka menu">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content -->
    <div id="content" class="content">

        <!-- Main Content -->
        <div class="content-wrapper p-4">
            @yield('content')
        </div>

    </div>

    <!-- JS -->
    <script>
        const sidebarEl = document.getElementById('sidebar');
        const contentEl = document.getElementById('content');
        const overlayEl = document.getElementById('sidebarOverlay');
        const mobileBreakpoint = window.matchMedia('(max-width: 991.98px)');

        function toggleSidebar() {
            if (mobileBreakpoint.matches) {
                sidebarEl.classList.toggle('mobile-open');
                overlayEl.classList.toggle('show');
            } else {
                sidebarEl.classList.toggle('collapsed');
                contentEl.classList.toggle('collapsed');
            }
        }

        function closeMobileSidebar() {
            sidebarEl.classList.remove('mobile-open');
            overlayEl.classList.remove('show');
        }

        overlayEl.addEventListener('click', closeMobileSidebar);

        document.querySelectorAll('#sidebar a:not([data-bs-toggle="collapse"])').forEach(function (link) {
            link.addEventListener('click', closeMobileSidebar);
        });

        mobileBreakpoint.addEventListener('change', function (e) {
            if (e.matches) {
                sidebarEl.classList.remove('collapsed');
                contentEl.classList.remove('collapsed');
            } else {
                closeMobileSidebar();
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        }
    </script> --}}

    <!-- Summernote -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    
    @stack('scripts')

</body>

</html>
