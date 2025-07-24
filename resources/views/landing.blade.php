<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum | Wewangian Premium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1588514912908-8f5891714f8d?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
        }
        .hero h1 {
            font-size: 3rem;
        }
        .product-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">TokoParfum</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="container">
            <h1>Temukan Aroma yang Mewakili Dirimu</h1>
            <p class="lead">Parfum premium untuk pria & wanita dengan aroma tahan lama</p>
            <a href="#products" class="btn btn-light btn-lg mt-3">Lihat Koleksi</a>
        </div>
    </section>

    <!-- Produk Parfum -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Koleksi Terbaik Kami</h2>
            <div class="row g-4">
                <!-- Produk 1 -->
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/eos.jpg') }}" alt="Gambar Contoh">
                        <div class="card-body">
                            <h5 class="card-title">Essence of Sun</h5>
                            <p class="card-text">Solar accord pada parfum memberikan kesan radiant & hangat.

Seri HMNS Gen XX Perfume terbaru ini dibuka dengan top notes all natural bergamot, coriander seeds, pink pepper. Masuk ke middle notes dari perpaduan tropical flower blends Indian Jasmine Sambac (natural), Turkish Rose (natural), Tiare Flower, dan solar accord..</p>
<a href="{{ route('produk.detail', ['slug' => 'essence-of-sun']) }}" class="btn btn-dark">Lihat Detail</a>

                        </div>
                    </div>
                </div>
                <!-- Produk 2 -->
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/dsoo.jpg') }}" alt="Gambar Contoh">
                        <div class="card-body">
                            <h5 class="card-title">Darker Shade of Orgasm</h5>
                            <p class="card-text">Darker Shade of Orgsm is the more smoky version of HMNS Orgsm. With its captivating blend of top notes such as Orange Blossom, Apple, and Pepper, this scent is sure to invigorate your senses</p>
<a href="{{ route('produk.detail', ['slug' => 'essence-of-sun']) }}" class="btn btn-dark">Lihat Detail</a>

                        </div>
                    </div>
                </div>
                <!-- Produk 3 -->
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/unrosed.jpg') }}" alt="Gambar Contoh">
                        <div class="card-body">
                            <h5 class="card-title">Unrosed</h5>
                            <p class="card-text">A creation made with a technique known as Soliflore. An art of constructing the smell of a single flower, but not from the flower itself. Extracted from the indigenous plant of Indonesia called Palmarosa and other blends to complete the beauty of roses. So that you can smell like your favorite scent of rose, differently..</p>
<a href="{{ route('produk.detail', ['slug' => 'essence-of-sun']) }}" class="btn btn-dark">Lihat Detail</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} TokoParfum. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
