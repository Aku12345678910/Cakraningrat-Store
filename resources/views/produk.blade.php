@extends('layouts.app')

@section('title', 'Cakraningrat Store | Produk')

@section('content')
<div class="container-fluid banner-produk">
    <img src="{{ asset('image/produk.png') }}" alt="bannerproduk" class="background-image">
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-5">
            <h3>Kategori</h3>
            <ul class="list-group">
                @foreach($queryKategori as $kategori)
                <a class="no-decoration" href="{{ url('produk?kategori=' . $kategori->nama) }}">
                    <li class="list-group-item active">{{ $kategori->nama }}</li>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-9">
            <h3 class="text-center mb-3">Produk</h3>
            <div class="row">
                @if($countData < 1)
                    <h4 class="text-center">Produk yang dicari tidak tersedia</h4> 
                @endif

                @foreach($queryProduk as $produk)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="{{ asset('image/' . $produk->foto) }}" class="card-img-top" alt="Gambar produk">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $produk->nama }}</h4>
                            <p class="card-text text-truncate">{{ $produk->detail }}</p>
                            <p class="card-text text-harga">Rp {{ number_format($produk->harga, 2, ',', '.') }}</p>
                            <a href="{{ url('produk-detail?nama=' . $produk->nama) }}" class="btn warna2 text-white">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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