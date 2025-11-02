@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('body')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Tim Blossom Avenue</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4">
                <img src="https://placehold.co/150x150" class="rounded-circle mb-3" alt="Member 1">
                <h5 class="card-title">Alya Putri</h5>
                <p class="text-muted small">Founder & CEO</p>
                <p class="card-text">Alya adalah pendiri Blossom Avenue yang bersemangat dalam menghadirkan keindahan bunga segar kepada pelanggan kami.</p>
            </div> 
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4">
                <img src="https://placehold.co/150x150" class="rounded-circle mb-3" alt="Member 2">
                <h5 class="card-title">Rafi Ahmad</h5>
                <p class="text-muted small">Head of Marketing</p>
                <p class="card-text">Rafi bertanggung jawab untuk strategi pemasaran dan memastikan Blossom Avenue dikenal luas oleh pecinta bunga.</p>
            </div> 
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4">
                <img src="https://placehold.co/150x150" class="rounded-circle mb-3" alt="Member 3">
                <h5 class="card-title">Siti Nurhaliza</h5>
                <p class="text-muted small">Lead Florist</p>
                <p class="card-text">Siti adalah florist utama kami yang memiliki keahlian dalam merangkai buket bunga yang indah dan kreatif.</p>
            </div>
        </div>
    </div>
</div>
@endsection