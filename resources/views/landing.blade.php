<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum | Wewangian Premium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* TAMBAHAN: Penggunaan CSS Variables untuk palet warna */
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

        /* --- Peningkatan Navbar --- */
        .navbar-brand {
            font-family: var(--font-heading);
            font-size: 1.5rem;
        }
        
        .navbar {
            background-color: var(--color-dark) !important;
        }

        /* --- Peningkatan Hero Section --- */
        .hero {
            position: relative; /* Diperlukan untuk overlay */
            background: url('https://images.unsplash.com/photo-1588514912908-8f5891714f8d?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
        }

        /* TAMBAHAN: Lapisan (overlay) gelap agar teks lebih kontras */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
        }

        /* TAMBAHAN: Pastikan konten hero berada di atas overlay */
        .hero .container {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-family: var(--font-heading);
            font-size: 3.5rem;
            font-weight: 700;
        }

        /* --- Peningkatan Bagian Produk --- */
        #products h2 {
            font-family: var(--font-heading);
            font-weight: 700;
        }

        .product-card {
            border: 1px solid #eee;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
            overflow: hidden; /* Agar gambar tidak keluar dari border-radius */
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-top: 4px solid var(--color-accent); /* Aksen saat hover */
        }

        .card-title {
            font-family: var(--font-heading);
            font-weight: 700;
        }
        
        .btn-dark {
            background-color: var(--color-dark);
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-dark:hover {
            background-color: #000;
        }

        /* --- Peningkatan Footer --- */
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

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TokoParfum</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">{{ ucwords(session('name')) }}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <h1>Temukan Aroma yang Mewakili Dirimu</h1>
        <p class="lead">Parfum premium untuk pria & wanita dengan aroma tahan lama.</p>
        <a href="#products" class="btn btn-light btn-lg mt-3">Jelajahi Koleksi</a>
    </div>
</section>

<section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Koleksi Terbaik Kami</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100">
                    <img src="{{ asset('images/eos.jpg') }}" class="card-img-top" alt="Essence of Sun">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Essence of Sun</h5>
                        <p class="card-text text-muted small">Solar accord pada parfum ini memberikan kesan radiant & hangat. Perpaduan top notes bergamot, coriander seeds, dan pink pepper.</p>
                        <a href="{{ route('produk.detail', ['slug' => 'essence-of-sun']) }}" class="btn btn-dark mt-auto">
                           <i class="fas fa-search me-2"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100">
                    <img src="{{ asset('images/dsoo.jpg') }}" class="card-img-top" alt="Darker Shade of Orgasm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Darker Shade of Orgasm</h5>
                        <p class="card-text text-muted small">Versi lebih smoky dari HMNS Orgsm. Dengan perpaduan Orange Blossom, Apple, dan Pepper yang memikat untuk menyegarkan inderamu.</p>
                        <a href="{{ route('produk.detail', ['slug' => 'darker-shade-of-orgasm']) }}" class="btn btn-dark mt-auto">
                           <i class="fas fa-search me-2"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100">
                    <img src="{{ asset('images/unrosed.jpg') }}" class="card-img-top" alt="Unrosed">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Unrosed</h5>
                        <p class="card-text text-muted small">Dibuat dengan teknik Soliflore, merekonstruksi aroma mawar tanpa mawar itu sendiri. Diekstrak dari Palmarosa asli Indonesia.</p>
                        <a href="{{ route('produk.detail', ['slug' => 'unrosed']) }}" class="btn btn-dark mt-auto">
                           <i class="fas fa-search me-2"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
</body>
</html>