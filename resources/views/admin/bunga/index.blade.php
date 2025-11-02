@extends('layouts/admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Bunga</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.bunga.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Bunga
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Jenis</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bunga as $key => $bng)
                                        <tr>
                                            <td>{{ $bunga->firstItem() + $key }}</td>
                                            <td>
                                                <img src="{{ Storage::url($bng->gambar) }}" alt="{{ $bng->jenis }}"
                                                    style="max-height: 50px;">
                                            </td>
                                            <td>{{ $bng->jenis }}</td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $bng->kategori)) }}</td>
                                            <td>Rp {{ number_format($bng->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                    action="{{ route('admin.bunga.destroy', $bng->id) }}" method="POST"
                                                    class="d-inline">
                                                    <a href="{{ route('admin.bunga.edit', $bng->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Bunga Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" justify-content-end ms-3 me-3">
                        {{ $bunga->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection