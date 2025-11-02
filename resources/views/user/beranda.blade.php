@extends('layouts.app')

@section('title', 'Beranda')

@section('body')
    {{-- HERO CAROUSEL (full width) --}}
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
        {{-- indikator --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        {{-- slides --}}
        <div class="carousel-inner">
            {{-- Slide 1 --}}
            <div class="carousel-item active">
                {{-- Contoh: ambil dari storage. Jalankan "php artisan storage:link" jika belum. --}}
                <img src="{{ asset('storage/banner/banner1.jpg') }}" class="d-block w-100 hero-img"
                    alt="Fresh Flower Banner 1">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h2 class="fw-bold">Blossom Avenue</h2>
                    <p class="mb-3">Buket bunga segar untuk momen spesialmu.</p>
                    <a href="{{ url('/produk') }}" class="btn btn-pink">Lihat Produk</a>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/banner2.jpg') }}" class="d-block w-100 hero-img"
                    alt="Fresh Flower Banner 2">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h2 class="fw-bold">Custom Bouquet</h2>
                    <p class="mb-3">Bisa request warna, tema, dan budget.</p>
                    <a href="{{ url('/about') }}" class="btn btn-outline-pink">Tentang Kami</a>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/banner3.jpg') }}" class="d-block w-100 hero-img"
                    alt="Fresh Flower Banner 3">
                <div class="carousel-caption d-none d-md-block text-end">
                    <h2 class="fw-bold">Order Online</h2>
                    <p class="mb-3">Pesan mudah, kirim cepat area Palembang.</p>
                    <a href="{{ url('/produk') }}" class="btn btn-pink">Belanja Sekarang</a>
                </div>
            </div>
        </div>

        {{-- kontrol kiri/kanan --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>

    {{-- konten lain di bawah banner --}}
    // {{-- konten lain di bawah banner --}}
<div class="container py-5">
    <h3 class="fw-bold mb-3">Selamat datang di Blossom Avenue</h3>
    <p class="text-muted">Pilihan buket segar, desain manis, dan bisa custom sesuai acara.</p>


    <!-- Teks tambahan di bawah tombol -->
    <div class="text-center mt-5" style="max-width: 700px; margin-left:auto; margin-right:auto; color: #333; font-family: 'Poppins', sans-serif;">
        <div style="color: #bf3e5c; font-size: 14px; font-style: italic; font-weight: 600; letter-spacing: 0.1em;">
            MENGAPA KAMI?
        </div>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

<h2 style="font-family: 'Dancing Script', cursive; font-weight: 400; font-size: 36px; margin-top: 10px; margin-bottom: 20px; color: #1b2b22;">
    Keunggulan Toko Bunga Kami
</h2>

        <p style="font-weight: 300; font-size: 16px; line-height: 1.7; color: #555;">
            Percayakan kebutuhan bunga Anda kepada blossom_avenue - toko bunga terpercaya yang selalu memberikan kualitas bunga terbaik dan pelayanan yang profesional. Kami telah terbukti sebagai toko bunga terpercaya dengan kepercayaan dari ribuan pelanggan yang telah menggunakan jasa kami.
        </p>
    </div>
</div>

<video autoplay muted loop
        style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 8px; margin-top: 20px;">
        <source src="videos/pidiobunga.mp4" type="video/mp4">
        Browser Anda tidak mendukung video.
    </video>

    <!-- Container Testimonial -->
<div style="max-width: 900px; margin: 40px auto; font-family: 'Poppins', sans-serif;">

    <!-- Judul Section -->
    <div style="text-align: center; margin-bottom: 40px;">
        <p style="color: #bf3e5c; font-style: italic; letter-spacing: 0.1em; font-weight: 600; margin: 0;">
            TESTIMONIALS
        </p>
        <h2 style="font-family: 'Dancing Script', cursive; font-weight: 400; font-size: 36px; margin-top: 10px; margin-bottom: 20px; color: #1b2b22;">

            Apa yang Mereka Katakan?
        </h2>
    </div>

    <!-- Area Testimonial Cards -->
    <div id="testimonial-cards" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">

        <!-- Testimonial default cards -->
        <div class="testimonial-card" tabindex="0">
            <p style="font-style: normal;">
                <span style="color: #ff7ab8; font-size: 28px; vertical-align: top;">&#8220;</span>
                Toko bunga blossom_avenue sangat terpercaya dan profesional. Saya telah memesan bunga untuk grand opening perusahaan saya di Sudirman dan rangkaian bunga yang disediakan oleh blossom_avenue sungguh memukau. Saya akan merekomendasikan blossom_avenue kepada teman-teman dan kolega saya.
            </p>
            <p style="font-weight: 700; margin: 15px 0 0;">Dani</p>
            <p style="font-size: 12px; color: #666;">KM12</p>
        </div>

        <div class="testimonial-card" tabindex="0">
            <p style="font-style: normal;">
                <span style="color: #ff7ab8; font-size: 28px; vertical-align: top;">&#8220;</span>
                Saya sangat puas dengan pelayanan toko bunga blossom_avenue. Bunga yang saya pesan untuk acara pernikahan saya di Whyndam sangat cantik dan segar. Terima kasih blossom_avenue!
            </p>
            <p style="font-weight: 700; margin: 15px 0 0;">Suci</p>
            <p style="font-size: 12px; color: #666;">Plaju</p>
        </div>

        <div class="testimonial-card" tabindex="0">
            <p style="font-style: normal;">
                <span style="color: #ff7ab8; font-size: 28px; vertical-align: top;">&#8220;</span>
                Saya sangat terkesan dengan bunga yang saya pesan dari toko bunga bloosom_avenue. Saya memesan bunga box untuk mengucapkan selamat pelantikan CPNS kepada saudara saya dan bunga yang diterima sangat indah dan menyentuh hati.
            </p>
            <p style="font-weight: 700; margin: 15px 0 0;">Rahmi</p>
            <p style="font-size: 12px; color: #666;">Sekip</p>
        </div>
    </div>

    <!-- Form tambah testimonial -->
    <div style="margin-top: 40px; max-width: 500px; margin-left: auto; margin-right: auto;">
        <h3 style="text-align: center; color: #666;">Tambah Testimoni Anda</h3>
        <form id="testimonial-form" style="display: flex; flex-direction: column; gap: 15px;">
            <textarea id="comment" placeholder="Tulis komentar Anda..." required style="width: 100%; min-height: 80px; padding: 10px; font-family: inherit; font-size: 14px; border: 1px solid #ccc; border-radius: 6px;"></textarea>
            <input type="text" id="name" placeholder="Nama Anda" required style="padding: 10px; font-family: inherit; font-size: 14px; border: 1px solid #ccc; border-radius: 6px;">
            <input type="text" id="location" placeholder="Kota/Daerah" required style="padding: 10px; font-family: inherit; font-size: 14px; border: 1px solid #ccc; border-radius: 6px;">
            <button type="submit" style="background-color: #ff7ab8; color: white; font-weight: 600; padding: 12px; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.3s;">
                Kirim Testimoni
            </button>
        </form>
    </div>
</div>

<!-- CSS tambahan di dalam style tag (bisa pindah ke file css) -->
<style>
    .testimonial-card {
        background-color: #f8eaea;
        border-radius: 12px;
        padding: 20px;
        box-sizing: border-box;
        width: 280px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 0 5px rgba(0,0,0,0.05);
        outline: none;
        user-select: none;
    }

    .testimonial-card:hover,
    .testimonial-card:focus,
    .testimonial-card.active {
        transform: scale(1.05);
        box-shadow: ##ff7ab8;
        background-color: #f1c1c8;
        z-index: 10;
        position: relative;
    }
</style>

<!-- Script untuk menambah testimoni dan efek klik menonjol -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('testimonial-form');
        const cardsContainer = document.getElementById('testimonial-cards');

        // Fungsi agar hanya satu testimonial yang aktif (menonjol)
        function setActiveCard(card) {
            const cards = document.querySelectorAll('.testimonial-card');
            cards.forEach(c => c.classList.remove('active'));
            if(card) card.classList.add('active');
        }

        // Event klik pada card untuk menonjolkan
        cardsContainer.addEventListener('click', function(e) {
            const card = e.target.closest('.testimonial-card');
            if(!card) return;
            setActiveCard(card);
        });

        // Event keyboard enter/focus pada card
        cardsContainer.addEventListener('keydown', function(e) {
            if(e.key === 'Enter' || e.key === ' ') {
                const card = e.target.closest('.testimonial-card');
                if(!card) return;
                e.preventDefault();
                setActiveCard(card);
            }
        });

        // Submit form untuk menambah testimonial baru
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Ambil nilai input
            const comment = document.getElementById('comment').value.trim();
            const name = document.getElementById('name').value.trim();
            const location = document.getElementById('location').value.trim();

            // Validasi sederhana
            if(!comment || !name || !location){
                alert('Silakan isi semua kolom testimoni.');
                return;
            }

            // Buat elemen card baru
            const newCard = document.createElement('div');
            newCard.classList.add('testimonial-card');
            newCard.tabIndex = 0; // supaya bisa focus dan beri event keyboard
            newCard.innerHTML = `
                <p style="font-style: normal;">
                    <span style="color: #bf3e5c; font-size: 28px; vertical-align: top;">&#8220;</span>
                    ${comment}
                </p>
                <p style="font-weight: 700; margin: 15px 0 0;">${name}</p>
                <p style="font-size: 12px; color: #666;">${location}</p>
            `;

            // Tambahkan card baru ke container
            cardsContainer.appendChild(newCard);

            // Fokus dan beri efek active ke card baru
            setActiveCard(newCard);

            // Reset form
            form.reset();
        });
    });
</script>


    {{-- styling khusus banner --}}
    <style>
        .hero-img {
            height: 420px;
            object-fit: cover;
        }

        .btn-pink {
            background: #ff7ab8;
            border-color: #ff7ab8;
            color: #fff;
        }

        .btn-pink:hover {
            background: #ff539e;
            border-color: #ff539e;
            color: #fff;
        }

        .btn-outline-pink {
            color: #ff7ab8;
            border-color: #ff7ab8;
        }

        .btn-outline-pink:hover {
            background: #ff7ab8;
            color: #fff;
        }

        .carousel-caption {
            text-shadow: 0 2px 16px rgba(180, 12, 12, 0.45);
        }
    </style>
@endsection