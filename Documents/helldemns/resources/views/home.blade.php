@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Fullscreen Carousel -->
    <div id="homepageCarousel" class="carousel slide animate-fade-in" data-bs-ride="carousel" data-bs-interval="2000"
        style="margin-top: 120px; height: calc(100vh - 120px); overflow: hidden;">
        
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100 h-100" style="object-fit: contain;" alt="Slide 1">
            </div>
            <div class="carousel-item h-100">
                <img src="{{ asset('images/slide2.png') }}" class="d-block w-100 h-100" style="object-fit: contain;" alt="Slide 2">
            </div>
            <div class="carousel-item h-100">
                <img src="{{ asset('images/slide3.png') }}" class="d-block w-100 h-100" style="object-fit: contain;" alt="Slide 3">
            </div>
        </div>

        <!-- View Products Button Overlay -->
        <div class="carousel-caption d-flex justify-content-center align-items-end h-100 pb-5">
            <a href="{{ url('/produk') }}" class="btn btn-outline-dark px-5 py-2" style="
                border-radius: 30px;
                font-size: 1.25rem;
                font-weight: 500;
                background-color: rgba(255,255,255,0.8);">
                View Products
            </a>
        </div>
    </div>

    <!-- Elegant Text Section -->
    <div class="pt-5">
        <p class="mb-1" style="font-size: 1rem; letter-spacing: 0.5px; color: #333;">
            Join Our Newsletter To Stay Updated
        </p>
        <p class="mb-1" style="font-size: 0.9rem; color: #666;">
            New arrivals • Timeless pieces • Limited collections • Exclusive offers
        </p>
        <p style="font-size: 0.85rem; color: #aaa;">
            Follow us on: Instagram • Facebook • TikTok • X • YouTube • Spotify
        </p>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@push('styles')
<style>
    .carousel-caption a.btn:hover {
        background-color: #000 !important;
        color: #fff !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
</style>
@endpush
