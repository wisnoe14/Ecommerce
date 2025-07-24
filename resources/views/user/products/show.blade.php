@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <h3 class="mb-3">{{ $product->name }}</h3>
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            @endif
        </div>
        <div class="col-md-6">
            <h4>Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
            <p>{{ $product->description }}</p>
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
        </div>
    </div>
</div>
@endsection
