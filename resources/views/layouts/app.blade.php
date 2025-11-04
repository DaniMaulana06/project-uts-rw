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

  {{-- Navbar Blossom--}}
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

      {{-- Logo --}}
      <a class="navbar-brand d-flex align-items-center" href="/beranda">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Blossom Avenue" width="40" height="40" class="me-2">
        <span style="font-family: 'Pacifico', cursive;">Blossom_Avenue</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav ms-auto">
          <a class="nav-link {{ request()->is('beranda') ? 'active' : '' }}" href="/beranda">Beranda</a>
          <a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
          <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
          <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="/cart">Keranjang</a>
        </div>
      </div>
    </div>
  </nav>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif


  @yield('body')

 <footer style="background: #fce4ec; font-size: 14px; padding: 40px 0;">
  <div class="container">
    <div class="row text-start">

      <div class="col-md-3 mb-4">
        <h5 class="fw-semibold" style="color: #333;">Kontak</h5>
        <ul class="list-unstyled" style="color: #333; padding-left:0;">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
          <li>
            <a href="https://wa.me/082214208134">
              <i class="fa-brands fa-whatsapp" style="color:#25D366; margin-right:6px;"></i>
              0822 1420 8134
            </a>
          </li>
          <li>
            <a href="mailto:blossomavenue@gmail.com">
              <i class="fa-solid fa-envelope" style="color:#EA4335; margin-right:6px;"></i>
              blossomavenue@gmail.com
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/blossomavenue__/">
              <i class="fa-brands fa-instagram" style="color:#E4405F; margin-right:6px;"></i>
              @blossomavenue_
            </a>
          </li>
          
        </ul>
      </div>

      <div class="col-md-3 mb-4">
        <h5 class="fw-semibold" style="color: #333;">Informasi</h5>
        <ul class="list-unstyled" style="color: #333; padding-left:0;">
          <li><a href="/about" style="color: #333; text-decoration: none;">Tentang Kami</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Kontak Kami</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">FAQ & Kebijakan</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Partnership</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-md-3 mb-4">
        <h5 class="fw-semibold" style="color: #333;">Layanan</h5>
        <ul class="list-unstyled" style="color: #333; padding-left:0;">
          <li><a href="#" style="color: #333; text-decoration: none;">Bouquet Bunga</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Standing Flower</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Bunga Wisuda</a></li>
          <li><a href="#" style="color: #333; text-decoration: none;">Bunga Pengantin</a></li>
        </ul>
      </div>

     <div class="col-md-3 mb-4">
  <h5 class="fw-semibold" style="color: #333;">Lokasi Kami</h5>

  <a href="https://maps.app.goo.gl/ckGi1mr9h6uLszEh8?g_st=com.google.maps.preview.copy" target="_blank" rel="noopener noreferrer" style="display:block; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); max-width: 100%;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15950.27468455658!2d104.73112925333721!3d-2.990935261857771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b74c9e996f919%3A0x3083af0cbf7be88f!2sPalembang%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1706948723054!5m2!1sen!2sid"
      width="100%" height="180" style="border:0; pointer-events:none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </a>

  <small style="display: block; margin-top: 5px; color:#555;">Klik peta untuk membuka di Google Maps</small>
</div>


    </div>

    <div class="text-center pt-3" style="color: #333; font-size: 13px;">
      © 2024 Blossom Avenue • All Rights Reserved
    </div>
  </div>
</footer>


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
