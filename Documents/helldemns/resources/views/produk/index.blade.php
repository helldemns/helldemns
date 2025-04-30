@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">‎</h2>
    
    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success shadow-sm rounded-3">{{ session('success') }}</div>
    @endif

    <!-- Product Grid -->
    @if ($produks->count())
        <div class="row g-4">
            @foreach ($produks as $produk)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 product-card mode-card position-relative h-100 d-flex flex-column mt-5">
                        <a href="{{ route('produk.show', $produk->id) }}" class="position-relative">
                            {{-- thumbnail --}} 
                            @if ($produk->thumbnail)
                                <img src="{{ asset('storage/' . $produk->thumbnail->path) }}"
                                    class="card-img-top img-fluid"
                                    alt="{{ $produk->nama_barang }}" 
                                    style="height: 300px; object-fit: contain; background-color: #f8f9fa;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 300px;">No Image</div>
                            @endif
                        </a>

                        <div class="card-body d-flex flex-column flex-grow-1 justify-content-between">
                            <div>
                                <h5 class="card-title fw-semibold mode-text" style="font-size: 1.1rem;">{{ $produk->nama_barang }}</h5>
                                <p class="card-text text-muted mode-text-muted" style="font-size: 0.9rem;">Rp {{ number_format($produk->harga) }}</p>
                            </div>
                        </div>

                        <div class="position-absolute bottom-0 end-0 p-2 d-flex justify-content-end gap-2">
                            <a href="{{ route('produk.edit', $produk->id) }}" 
                               class="btn btn-sm rounded-circle edit-button"
                               title="Edit">
                                <i class="bi bi-pencil" style="font-size: 20px;"></i>
                            </a>

                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="delete-form d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="btn btn-sm rounded-circle delete-button"
                                    data-id="{{ $produk->id }}"
                                    title="Delete">
                                    <i class="bi bi-trash" style="font-size: 20px;"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Showing X to Y of Z results -->
        <div class="text-center text-muted mt-4">
            Showing {{ $produks->firstItem() }} to {{ $produks->lastItem() }} of {{ $produks->total() }} results
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $produks->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="text-muted mode-text-muted text-center">No products available.</p>
    @endif

</div>

<!-- Script Delete SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure you want to delete this product?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#000',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        popup: 'rounded-3',
                        confirmButton: 'px-4 py-2 rounded-pill',
                        cancelButton: 'px-4 py-2 rounded-pill'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>
    <div class="container py-5" style="padding-top: 10px; text-align: center;">
        <p style="font-size: 1.1rem; letter-spacing: 1px; font-weight: 500; color: #111; text-transform: uppercase;">
            Join us — Sign up for exclusive letters from <strong>Monarch</strong>
        </p>
        
        <p style="font-size: 0.95rem; color: #555; margin-top: 1rem;">
            Be the first to discover <em>iconic arrivals</em>, <em>timeless elegance</em>, <br>
            limited-edition masterpieces, and private offers curated for connoisseurs of luxury.
        </p>
    
        <p style="font-size: 0.9rem; color: #777; margin-top: 1.5rem; letter-spacing: 1px;">
            INSTAGRAM • FACEBOOK • TIKTOK • X • YOUTUBE • SPOTIFY
        </p>
    </div>    

<!-- CSS Animasi Icon -->
<style>
.edit-button i, .delete-button i {
    transition: color 0.2s ease, transform 0.2s ease;
    color: inherit !important;
}

.edit-button:hover i {
    color: #FFC107 !important;
}
.delete-button:hover i {
    color: #DC3545 !important;
}

.edit-button:active {
    background-color: rgba(255, 193, 7, 0.4);
}
.delete-button:active {
    background-color: rgba(220, 53, 69, 0.4);
}

.edit-button:hover i, .delete-button:hover i {
    transform: scale(1.2);

}
</style>
@endsection
