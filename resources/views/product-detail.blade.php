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

<nav class="navbar navbar-dark bg-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="/">TokoParfum</a>
    </div>
</nav>

<div class="container">
    @php
        // TAMBAHAN: Menambahkan info harga dan notes aroma
        $produk = [
            'essence-of-sun' => [
                'judul' => 'Essence of Sun',
                'gambar' => 'images/eos.jpg',
                'harga' => 385000,
                'deskripsi' => 'Solar accord pada parfum memberikan kesan radiant & hangat, seolah menangkap esensi matahari terbenam di pesisir tropis.',
                'notes' => ['Top' => 'Bergamot, Coriander, Pink Pepper', 'Middle' => 'Jasmine, Rose, Tiare Flower', 'Base' => 'Vanilla, Amber, Musk'],
            ],
            'darker-shade-of-orgasm' => [
                'judul' => 'Darker Shade of Orgasm',
                'gambar' => 'images/dsoo.jpg',
                'harga' => 415000,
                'deskripsi' => 'Lebih smoky dan intens dibanding versi original. Aroma Orange Blossom, Apple, dan Pepper di top note-nya membuat parfum ini sangat sensual dan misterius.',
                'notes' => ['Top' => 'Orange Blossom, Apple, Pepper', 'Middle' => 'Jasmine, Cedarwood', 'Base' => 'Patchouli, Coffee, Vanilla'],
            ],
            'unrosed' => [
                'judul' => 'Unrosed',
                'gambar' => 'images/unrosed.jpg',
                'harga' => 395000,
                'deskripsi' => 'Menggunakan teknik soliflore, membangun aroma bunga mawar dari tanaman lain seperti Palmarosa. Memberikan wangi mawar yang unik, hijau, dan tidak biasa.',
                'notes' => ['Top' => 'Palmarosa, Lemon', 'Middle' => 'Geranium, Rose Accord', 'Base' => 'Vetiver, White Musk'],
            ],
        ];
        $data = $produk[$slug] ?? null;
    @endphp

    @if($data)
    <div class="card product-detail-card shadow-sm">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset($data['gambar']) }}" alt="{{ $data['judul'] }}" class="product-image">
            </div>
            <div class="col-md-7">
                <div class="card-body p-4 p-md-5">
                    <h1 class="product-title">{{ $data['judul'] }}</h1>
                    
                    <div class="product-price">Rp {{ number_format($data['harga'], 0, ',', '.') }}</div>
                    
                    <p class="text-muted">{{ $data['deskripsi'] }}</p>

                    <div class="scent-notes">
                        <h5 class="mb-3" style="font-weight: 600;">Komposisi Aroma:</h5>
                        <div>
                            <span class="badge bg-light text-dark me-2">Top</span> {{ $data['notes']['Top'] }}
                        </div>
                        <div class="my-2">
                            <span class="badge bg-light text-dark me-2">Middle</span> {{ $data['notes']['Middle'] }}
                        </div>
                        <div>
                            <span class="badge bg-light text-dark me-2">Base</span> {{ $data['notes']['Base'] }}
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex align-items-center">
                        <button class="btn btn-buy btn-lg flex-grow-1">
                            <i class="fas fa-shopping-cart me-2"></i> Beli Sekarang
                        </button>
                        <a href="/" class="btn btn-outline-secondary ms-3" title="Kembali">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-danger text-center">
            Produk tidak ditemukan.
        </div>
        <div class="text-center">
            <a href="/" class="btn btn-dark">Kembali ke Beranda</a>
        </div>
    @endif
</div>

<footer class="text-center py-4 mt-5">
    <small class="text-muted">&copy; {{ date('Y') }} TokoParfum. All Rights Reserved.</small>
</footer>

</body>
</html>