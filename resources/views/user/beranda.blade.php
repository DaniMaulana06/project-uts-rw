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
    <div class="container py-5">
        <h3 class="fw-bold mb-3">Selamat datang di Blossom Avenue</h3>
        <p class="text-muted">Pilihan buket segar, desain manis, dan bisa custom sesuai acara.</p>
    </div>

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