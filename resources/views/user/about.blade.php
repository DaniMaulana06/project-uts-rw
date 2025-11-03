@extends('layouts.app')

@section('title', 'Tentang Kami - Blossom Avenue')

@section('body')

<!-- 🌸 Import AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- 🌷 Floating Flower Animation --}}
<style>
  body {
    overflow-x: hidden;
  }
  .floating-flower {
    position: fixed;
    top: -10%;
    z-index: 0;
    opacity: 0.3;
    animation: floatDown 12s linear infinite;
  }
  @keyframes floatDown {
    0% { transform: translateY(-10%) rotate(0deg); opacity: 0.2; }
    50% { opacity: 0.5; }
    100% { transform: translateY(110vh) rotate(360deg); opacity: 0; }
  }
  .floating-flower:nth-child(2) { left: 20%; animation-delay: 2s; width: 40px; }
  .floating-flower:nth-child(3) { left: 60%; animation-delay: 4s; width: 35px; }
  .floating-flower:nth-child(4) { left: 80%; animation-delay: 6s; width: 45px; }
</style>

<!-- 🌺 Floating Flowers (Elegant Blossom Edition) -->
<img src="https://img.icons8.com/?size=100&id=46545&format=png&color=000000" class="floating-flower" style="left:25%;width:40px;">
<img src="https://img.icons8.com/?size=100&id=Q82NIZ7zvXKA&format=png&color=000000" class="floating-flower" style="left:25%;width:40px;">
<img src="https://img.icons8.com/?size=100&id=SzqFCGse7gJq&format=png&color=000000" class="floating-flower" style="left:50%;width:38px;">
<img src="https://img.icons8.com/?size=100&id=23042&format=png&color=000000" class="floating-flower" style="left:75%;width:42px;">   
<img src="https://img.icons8.com/?size=100&id=PDCkbr_yBwSU&format=png&color=000000" class="floating-flower" style="left:90%;width:37px;">    


{{-- 🌸 Hero Section --}}
<section class="hero-about d-flex align-items-center position-relative"
  style="background: url('https://i.pinimg.com/736x/f4/b5/cd/f4b5cdbae52d671369c829e5e90c6971.jpg') center/cover no-repeat; height: 70vh;">
  <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255,240,247,0.6);"></div>
  <div class="container position-relative text-start z-1" data-aos="fade-up">
    <p class="fw-semibold text-uppercase" style="color:#d63384; letter-spacing:2px;">Profil Perusahaan</p>
    <h1 class="display-4 fw-bold" style="font-family:'Playfair Display', serif;">Tentang <span style="color:#a81855;">Kami</span></h1>
    <p class="text-muted mt-3" style="max-width:600px;">Kami percaya setiap bunga membawa cerita dan perasaan. Melalui rangkaian yang elegan dan penuh makna, Blossom Avenue menghadirkan keindahan dalam setiap momen istimewa Anda.</p>
  </div>
</section>

{{-- 🌷 Deskripsi Singkat / Intro --}}
<section class="py-5" style="background-color:#fffafc;">
  <div class="container text-center" data-aos="fade-up">
    <p class="text-muted mx-auto" style="max-width:750px; line-height:1.8;">
      <strong>Blossom Avenue</strong> adalah perusahaan florist modern yang berfokus menghadirkan rangkaian bunga berkualitas tinggi, desain elegan, dan pelayanan profesional.
      Kami tidak sekadar menjual bunga — kami menciptakan <em>momen</em> dan <em>kesan</em> yang tak terlupakan melalui keindahan alami yang kami susun dengan hati.
    </p>
  </div>
</section>

{{-- 🌼 Sejarah Kami --}}
<section class="py-5" style="background-color:#fffafc; font-family:'Poppins', sans-serif;">
  <div class="container">
    <div class="row align-items-center gy-4">
      
      {{-- Gambar Kiri --}}
      <div class="col-md-6" data-aos="fade-right">
        <div class="position-relative rounded-4 overflow-hidden shadow-sm" style="max-width:500px; margin:auto;">
          <img 
            src="{{ url('https://i.pinimg.com/1200x/0e/17/99/0e1799efb53a0f7b3ef3be22ad796da0.jpg') }}" 
            class="img-fluid rounded-4 zoom-image" 
            alt="Perjalanan Kami">
          <div class="position-absolute top-0 start-0 w-100 h-100" 
               style="background:rgba(255,240,246,0.2);"></div>
        </div>
      </div>

      {{-- Teks Kanan --}}
      <div class="col-md-6" data-aos="fade-left">
        <h2 class="fw-bold mb-3" 
            style="color:#a81855; font-family:'Playfair Display', serif;">
          Perjalanan Kami
        </h2>

        <p class="text-muted" style="line-height:1.9; font-size:1rem;">
          Berdiri sejak tahun <strong>2024 di Palembang</strong>, 
          <strong style="color:#a81855;">Blossom Avenue</strong> lahir dari semangat sederhana: 
          menghadirkan kebahagiaan melalui keindahan bunga.
          Berawal dari toko kecil keluarga, kini kami tumbuh menjadi 
          florist modern yang dipercaya pelanggan di seluruh Indonesia.
        </p>

        <p class="text-muted" style="line-height:1.9; font-size:1rem;">
          Setiap rangkaian bukan sekadar produk, tapi karya seni —
          disusun dengan ketulusan, keindahan warna, dan makna mendalam.
          Karena kami percaya, satu buket bunga mampu menyampaikan ribuan perasaan.
        </p>

        <a href="/produk" 
           class="btn px-4 py-2 rounded-pill mt-3" 
           style="background-color:#a81855; color:white; transition:all .3s ease;">
           Lihat Koleksi Kami
        </a>
      </div>

    </div>
  </div>
