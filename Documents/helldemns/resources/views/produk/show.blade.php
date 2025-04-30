@extends('layouts.app')

@section('content')
<div class="container py-5" style="padding-top: 80px;">
    
    {{-- Carousel Gambar --}}
    @if ($produk->gambars->count())
        <div id="productCarousel" class="carousel slide carousel-fade mb-4" 
             data-bs-ride="carousel" 
             data-bs-interval="3000" 
             data-bs-pause="hover">
            <div class="carousel-inner">
                @foreach ($produk->gambars as $index => $gambar)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} d-flex justify-content-center align-items-center" style="height: auto;">
                        <a href="{{ asset('storage/' . $gambar->path) }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="{{ asset('storage/' . $gambar->path) }}" 
                                 class="carousel-main-image"
                                 style="max-height: 350px; object-fit: contain; background-color: #f8f9fa;"
                                 alt="Product Image {{ $index + 1 }}">
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($produk->gambars->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon custom-carousel-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon custom-carousel-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>

        {{-- Thumbnails --}}
        <div class="d-flex flex-wrap gap-2 mb-4 justify-content-center">
            @foreach ($produk->gambars as $index => $gambar)
                <img src="{{ asset('storage/' . $gambar->path) }}" 
                     class="thumbnail-img rounded border"
                     data-bs-target="#productCarousel" 
                     data-bs-slide-to="{{ $index }}"
                     style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                     alt="Thumbnail {{ $index + 1 }}">
            @endforeach
        </div>
    @else
        <div class="alert alert-warning">No images available for this product.</div>
    @endif

    {{-- Nama Produk --}}
    <h2 class="mb-4 fw-bold text-center">{{ $produk->nama_barang }}</h2>

    {{-- Detail Produk --}}
    <div class="card shadow p-4 rounded-4">
        <h4 class="fw-bold mb-3">Product Details</h4>
        <p><strong>Price:</strong> Rp {{ number_format($produk->harga) }}</p>
        <p><strong>Stock:</strong> {{ $produk->stok }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $produk->deskripsi }}</p>
    </div>

    {{-- Back Button --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="{{ route('produk.index') }}" class="btn btn-outline-dark rounded-pill px-4 fw-semibold">
            ← Back to Product 
        </a>
    </div>
</div>

{{-- Modal untuk menampilkan gambar full screen --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" class="d-block w-100" alt="Full Image" style="max-height: 80vh; object-fit: contain;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .custom-carousel-icon {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 50%;
        width: 2.5rem;
        height: 2.5rem;
    }

    .thumbnail-img:hover {
        border: 2px solid black;
    }

    .carousel-fade .carousel-item {
        transition: opacity 0.8s ease-in-out;
    }
</style>

{{-- Script untuk Lightbox --}}
<script>
    document.querySelectorAll('#productCarousel .carousel-item img').forEach(img => {
        img.addEventListener('click', function () {
            const imageUrl = this.src;
            document.getElementById('modalImage').src = imageUrl;
        });
    });
</script>
@endsection
