@extends('layouts.app')

@section('title', 'Produk Blossom Avenue')

@section('body')
  <div class="container py-4">

    {{-- Judul & pencarian --}}
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
      <div>
        <h2 class="mb-1 fw-bold">Produk Blossom Avenue</h2>
        <p class="mb-0 text-muted">Pilih kategori atau cari jenis bunga/buket.</p>
      </div>

      <form class="mt-3 d-flex mt-md-0" method="GET" action="">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari: mawar, aster, bouquet"
          value="{{ request('search') }}">
        <button class="btn btn-outline-pink fw-semibold" type="submit">Cari</button>
      </form>
    </div>

    {{-- Tab kategori --}}
    <div class="flex-wrap gap-2 mb-4 d-flex">
      <a href="{{ url('/produk') }}" class="btn {{ !request('kategori') ? 'btn-pink active' : 'btn-outline-pink' }}">
        Semua Produk
      </a>
      <a href="{{ url('/produk?kategori=bunga_satuan') }}"
        class="btn {{ request('kategori') == 'bunga_satuan' ? 'btn-pink active' : 'btn-outline-pink' }}">
        Bunga Satuan
      </a>
      <a href="{{ url('/produk?kategori=buket_makanan') }}"
        class="btn {{ request('kategori') == 'buket_makanan' ? 'btn-pink active' : 'btn-outline-pink' }}">
        Buket Makanan
      </a>
      <a href="{{ url('/produk?kategori=buket_thumbelina') }}"
        class="btn {{ request('kategori') == 'buket_thumbelina' ? 'btn-pink active' : 'btn-outline-pink' }}">
        Buket Thumbelina
      </a>
      <a href="{{ url('/produk?kategori=flower_box') }}"
        class="btn {{ request('kategori') == 'flower_box' ? 'btn-pink active' : 'btn-outline-pink' }}">
        Flower Box
      </a>
    </div>

    {{-- Grid produk --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      @forelse ($bunga as $bng)
        <div class="col">
          <div class="border-0 shadow-sm card h-100 rounded-4">

            @php
              $defaultImage = "https://placehold.co/600x400/ffaad2/fff?text=" . urlencode($bng->jenis);
              $imagePath = $bng->gambar ? asset('storage/' . $bng->gambar) : $defaultImage;
            @endphp

            <img src="{{ $imagePath }}" class="card-img-top rounded-top-4" style="object-fit:cover;height:250px;"
              alt="{{ $bng->jenis }}" onerror="this.src='{{ $defaultImage }}'">

            <div class="text-center card-body">
              <h5 class="mb-1 card-title">{{ $bng->jenis }}</h5>
              <p class="mb-2 text-muted small">{{ ucwords(str_replace('_', ' ', $bng->kategori)) }}</p>
              <p class="fw-bold text-pink fs-5">Rp{{ number_format($bng->harga, 0, ',', '.') }}</p>
            </div>

            <div class="pb-4 text-center bg-white border-0 card-footer">
              <button class="btn btn-pink w-75">Masukkan Keranjang</button>
            </div>
          </div>
        </div>
      @empty
        <div class="py-5 text-center col-12">
          <p class="mb-0 text-muted">Belum ada produk tersedia.</p>
        </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
      {{ $bunga->links('pagination::bootstrap-5') }}
    </div>

  </div>

  {{-- Style tambahan --}}
  <style>
    .btn-pink {
      background-color: #ff7ab8;
      border-color: #ff7ab8;
      color: white;
    }

    .btn-pink:hover {
      background-color: #ff539e;
      border-color: #ff539e;
      color: #fff;
    }

    .btn-outline-pink {
      color: #ff7ab8;
      border-color: #ff7ab8;
    }

    .btn-outline-pink:hover {
      background-color: #ff7ab8;
      color: #fff;
    }

    .text-pink {
      color: #ff7ab8;
    }

    .btn-outline-pink.active,
    .btn-pink.active {
      background-color: #ff7ab8;
      color: #fff;
    }

    /* 🌸 Pagination Blossom Style */
    .pagination {
      --bs-pagination-color: #ff7ab8;
      --bs-pagination-hover-color: #fff;
      --bs-pagination-hover-bg: #ff9ec9;
      --bs-pagination-hover-border-color: #ff9ec9;
      --bs-pagination-focus-color: #fff;
      --bs-pagination-focus-bg: #ff7ab8;
      --bs-pagination-active-bg: #ff7ab8;
      --bs-pagination-active-border-color: #ff7ab8;
      --bs-pagination-border-radius: 2rem;
      --bs-pagination-padding-x: 0.9rem;
      --bs-pagination-padding-y: 0.45rem;
    }

    .pagination .page-link {
      border: 1px solid #ffc1da;
      color: #ff7ab8;
      background-color: #fff;
      transition: all 0.2s ease-in-out;
    }

    .pagination .page-link:hover {
      color: #fff;
      background-color: #ff9ec9;
      border-color: #ff9ec9;
    }

    .pagination .active .page-link {
      background-color: #ff7ab8;
      border-color: #ff7ab8;
      color: white;
      font-weight: 600;
    }

    .pagination .disabled .page-link {
      color: #ffd1e0;
      background-color: #fff;
      border-color: #ffd1e0;
    }
  </style>
@endsection
