@extends('layouts.app')
@section('title')
    Keranjang
@endsection
@section('body')
    <div class="container mt-4">
        <h3>Keranjang Belanja</h3>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        @if(!empty($cart))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['jenis'] }}</td>
                            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp {{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <!-- PERBAIKAN: Pisahkan form hapus dan link checkout -->
                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                
                                <!-- Link checkout di luar form -->
                                <a href="{{ route('checkout.form', $id) }}" class="btn btn-pink btn-sm">
                                    Lanjut ke Checkout
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Optional: Tombol kosongkan keranjang -->
            <div class="mt-3 mb-3">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-warning" onclick="return confirm('Yakin ingin mengosongkan keranjang?')">
                        Kosongkan Keranjang
                    </button>
                </form>
            </div>
        @else
            <div class="alert alert-info">
                <p>Keranjang masih kosong.</p>
                <a href="{{ route('bunga.index') }}" class="btn btn-primary">Mulai Belanja</a>
            </div>
        @endif
    </div>
@endsection