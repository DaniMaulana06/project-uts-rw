<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Blossom Avenue</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff5f8;
    }

    .sidebar {
      min-height: 100vh;
      background-color: #ff69b4; /* Pink Blossom */
      padding-top: 20px;
      box-shadow: 2px 0 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
      color: white;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 10px 18px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-radius: 8px;
      margin: 4px 10px;
      transition: all 0.25s ease;
      font-weight: 500;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #ffb6d9; /* Lembut saat hover/aktif */
      color: #fff;
      transform: translateX(4px);
    }

    .sidebar a i {
      font-size: 1.1rem;
    }

    .sidebar form button {
      background-color: transparent;
      border: none;
      color: #fff;
      text-align: left;
      width: 100%;
      padding: 10px 18px;
      margin: 4px 10px;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.25s ease;
    }

    .sidebar form button:hover {
      background-color: #ffb6d9;
      color: white;
      transform: translateX(4px);
    }

    .content {
      padding: 30px;
    }

    header {
      background-color: #fff;
      border-bottom: 3px solid #ffb6d9;
    }

    header h3 {
      color: #ff69b4;
      font-weight: 600;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="mb-4 text-center">Admin Panel</h4>
        <nav>
          <a href="/admin/bunga" class="{{ request()->is('admin/bunga') ? 'active' : '' }}">
            <i class="fa-solid fa-seedling"></i> Kelola Bunga
          </a>

          <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
          </form>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <header class="p-3 mb-4 shadow-sm">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="m-0">Admin Dashboard</h3>
          </div>
        </header>

        <div class="content">
          @yield('content')
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
