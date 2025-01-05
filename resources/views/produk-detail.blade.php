@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('image/' . $produk->foto) }}" alt="" class="produk-image">
            </div>
            <div class="col-md-6 offset-md-1">
                <h1>{{ $produk->nama }}</h1>
                <p>{{ $produk->detail }}</p>
                <p class="text-harga">Rp {{ number_format($produk->harga, 2, ',', '.') }}</p>
                <p class="fs-5">Status Ketersediaan: <strong>{{ $produk->ketersediaan_stok }}</strong></p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 warna2">
    <div class="container">
        <h2 class="text-center text-white mb-5">Produk Terkait</h2>
        <div class="row">
            @foreach($produkTerkait as $data)
            <div class="col-md-6 col-lg-3 mb-3">
                <a href="{{ route('produk.detail', ['nama' => $data->nama]) }}">
                    <img src="{{ asset('image/' . $data->foto) }}" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-fluid py-5 content-subscribe text-light">
    <div class="container">
        <h5 class="text-center mb-4">Temui Kami</h5>
        <div class="row justify-content-center">
            <div class="col-sm-1 d-flex justify-content-center mb-2">
                <i class="fab fa-facebook fs-4"></i>
            </div>
            <div class="col-sm-1 d-flex justify-content-center mb-2">
                <i class="fab fa-instagram fs-4"></i>
            </div>
            <div class="col-sm-1 d-flex justify-content-center mb-2">
                <i class="fab fa-twitter fs-4"></i>
            </div>
            <div class="col-sm-1 d-flex justify-content-center mb-2">
                <i class="fab fa-whatsapp fs-4"></i>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3 warna4 text-dark">
    <div class="container d-flex justify-content-center">
        <label>&copy;2024 Cakraningrat Store</label>
    </div>
</div>
@endsection