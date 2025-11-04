@extends('layouts.app')

@section('title', 'Checkout')

@section('body')

<div class="container py-4" style="max-width: 900px;">
    <h2 class="fw-bold mb-3">Pemesanan Produk</h2>
    <p class="text-muted mb-4">Isi detail pesanan sebelum melanjutkan pembayaran.</p>
  
    {{-- FORM PEMESANAN --}}
    <div class="card border-0 shadow-sm rounded-4 mb-5">
      <div class="card-body p-4">
        <form action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="bunga_id" value="{{ array_key_first($cart) }}">


          {{-- Data Pemesan --}}
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Nama Pemesan</label>
              <input type="text" name="nama_pemesan" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nomor HP</label>
              <input type="text" name="nomor_hp" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" required>
            </div>
          </div>
  
          <hr class="my-4">
  
          {{-- rincian bunga --}}
          <h5 class="fw-semibold mb-3">Rincian Pesanan</h5>
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Nama Bunga</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cart as $id => $item)
                <tr>
                  <td>{{ $item['jenis'] }}</td>
                  <td>{{ $item['quantity'] }}</td>
                  <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                  <td>Rp {{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="fw-bold">
                <td colspan="3" class="text-end">Total:</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
              </tr>
            </tfoot>
          </table>
  
          <div class="text-end">
            <button type="submit" class="btn btn-pink btn-lg mt-3">Bayar Sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
@endsection
