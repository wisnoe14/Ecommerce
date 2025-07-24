<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | Toko Parfum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* TAMBAHAN: Menggunakan CSS Variables untuk konsistensi branding */
        :root {
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --color-dark: #212529;
            --color-light: #f8f9fa;
            --color-accent: #D4AF37; /* Warna emas */
        }

        body {
            font-family: var(--font-body);
            background-color: #f4f5f7; /* Sedikit lebih abu-abu */
        }

        .navbar-brand {
            font-family: var(--font-heading);
            font-size: 1.5rem;
        }

        /* TAMBAHAN: Card untuk membungkus detail produk */
        .product-detail-card {
            background-color: white;
            border: none;
            border-radius: 10px;
        }

        .product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
        }

        .product-title {
            font-family: var(--font-heading);
            font-weight: 700;
        }
        
        /* TAMBAHAN: Styling untuk harga */
        .product-price {
            font-family: var(--font-heading);
            color: var(--color-accent);
            font-size: 2.25rem;
            margin-bottom: 1rem;
        }
        
        /* TAMBAHAN: Styling untuk notes parfum */
        .scent-notes {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .scent-notes .badge {
            font-size: 0.8rem;
            padding: 0.5em 0.8em;
        }

        /* TAMBAHAN: Styling untuk tombol aksi */
        .btn-buy {
            background-color: var(--color-dark);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }
        .btn-buy:hover {
            background-color: #000;
            color: white;
        }
        
        /* Responsif untuk gambar di mobile */
        @media (max-width: 767px) {
            .product-image {
                border-radius: 10px 10px 0 0;
                height: 350px;
            }
        }
    </style>
</head>
<body>


{{-- Navbar Dinamis --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TokoParfum</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link">{{ ucwords(Auth::user()->name) }}</a>
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

{{-- Konten Detail Produk --}}
<div class="container py-5">
    <div class="card product-detail-card shadow-sm">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
            </div>
            <div class="col-md-7">
                <div class="card-body p-4 p-md-5">
                    <h1>{{ $product->name }}</h1>
                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <p class="mt-3">{{ $product->description }}</p>

                    <div class="d-flex mt-4">
                        <button class="btn btn-dark btn-lg flex-grow-1">
                            <i class="fas fa-shopping-cart me-2"></i> Beli Sekarang
                        </button>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary ms-3" title="Kembali">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 mt-5">
    <small class="text-muted">&copy; {{ date('Y') }} TokoParfum. All Rights Reserved.</small>
</footer>

</body>
</html>