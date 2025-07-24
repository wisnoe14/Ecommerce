{{-- Menggunakan struktur dari Kode 2 dengan data dinamis dari Kode 1 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Parfum | Wewangian Premium')</title>
    
    {{-- Aset CSS dan Font --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --color-dark: #212529;
            --color-light: #f8f9fa;
            --color-accent: #D4AF37; /* Warna emas sebagai aksen */
        }
        body {
            font-family: var(--font-body);
            background-color: #fdfdfd;
        }
        .navbar-brand {
            font-family: var(--font-heading);
            font-size: 1.5rem;
        }
        .navbar {
            background-color: var(--color-dark) !important;
        }
        .hero {
            position: relative;
            background: url('https://images.unsplash.com/photo-1588514912908-8f5891714f8d?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
        }
        .hero .container {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-family: var(--font-heading);
            font-size: 3.5rem;
            font-weight: 700;
        }
        #products .section-title {
            font-family: var(--font-heading);
            font-weight: 700;
        }
        .product-card {
            border: 1px solid #eee;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
            overflow: hidden;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-top: 4px solid var(--color-accent);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .card-title {
            font-family: var(--font-heading);
            font-weight: 700;
        }
        .card-price {
            font-weight: 600;
            color: var(--color-dark);
            font-size: 1.1rem;
        }
        .btn-dark {
            background-color: var(--color-dark);
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-dark:hover {
            background-color: #000;
        }
        .footer {
            background-color: var(--color-dark);
            color: var(--color-light);
            padding: 40px 0;
        }
        .footer .social-icons a {
            color: var(--color-light);
            font-size: 1.2rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .footer .social-icons a:hover {
            color: var(--color-accent);
        }
        /* Style untuk pagination agar sesuai tema */
        .pagination .page-link {
            color: var(--color-dark);
        }
        .pagination .page-item.active .page-link {
            background-color: var(--color-dark);
            border-color: var(--color-dark);
            color: white;
        }
    </style>
</head>
<body>

{{-- Navbar Dinamis --}}
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TokoParfum</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('account.edit') }}" class="nav-link">
                            {{ ucwords(Auth::user()->name) }}
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Hero Section Statis --}}
<section class="hero text-center">
    <div class="container">
        <h1>Temukan Aroma yang Mewakili Dirimu</h1>
        <p class="lead">Parfum premium untuk pria & wanita dengan aroma tahan lama.</p>
        <a href="#products" class="btn btn-light btn-lg mt-3">Jelajahi Koleksi</a>
    </div>
</section>

{{-- Bagian Produk Dinamis --}}
<section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 section-title">Koleksi Produk Kami</h2>
        
        <form action="{{ route('home') }}" method="GET" class="mb-5">
            <div class="input-group">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari parfum berdasarkan nama...">
                <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> Cari</button>
            </div>
        </form>

        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="card product-card h-100">
                        {{-- Gambar Produk --}}
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="Produk Default">
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            {{-- Nama Produk --}}
                            <h5 class="card-title">{{ $product->name }}</h5>
                            
                            {{-- Deskripsi Singkat --}}
                            <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
                            
                            {{-- Harga Produk --}}
                            <p class="card-price mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            
                            {{-- Tombol Detail --}}
                            <a href="{{ route('produk.detail', ['id' => $product->id]) }}" class="btn btn-dark mt-auto">
                                <i class="fas fa-search me-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Pesan Jika Produk Tidak Ditemukan --}}
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <p class="mb-0">Produk yang Anda cari tidak ditemukan atau belum ada produk tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</section>

{{-- Footer Statis --}}
<footer class="footer text-center">
    <div class="container">
        <div class="social-icons mb-3">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p class="mb-0">&copy; {{ date('Y') }} TokoParfum. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- ... konten landing page ... -->

</body>
</html>

</body>
</html>