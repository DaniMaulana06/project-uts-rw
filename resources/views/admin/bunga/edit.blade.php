@extends('layouts.admin')

@section('title', 'Edit Data Bunga')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Edit Data Bunga</h3>

    <form action="{{ route('admin.bunga.update', $bunga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Jenis --}}
        <div class="form-group mb-3">
            <label for="jenis">Jenis</label>
            <input type="text" name="jenis" id="jenis" value="{{ old('jenis', $bunga->jenis) }}"
                   class="form-control @error('jenis') is-invalid @enderror" required>
            @error('jenis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="form-group mb-3">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategoriList as $value)
                    <option value="{{ $value }}" {{ old('kategori', $bunga->kategori) == $value ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $value)) }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Harga --}}
        <div class="form-group mb-3">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $bunga->harga) }}"
                   class="form-control @error('harga') is-invalid @enderror" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Gambar --}}
        <div class="form-group mb-4">
            <label for="gambar">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar"
                   class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($bunga->gambar)
                <div class="mt-3">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $bunga->gambar) }}" alt="{{ $bunga->nama }}" width="150"
                         class="rounded shadow-sm border">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.bunga.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- <style>
    .btn-pink {
        background-color: #ff7ab8;
        border-color: #ff7ab8;
        color: #fff;
    }
    .btn-pink:hover {
        background-color: #ff539e;
        color: #fff;
    }
</style> --}}
@endsection
