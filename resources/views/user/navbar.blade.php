<nav class="navbar navbar-expand-lg navbar-dark warna1">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item me-4">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item me-4">
            <a class="nav-link" href="{{ url('produk') }}">Produk</a>
        </li>
        <li class="nav-item me-4">
            <a class="nav-link" href="{{ url('tentang') }}">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>