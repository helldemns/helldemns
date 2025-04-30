@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">‎</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow rounded-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_barang" class="form-label fw-bold">Product Name</label>
            <input type="text" id="nama_barang" name="nama_barang" class="form-control rounded-3 @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang', $produk->nama_barang) }}" required>
            @error('nama_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label fw-bold">Price</label>
            <input type="number" id="harga" name="harga" class="form-control rounded-3 @error('harga') is-invalid @enderror" value="{{ old('harga', $produk->harga) }}" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label fw-bold">Stock</label>
            <input type="number" id="stok" name="stok" class="form-control rounded-3 @error('stok') is-invalid @enderror" value="{{ old('stok', $produk->stok) }}" required>
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Gambar Lama --}}
        @if ($produk->gambars->count())
            <div class="mb-3">
                <label class="form-label fw-bold">Current Images</label><br>
                @foreach ($produk->gambars as $gambar)
                    <img src="{{ asset('storage/' . $gambar->path) }}" alt="Image" class="img-thumbnail me-2 mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                @endforeach
            </div>
        @endif

        {{-- Tambah Gambar Baru --}}
        <div class="mb-3">
            <label for="gambars" class="form-label fw-bold">Add New Images (Optional)</label>
            <input type="file" name="gambars[]" multiple class="form-control">
            @error('gambars')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Leave blank if you don't want to change or add images.</small>
        </div>

        {{-- Pilih Thumbnail --}}
        @if ($produk->gambars->count())
            <div class="mb-3">
                <label class="form-label fw-bold">Choose Thumbnail</label><br>
                @foreach ($produk->gambars as $gambar)
                    <div class="d-inline-block text-center me-3">
                        <img src="{{ asset('storage/' . $gambar->path) }}" style="width: 100px;" class="img-thumbnail mb-2">
                        <div>
                            <input type="radio" name="thumbnail_id" value="{{ $gambar->id }}"
                                {{ $produk->thumbnail_id == $gambar->id ? 'checked' : '' }}>
                            <small>Thumbnail</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-bold">Description</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control rounded-3 @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Enter product description">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Submit --}}
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-warning rounded-pill px-5 mt-3 fw-bold">Update</button>
        </div>
    </form>
</div>

{{-- CSS Dark Mode --}}
<style>
/* Dark Mode */
.dark-mode {
    background-color: #121212 !important;
    color: #f5f5f5 !important;
}
.dark-mode .card {
    background-color: #1e1e1e !important;
    border: 1px solid #333 !important;
}
.dark-mode .card-header {
    background-color: #2c2c2c !important;
    color: #f5f5f5 !important;
    border-bottom: 1px solid #444 !important;
}
.dark-mode .card-body {
    color: #f5f5f5 !important;
}
.dark-mode .alert {
    background-color: #1b5e20 !important;
    color: #a5d6a7 !important;
}
.dark-mode .btn-outline-dark {
    color: #f5f5f5 !important;
    border: 1px solid #f5f5f5 !important;
}
.dark-mode .btn-outline-dark:hover {
    background-color: #333 !important;
    color: #fff !important;
}
.dark-mode .form-label {
    color: #f5f5f5 !important;
}
.dark-mode .form-control {
    background-color: #333 !important;
    color: #f5f5f5 !important;
    border-color: #444 !important;
}
.dark-mode .form-control:focus {
    border-color: #666 !important;
}
.dark-mode .fw-bold, .dark-mode h2, .dark-mode small {
    color: #f5f5f5 !important;
}
.dark-mode .text-muted {
    color: #b0b0b0 !important;
}
.dark-mode .btn-warning {
    background-color: #ffc107 !important;
    color: #fff !important;
}
.dark-mode .btn-warning:hover {
    background-color: #e0a800 !important;
}
.dark-mode .invalid-feedback {
    color: #f44336 !important;
}
.dark-mode .navbar {
    background-color: #1e1e1e !important;
}
.dark-mode .navbar .navbar-brand,
.dark-mode .navbar .navbar-nav .nav-link {
    color: #f5f5f5 !important;
}
.dark-mode .navbar .nav-link:hover {
    color: #ffc107 !important;
}
</style>
@endsection
