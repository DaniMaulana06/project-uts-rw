<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Blossom Avenue</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffe6ef 0%, #ffd1e8 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(255, 105, 180, 0.2);
      background-color: #fff;
    }

    .card h4 {
      color: #ff69b4;
      font-weight: 600;
      font-size: 1.4rem;
    }

    label {
      color: #555;
      font-weight: 500;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ffc4dd;
    }

    .form-control:focus {
      border-color: #ff80bf;
      box-shadow: 0 0 5px rgba(255, 105, 180, 0.3);
    }

    .btn-pink {
      background-color: #ff69b4;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px;
      font-weight: 500;
      transition: all 0.2s ease;
    }

    .btn-pink:hover {
      background-color: #ff4da6;
      color: #fff;
    }

    .alert {
      border-radius: 10px;
    }

    .footer-text {
      text-align: center;
      font-size: 13px;
      color: #888;
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-4 mx-auto">
      <div class="card p-4">
        <h4 class="text-center mb-3">Login Admin</h4>

        @if ($errors->any())
          <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
        @endif

        @if (session('success'))
          <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email admin" required>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
          </div>

          <button type="submit" class="btn btn-pink w-100">Login</button>
        </form>
      </div>

      <div class="footer-text">
        © 2024 Blossom Avenue — Admin Access Only
      </div>
    </div>
  </div>
</body>
</html>
