<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | Toko Parfum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .product-image {
            max-height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">TokoParfum</a>
    </div>
</nav>

<div class="container">
    @php
        $produk = [
            'essence-of-sun' => [
                'judul' => 'Essence of Sun',
                'gambar' => 'images/eos.jpg',
                'deskripsi' => 'Solar accord pada parfum memberikan kesan radiant & hangat. Dibuka dengan bergamot, coriander, dan pink pepper. Diikuti floral tropical blend: Indian Jasmine, Turkish Rose, Tiare Flower.',
            ],
            'darker-shade-of-orgasm' => [
                'judul' => 'Darker Shade of Orgasm',
                'gambar' => 'images/dsoo.jpg',
                'deskripsi' => 'Lebih smoky dan intens dibanding versi original. Aroma Orange Blossom, Apple, dan Pepper di top note-nya membuat parfum ini sangat sensual.',
            ],
            'unrosed' => [
                'judul' => 'Unrosed',
                'gambar' => 'images/unrosed.jpg',
                'deskripsi' => 'Menggunakan teknik soliflore, membangun aroma bunga mawar dari tanaman lain seperti Palmarosa. Wangi mawar yang unik dan tidak biasa.',
            ],
        ];
        $data = $produk[$slug] ?? null;
    @endphp

    @if($data)
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($data['gambar']) }}" alt="{{ $data['judul'] }}" class="img-fluid rounded product-image">
        </div>
        <div class="col-md-6">
            <h2>{{ $data['judul'] }}</h2>
            <p>{{ $data['deskripsi'] }}</p>
            <button class="btn btn-primary">Beli Sekarang</button>
            <a href="/" class="btn btn-outline-secondary ms-2">Kembali</a>
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

</body>
</html>
