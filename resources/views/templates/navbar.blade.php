<nav class="navbar navbar-expand-lg sticky-top bg-transparent text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img
                src="{{ asset('/img/logo.png') }}"
                height="35"
                alt="Logo SMKN7 Jember"
                loading="lazy"
            />
            <small class="fs-6 ml-2">SMKN 7 Jember</small>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                <li class="nav-item me-4">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="{{ route('product') }}">Product</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="{{ route('login') }}">
                    <button
                        data-mdb-ripple-init
                        type="button"
                        class="btn btn-primary btn-md me-1"
                    >
                        Masuk
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');

    function handleScroll() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();
});
</script>
