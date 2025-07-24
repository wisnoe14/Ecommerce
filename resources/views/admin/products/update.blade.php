@extends('layouts .app')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Produk</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (biarkan kosong jika tidak diganti)</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <small class="text-muted d-block mt-2">Gambar saat ini:</small>
                <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-1">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
