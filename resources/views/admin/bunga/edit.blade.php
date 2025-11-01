@extends('layouts/admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Bunga</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.bunga.update', $bunga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Bunga</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $bunga->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror"
                                   value="{{ old('jenis', $bunga->jenis) }}" required>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="bucket1" {{ old('kategori', $bunga->kategori) == 'bucket1' ? 'selected' : '' }}>Bucket 1</option>
                                <option value="bucket_makanan" {{ old('kategori', $bunga->kategori) == 'bucket_makanan' ? 'selected' : '' }}>Bucket Makanan</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror"
                                   value="{{ old('harga', $bunga->harga) }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                            <small class="text-muted">Format: JPG, JPEG, PNG (Max. 2MB). Kosongkan jika tidak ingin mengubah gambar.</small>
                            @if($bunga->gambar)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($bunga->gambar) }}"
                                         alt="{{ $bunga->nama }}"
                                         style="max-height: 100px;">
                                </div>
                            @endif
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.bunga.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
