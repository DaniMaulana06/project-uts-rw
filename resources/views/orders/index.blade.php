@extends('layouts.app')

@section('title')
Order
@endsection

@section('content')
<div class="container mt-4">
    <h3>Riwayat Pesanan</h3>

    @foreach($orders as $order)
        <div class="card mt-3">
            <div class="card-header">
                <strong>Pemesan:</strong> {{ $order->nama_pemesan }} |
                <strong>Status:</strong> {{ ucfirst($order->status) }} |
                <strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}
            </div>
            <div class="card-body">
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->jenis }} - {{ $item->quantity }}x (Rp {{ number_format($item->price, 0, ',', '.') }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
