@extends('layouts.app')

@section('title', 'Pembayaran')

@section('body')
<div class="container py-4" style="max-width: 900px;">
  <h2 class="fw-bold mb-3">Pemesanan Produk</h2>
  <p class="text-muted mb-4">Isi detail pesanan. Total harga dihitung otomatis.</p>

  {{-- Kartu Form Pembayaran --}}
  <div class="card border-0 shadow-sm rounded-4 mb-5">
    <div class="card-body p-4">
      <form id="formPembayaran" autocomplete="off">
        <div class="row g-3">
          {{-- Jenis --}}
          <div class="col-md-6">
            <label class="form-label">Jenis</label>
            <input type="text" name="jenis" class="form-control" placeholder="Contoh: Mawar / Paket 200k" required>
            <small class="text-muted">Bunga Satuan: isi nama bunga. Buket Thumbelina: isi varian paket.</small>
          </div>

          {{-- Kategori --}}
          <div class="col-md-6">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="bunga_satuan">Bunga Satuan</option>
              <option value="buket_thumbelina">Buket Thumbelina</option>
              <option value="buket_makanan">Buket Makanan</option>
              <option value="flower_box">Flower Box</option>
            </select>
          </div>

          {{-- Gambar --}}
          <div class="col-md-6">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" id="inputGambar" accept="image/*">
            <small class="text-muted">Opsional. Pilih foto contoh produk.</small>
          </div>
          <div class="col-md-6 d-flex align-items-end">
            <img id="previewGambar" src="https://placehold.co/400x260?text=Preview" alt="Preview"
                 class="img-fluid rounded-3 w-100" style="max-height: 160px; object-fit: cover;">
          </div>

          {{-- Harga --}}
          <div class="col-md-6">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" min="0" step="1" name="harga" id="harga"
                   class="form-control" placeholder="contoh: 200000" required>
            <small class="text-muted">Isi angka saja (tanpa titik/koma).</small>
          </div>

          {{-- Jumlah --}}
          <div class="col-md-6">
            <label class="form-label">Jumlah Bunga</label>
            <input type="number" min="1" step="1" name="jumlah" id="jumlah"
                   class="form-control" value="1" required>
          </div>

          <div class="col-12"><hr class="my-2"></div>

          {{-- Total --}}
          <div class="col-md-6">
            <label class="form-label">Total Harga</label>
            <input type="text" id="totalRupiah" class="form-control fw-bold" value="Rp 0" readonly>
            <input type="hidden" id="total" name="total">
          </div>

          {{-- Tombol --}}
          <div class="col-md-6 d-flex align-items-end justify-content-md-end">
            <button type="button" class="btn btn-outline-pink me-2" id="btnReset">Reset</button>
            <button type="submit" class="btn btn-pink">Bayar Sekarang</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  {{-- === TABEL RIWAYAT PEMESANAN === --}}
  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-pink text-white fw-semibold">
      <i class="bi bi-clock-history me-2"></i> Riwayat Pemesanan
    </div>
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>02/11/2025</td>
              <td>Buket Thumbelina Paket 200k</td>
              <td>Buket Thumbelina</td>
              <td>1</td>
              <td>Rp 200.000</td>
              <td>Rp 200.000</td>
              <td><span class="badge bg-success">Selesai</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td>01/11/2025</td>
              <td>Mawar</td>
              <td>Bunga Satuan</td>
              <td>10</td>
              <td>Rp 10.000</td>
              <td>Rp 100.000</td>
              <td><span class="badge bg-warning text-dark">Diproses</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td>30/10/2025</td>
              <td>Aster</td>
              <td>Bunga Satuan</td>
              <td>5</td>
              <td>Rp 6.000</td>
              <td>Rp 30.000</td>
              <td><span class="badge bg-secondary">Menunggu</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- Script preview & total --}}
<script>
  const inputGambar = document.getElementById('inputGambar');
  const preview = document.getElementById('previewGambar');
  inputGambar?.addEventListener('change', (e) => {
    const file = e.target.files?.[0];
    if (file) preview.src = URL.createObjectURL(file);
  });

  const harga  = document.getElementById('harga');
  const jumlah = document.getElementById('jumlah');
  const totalRupiah = document.getElementById('totalRupiah');
  const totalHidden = document.getElementById('total');
  function rupiah(n){ return new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR',maximumFractionDigits:0}).format(n||0);}
  function hitung(){ const h=+harga.value||0; const j=+jumlah.value||0; const t=h*j; totalRupiah.value=rupiah(t); totalHidden.value=t;}
  harga?.addEventListener('input',hitung); jumlah?.addEventListener('input',hitung); hitung();

  document.getElementById('formPembayaran')?.addEventListener('submit', e=>{
    e.preventDefault(); alert('Data pembayaran siap dikirim. (Demo view saja)');
  });
  document.getElementById('btnReset')?.addEventListener('click', ()=>{
    document.getElementById('formPembayaran').reset();
    preview.src='https://placehold.co/400x260?text=Preview'; hitung();
  });
</script>

{{-- Warna pink header --}}
<style>
  .bg-pink { background-color: #ff7ab8 !important; }
</style>
@endsection
