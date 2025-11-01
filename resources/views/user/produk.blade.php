@extends('layouts.app')

@section('title', 'Produk Blossom Avenue')

@section('body')
<div class="container py-4">

  {{-- Judul & pencarian --}}
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-1">Produk Blossom Avenue</h2>
      <p class="text-muted mb-0">Pilih kategori atau cari jenis bunga/buket.</p>
    </div>
    <form class="d-flex mt-3 mt-md-0" method="GET" action="">
      <input type="text" name="q" class="form-control me-2" placeholder="Cari: mawar, aster, bouquet">
      <button class="btn btn-outline-pink fw-semibold" type="submit">Cari</button>
    </form>
  </div>

  {{-- Kategori (tab) --}}
  <div class="d-flex flex-wrap gap-2 mb-4">
    <a href="#" class="btn btn-pink active">Semua Produk</a>
    <a href="#" class="btn btn-outline-pink">Korean Bouquet</a>
    <a href="#" class="btn btn-outline-pink">Buket Makanan</a>
  </div>

  {{-- Grid produk --}}
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    {{-- contoh card produk statis --}}
    <div class="col">
      <div class="card border-0 shadow-sm h-100 rounded-4">
        <img src="https://placehold.co/600x400/pink/fff?text=Korean+Bouquet"
             class="card-img-top rounded-top-4" style="object-fit:cover;height:250px;">
        <div class="card-body text-center">
          <h5 class="card-title mb-1">Aurora Blooms</h5>
          <p class="text-muted small mb-2">Korean Bouquet</p>
          <p class="fw-bold text-pink fs-5">Rp 350.000</p>
        </div>
        <div class="card-footer bg-white border-0 text-center pb-4">
          <button class="btn btn-pink w-75">Lihat Detail</button>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card border-0 shadow-sm h-100 rounded-4">
        <img src="https://placehold.co/600x400/ffaad2/fff?text=Colorburst+Harmony"
             class="card-img-top rounded-top-4" style="object-fit:cover;height:250px;">
        <div class="card-body text-center">
          <h5 class="card-title mb-1">Colorburst Harmony</h5>
          <p class="text-muted small mb-2">Korean Bouquet</p>
          <p class="fw-bold text-pink fs-5">Rp 300.000</p>
        </div>
        <div class="card-footer bg-white border-0 text-center pb-4">
          <button class="btn btn-pink w-75">Lihat Detail</button>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card border-0 shadow-sm h-100 rounded-4">
        <img src="https://placehold.co/600x400/fed6e3/fff?text=Korean+Round+Bouquet"
             class="card-img-top rounded-top-4" style="object-fit:cover;height:250px;">
        <div class="card-body text-center">
          <h5 class="card-title mb-1">Korean Round Bouquet</h5>
          <p class="text-muted small mb-2">Korean Bouquet</p>
          <p class="fw-bold text-pink fs-5">Rp 195.000</p>
        </div>
        <div class="card-footer bg-white border-0 text-center pb-4">
          <button class="btn btn-pink w-75">Lihat Detail</button>
        </div>
      </div>
    </div>
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
  .text-pink { color: #ff7ab8; }
  .btn-outline-pink.active, .btn-pink.active {
    background-color: #ff7ab8;
    color: #fff;
  }
</style>
@endsection
