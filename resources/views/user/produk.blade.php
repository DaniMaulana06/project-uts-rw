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
        <input type="text" name="q" class="form-control me-2" placeholder="Cari: mawar, aster, bouquet"
          value="{{ request('q') }}">
        <button class="btn btn-outline-pink fw-semibold" type="submit">Cari</button>
      </form>
    </div>

    {{-- tab kategori --}}
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
      {{-- card bunga --}}
        <div class="col">
          <div class="border-0 shadow-sm card h-100 rounded-4">

            @php
              // Path default placeholder jika gambar tidak ditemukan
              $defaultImage = "https://placehold.co/600x400/ffaad2/fff?text=" . urlencode($bng->nama);

              // akses gambar dari storage yang lah di publish
              $imagePath = $bng->gambar ? asset('storage/' . $bng->gambar) : $defaultImage;
            @endphp

            <img src="{{ $imagePath }}" class="card-img-top rounded-top-4" style="object-fit:cover;height:250px;"
              alt="{{ $bng->nama }}" onerror="this.src='{{ $defaultImage }}'">

            <div class="text-center card-body">
              <h5 class="mb-1 card-title">{{ $bng->jenis }}</h5>
              <p class="mb-2 text-muted small">{{ucwords(str_replace('_',' ', $bng->kategori ))}}</p>
              <p class="fw-bold text-pink fs-5">Rp{{ number_format($bng->harga, 0, ',', '.') }}</p>
            </div>

            <div class="pb-4 text-center bg-white border-0 card-footer">
              <button class="btn btn-pink w-75">Lihat Detail</button>
            </div>
          </div>
        </div>
      @empty
        <div class="py-5 text-center col-12">
          <p class="mb-0 text-muted">Belum ada produk tersedia.</p>
        </div>
      @endforelse
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
  </style>
@endsection