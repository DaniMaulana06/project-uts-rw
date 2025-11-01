<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  {{-- Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Itim&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

  {{-- 🌷 Navbar Blossom Pink --}}
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/beranda">🌸 blossom_avenue</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav ms-auto">
          <a class="nav-link {{ request()->is('beranda') ? 'active' : '' }}" href="/beranda">Beranda</a>
          <a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
          <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
        </div>
      </div>
    </div>
  </nav>

  @yield('body')

  <script>
    // efek bayangan saat scroll
    window.addEventListener('scroll', () => {
      const nav = document.querySelector('.navbar');
      if (window.scrollY > 10) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
    });
  </script>

</body>
</html>