</section>

{{-- 🌸 Tambahan CSS --}}
<style>
  .zoom-image {
    transition: transform 0.8s ease, box-shadow 0.5s ease;
  }
  .zoom-image:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(255, 182, 193, 0.5);
  }
</style>

{{-- 🌸 Layanan Kami --}}
<section class="py-5" style="background-color:#fffafc;">
  <div class="container text-center" data-aos="fade-up">
    <h2 class="fw-bold mb-5" style="color:#a81855; font-family:'Playfair Display', serif;">Layanan Kami</h2>
    
    <div class="row justify-content-center g-4">
      @php
        $services = [
          ['icon'=>'🌸','title'=>'Rangkaian Buket','desc'=>'Bunga segar dengan desain elegan untuk setiap momen spesial.'],
          ['icon'=>'🌹','title'=>'Pengiriman Cepat','desc'=>'Pesanan dikirim dengan cepat dan aman ke seluruh Indonesia.'],
          ['icon'=>'💮','title'=>'Langganan Bulanan','desc'=>'Layanan langganan bunga segar untuk kantor & rumah.'],
        ];
      @endphp

      @foreach ($services as $service)
      <div class="col-md-4 col-sm-6 d-flex justify-content-center">
        <div class="card border-0 shadow-sm p-4 rounded-4 h-100 service-card text-center" style="width: 100%; max-width: 300px;">
          <div class="icon mb-3">
            <span style="font-size:2.8rem;">{{ $service['icon'] }}</span>
          </div>
          <h5 class="fw-semibold mb-2" style="color:#a81855;">{{ $service['title'] }}</h5>
          <p class="text-muted small mb-0">{{ $service['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  .service-card {
    background-color: #fff;
    transition: transform 0.4s ease, box-shadow 0.3s ease;
    min-height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .service-card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 10px 20px rgba(255, 182, 193, 0.4);
  }
</style>

{{-- 🌷 Tim Kami --}}
<section class="py-5" style="background-color:#fff0f6;">
  <div class="container text-center" data-aos="fade-up">
    <h2 class="fw-bold mb-4" style="color:#a81855; font-family:'Playfair Display', serif;">Tim Kami</h2>
    <p class="text-muted mb-5" style="max-width:700px;margin:auto;">
      Di balik setiap rangkaian indah, ada tangan-tangan kreatif yang bekerja dengan sepenuh hati.  
      Inilah orang-orang di balik keindahan <strong>Blossom Avenue</strong>.
    </p>

    <div class="row g-4 justify-content-center">
      @php
        $team = [
          ['img' => 'https://i.pinimg.com/1200x/a1/27/3f/a1273fb8fc43049e1de79d78c9fb9853.jpg', 'name' => 'Syakirah Tul Hasana', 'role' => 'Founder & Florist Lead'],
          ['img' => 'https://i.pinimg.com/736x/81/5b/45/815b45d4333a427d41f879dcb01d3983.jpg', 'name' => 'Suci Rahmadani', 'role' => 'Product Curator'],
          ['img' => 'https://i.pinimg.com/1200x/a5/a0/d4/a5a0d42104b81521b0e0e48e72fa6b37.jpg', 'name' => 'Syakirah Tul Hasana', 'role' => 'Content Creator & Photographer'],
        ];
      @endphp

      @foreach ($team as $index => $person)
      <div class="col-lg-4 col-md-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}">
        <div class="team-card border-0 rounded-4 p-4 h-100 text-center position-relative overflow-hidden">
          <div class="team-img-wrapper mx-auto mb-3">
            <img 
              src="{{ $person['img'] }}" 
              alt="{{ $person['name'] }}" 
              class="rounded-circle border border-3 border-white shadow-sm"
              width="120" height="120" 
              style="object-fit: cover;"
            >
          </div>
          <h5 class="fw-semibold mb-1" style="color:#a81855;">{{ $person['name'] }}</h5>
          <p class="text-muted small mb-0">{{ $person['role'] }}</p>

          <!-- 🌸 Decorative floating petal -->
          <span class="flower-petal"></span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  /* 🌸 Team Card Style */
  .team-card {
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(255, 182, 193, 0.25);
    transition: all 0.4s ease;
  }

  .team-card:hover {
    transform: translateY(-12px) scale(1.03);
    box-shadow: 0 15px 30px rgba(255, 182, 193, 0.45);
  }

  /* 🌷 Floating petal animation inside card */
  .team-card .flower-petal {
    position: absolute;
    top: -15px;
    right: -15px;
    width: 35px;
    height: 35px;
    background-size: contain;
    background-repeat: no-repeat;
    opacity: 0.3;
    animation: floatPetal 6s ease-in-out infinite alternate;
  }

  @keyframes floatPetal {
    0% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(10px) rotate(10deg); opacity: 0.5; }
    100% { transform: translateY(-10px) rotate(-10deg); opacity: 0.3; }
  }

  /* 🌼 Image Wrapper Hover Glow */
  .team-img-wrapper img {
    transition: all 0.4s ease;
  }
  .team-card:hover img {
    box-shadow: 0 0 15px rgba(255, 192, 203, 0.6);
    transform: scale(1.05);
  }
</style>


<!-- 🌸 AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, once: true });
</script>

@endsection
