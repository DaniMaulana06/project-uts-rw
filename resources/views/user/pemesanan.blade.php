@extends('layouts.app')

@section('title', 'Pembayaran')

@section('body')
  <div class="container py-4" style="max-width: 900px;">
    <h2 class="fw-bold mb-3">Pemesanan Produk</h2>
    <p class="text-muted mb-4">Isi detail pesanan Anda sebelum checkout.</p>

    {{-- Pesan Error --}}
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- PERBAIKAN: Gunakan $item langsung, bukan $cart --}}
    @if(isset($item))
      <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-body p-4">
          <form action="{{ route('checkout.store') }}" method="POST" id="formPembayaran">
            @csrf
            
            {{-- Hidden input untuk ID produk --}}
            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
            
            <div class="row g-3">

              {{-- Jenis --}}
              <div class="col-md-6">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $item['jenis'] ?? '' }}" readonly>
              </div>

              {{-- Kategori --}}
              <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control"
                  value="{{ ucwords(str_replace('_', ' ', $item['kategori'] ?? '')) }}" readonly>
              </div>

              {{-- Gambar Produk --}}
              <div class="col-md-6">
                <label class="form-label">Gambar Produk</label>
                <img src="{{ asset('storage/' . $item['gambar']) }}" alt="Gambar Produk"
                  class="img-fluid rounded-3 w-100" style="max-height: 200px; object-fit: cover;">
              </div>

              {{-- Harga --}}
              <div class="col-md-6">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" value="{{ $item['harga'] ?? 0 }}" readonly>
              </div>

              {{-- Jumlah --}}
              <div class="col-md-6">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                  value="{{ $item['quantity'] ?? 1 }}" min="1" required>
              </div>

              {{-- Total Harga --}}
              <div class="col-md-6">
                <label class="form-label">Total Harga</label>
                <input type="text" id="totalRupiah" class="form-control fw-bold" readonly>
                <input type="hidden" id="total" name="total">
              </div>

              <div class="col-12">
                <hr>
              </div>

              {{-- Nama Pemesan --}}
              <div class="col-md-6">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama lengkap" required>
              </div>

              {{-- Nomor HP --}}
              <div class="col-md-6">
                <label class="form-label">Nomor HP</label>
                <input type="text" name="nomor_hp" class="form-control" placeholder="08xxxxxx" required>
              </div>

              {{-- Alamat --}}
              <div class="col-12">
                <label class="form-label">Alamat Pengiriman</label>
                <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat lengkap..." required></textarea>
              </div>

              {{-- Tombol --}}
              <div class="col-12 d-flex justify-content-end mt-3">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-pink px-4">Bayar Sekarang</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    @else
      <div class="alert alert-warning">
        Data tidak ditemukan, silakan kembali ke keranjang.
        <a href="{{ route('cart.index') }}" class="btn btn-sm btn-primary">Ke Keranjang</a>
      </div>
    @endif
  </div>

  {{-- Script perhitungan total --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const hargaInput = document.getElementById('harga');
      const jumlahInput = document.getElementById('jumlah');
      const totalRupiah = document.getElementById('totalRupiah');
      const totalHidden = document.getElementById('total');

      function formatRupiah(angka) {
        return 'Rp ' + (angka || 0).toLocaleString('id-ID');
      }

      function hitungTotal() {
        const harga = parseFloat(hargaInput.value) || 0;
        const jumlah = parseInt(jumlahInput.value) || 0;
        const total = harga * jumlah;
        totalRupiah.value = formatRupiah(total);
        totalHidden.value = total;
      }

      jumlahInput.addEventListener('input', hitungTotal);
      hitungTotal();
    });
  </script>

  <style>
    .btn-pink {
      background-color: #ff7ab8;
      color: white;
      border: none;
    }

    .btn-pink:hover {
      background-color: #ff559d;
      color: white;
    }
  </style>
@endsection