<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top animate__animated animate__fadeInDown">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- Logo & Hamburger -->
    <div class="d-flex align-items-center">
      <!-- Hamburger Dropdown Menu -->
      <div class="dropdown me-3">
        <button class="btn p-0 border-0 bg-transparent menu-icon" type="button" id="menuDropdown"
          data-bs-toggle="dropdown" aria-expanded="false">
          <span class="hamburger-lines">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>

        <ul class="dropdown-menu shadow-sm rounded-3 mt-2" aria-labelledby="menuDropdown" style="min-width: 220px;">
          <li><a class="dropdown-item py-2 px-3" href="{{ route('produk.index') }}">Product List</a></li>
          <li><a class="dropdown-item py-2 px-3" href="{{ route('produk.create') }}">+ Add New Product</a></li>
          <li><hr class="dropdown-divider my-1"></li>
          <li><a class="dropdown-item py-2 px-3" href="{{ url('/home') }}">Collections</a></li>
          <li><a class="dropdown-item py-2 px-3" href="#">Contact</a></li>
          <li><hr class="dropdown-divider my-1"></li>
          @guest
            <li><a class="dropdown-item py-2 px-3" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item py-2 px-3" href="{{ route('register') }}">Register</a></li>
          @else
            <li><span class="dropdown-item-text fw-semibold px-3">Admin Shop</span></li>
            <li>
              <a class="dropdown-item text-danger py-2 px-3" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @endguest
        </ul>
      </div>

      <!-- Logo Monarch -->
      <a class="navbar-brand" href="#">Monarch</a>
      
    </div>

    <!-- Search Form -->
    <form action="{{ route('produk.index') }}" method="GET" class="d-flex" style="max-width: 400px;">
      <input type="text" name="search"
             class="form-control search-input border-0 border-bottom rounded-0 shadow-none text-center"
             placeholder="Search products..."
             style="background: transparent; border-bottom: 0.5px solid rgba(0,0,0,0.5); transition: border-color 0.3s ease;">
    </form>
  </div>
</nav>

<!-- Script: Padding dinamis agar konten tidak tertabrak -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const mainContent = document.querySelector(".main-content");
    if (navbar && mainContent) {
      const navbarHeight = navbar.offsetHeight;
      mainContent.style.paddingTop = navbarHeight + "px";
    }
  });
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
  .navbar-custom {
    background-color: transparent !important;
    padding: 0;
    box-shadow: none;
  }

  .navbar-custom .navbar-brand {
    font-family: 'Playfair Display', serif;
    font-size: 5rem;
    font-weight: bold;
  }

  .search-input {
    border: none;
    border-bottom: 0.5px solid #ccc;
    background-color: transparent;
    color: #000;
    font-size: 0.95rem;
    padding: 4px 8px;
    outline: none;
    transition: border-color 0.3s ease;
  }

  .search-input::placeholder {
    color: rgba(0,0,0,0.6);
  }

  .dark-mode .search-input {
    color: #fff;
    border-bottom: 0.5px solid rgba(255,255,255,0.5);
  }

  .dark-mode .search-input::placeholder {
    color: rgba(255,255,255,0.6);
  }

  .hamburger-lines {
    display: inline-block;
    position: relative;
    width: 36px;
    height: 28px;
  }

  .hamburger-lines span {
    display: block;
    position: absolute;
    height: 4px;
    width: 100%;
    background-color: #000;
    border-radius: 2px;
    left: 0;
    transition: 0.3s ease;
  }

  .hamburger-lines span:nth-child(1) { top: 0; }
  .hamburger-lines span:nth-child(2) { top: 12px; }
  .hamburger-lines span:nth-child(3) { top: 24px; }

  .dark-mode .hamburger-lines span {
    background-color: #fff;
  }

</style>
