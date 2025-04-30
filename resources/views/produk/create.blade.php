@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">‎</h2>
    
    <div class="card shadow rounded-4">
        <div class="card-body p-5">

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama_barang" class="form-label fw-semibold">Product Name</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control rounded-pill" placeholder="Enter product name" value="{{ old('nama_barang') }}" required>
                </div>

                <div class="mb-4">
                    <label for="harga" class="form-label fw-semibold">Price</label>
                    <input type="number" name="harga" id="harga" class="form-control rounded-pill" placeholder="Enter price" value="{{ old('harga') }}" required>
                </div>

                <div class="mb-4">
                    <label for="stok" class="form-label fw-semibold">Stock</label>
                    <input type="number" name="stok" id="stok" class="form-control rounded-pill" placeholder="Enter stock" value="{{ old('stok') }}" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Product Image (Optional)</label>
                    <input type="file" name="gambars[]" multiple class="form-control">
                    <div class="form-text">You can select multiple images.</div>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Description</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control rounded-4" placeholder="Enter product description">{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Tombol Back & Save di bawah -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">← Back</a>
                    <button type="submit" class="btn btn-success rounded-pill px-5 py-2 fw-bold">Save</button>
                </div>

            </form>

        </div>
    </div>

</div>

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
.dark-mode .btn-outline-dark:focus {
    box-shadow: none;
}
.dark-mode .animate-fade-in,
.dark-mode .animate-fade-in-slow,
.dark-mode .animate-fade-in-slower {
    animation: fadeIn 1s ease-out forwards;
}
.dark-mode .animate-fade-in-slow {
    color: #ffffff !important;
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
