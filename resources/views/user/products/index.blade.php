@extends('layouts.app')

@section('title', 'Koleksi Produk')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Koleksi Produk Kami</h2>
    <form action="{{ route('home') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari produk...">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form>
    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="Produk">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                        <p class="fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('produk.detail', ['slug' => Str::slug($product->name)]) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada produk tersedia.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
