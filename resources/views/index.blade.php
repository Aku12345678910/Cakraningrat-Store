<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakraningrat Store</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
</head>
<body>
    @include('navbar')

    <div class="container-fluid banner">
        <img src="{{ asset('image/banner.png') }}" alt="banner" class="background-image">
        <div class="container text-center text-white content">
            <h1>Cakraningrat Store</h1>
            <h3>By PC IPNU IPPNU PAMEKASAN</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="{{ url('produk') }}">
                    <div class="input-group input-group-lg my-5">
                        <input type="text" class="form-control" name="keyword" aria-describedby="basic-addon2">
                        <button type="submit" class="btn warna2 text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori terlaris</h3>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="highlighted-kategori kategori-sop d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="{{ url('produk?kategori=sop') }}">SOP</a></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="highlighted-kategori kategori-rabbani d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="{{ url('produk?k ategori=rabbani') }}">RABBANI</a></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="highlighted-kategori kategori-drink d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="{{ url('produk?kategori=drink') }}">DRINK</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
                Cakraningrat Store merupakan badan usaha milik PC IPNU IPPNU Pamekasan
                yang dikelola langsung oleh lembaga ekonomi dan kewirausahaan (LEK) dibawah pengawasan PC IPNU IPPNU Pamekasan
            </p>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
            <div class="row mt-5">
                @foreach($queryProduk as $data)
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="{{ asset('image/' . $data->foto) }}" class="card-img-top" alt="Gambar produk {{ $data->nama }}">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $data->nama }}</h4>
                            <p class="card-text text-truncate">{{ $data->detail }}</p>
                            <p class="card-text text-harga">Rp {{ number_format($data->harga, 2, ',', '.') }}</p>
                            <a href="{{ url('produk-detail?nama=' . $data->nama) }}" class="btn warna2 text-white">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="btn btn-outline-warning mt-4" href="{{ url('produk') }}">See More</a>
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

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>