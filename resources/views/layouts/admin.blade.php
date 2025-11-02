<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Flower Shop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4 class="mb-4 text-center text-white">Admin Panel</h4>
                <nav>
                    <a href="/admin/bunga">
                        <i class="fas fa-flower fa-fw"></i> Kelola Bunga
                    </a>
                    <!-- Tambahkan menu lain di sini jika diperlukan -->
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <header class="p-3 mb-4 bg-white shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Admin Dashboard</h3>
                        <!-- Tambahkan menu profile/logout di sini jika diperlukan -->
                    </div>
                </header>

                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
