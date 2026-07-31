<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            z-index: 1000;
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
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        @include('partials.sidebar')
    </div>

    <!-- Content -->
    <div id="content" class="content">

        <!-- Main Content -->
        <div class="content-wrapper p-4">
            @yield('content')
        </div>

    </div>

    <!-- JS -->
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        }
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
