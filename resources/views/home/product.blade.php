@extends('templates.layout')

@section('content')

    @include('templates.header')
    @include('templates.navbar')

    <div class="mx-4 py-5">
        <h2 class="text-center fw-bold mb-2">Galeri Batik</h2>
        <p class="text-center lead fw-normal text-muted mb-4">Produk terbaik kami</p>

        <!-- Masonry Grid -->
        <div class="grid-container">
            <div class="grid-item">
                <img src="https://thebatik.co.id/wp-content/uploads/2023/03/kain-bahan-baju-batik-tulis-motif-ikan-ceplok-latar-putih-1-460x613.jpg" alt="Batik 1">
                <div class="overlay">
                    <h5>Batik Premium</h5>
                    <p>Kain batik dengan motif eksklusif.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://blog.knitto.co.id/wp-content/uploads/2023/01/Kain-Batik.jpg" alt="Batik 2">
                <div class="overlay">
                    <h5>Batik Tulis</h5>
                    <p>Buatan tangan dengan keunikan tersendiri.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://sukahurip-cihaurbeuti.desa.id/DesaMilenial-Uploads/Citizen_products/5/670caecbd9a35_1.jpg" alt="Batik 3">
                <div class="overlay">
                    <h5>Batik Modern</h5>
                    <p>Desain khas dengan sentuhan kontemporer.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://sukahurip-cihaurbeuti.desa.id/DesaMilenial-Uploads/Citizen_products/5/670caecbd9a35_1.jpg" alt="Batik 4">
                <div class="overlay">
                    <h5>Batik Elegan</h5>
                    <p>Cocok untuk berbagai acara formal.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://blog.knitto.co.id/wp-content/uploads/2023/01/Kain-Batik.jpg" alt="Batik 5">
                <div class="overlay">
                    <h5>Batik Etnik</h5>
                    <p>Perpaduan motif klasik dan modern.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://thebatik.co.id/wp-content/uploads/2023/03/kain-bahan-baju-batik-tulis-motif-ikan-ceplok-latar-putih-1-460x613.jpg" alt="Batik 6">
                <div class="overlay">
                    <h5>Batik Handmade</h5>
                    <p>Ditenun dengan teknik tradisional.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://sukahurip-cihaurbeuti.desa.id/DesaMilenial-Uploads/Citizen_products/5/670caecbd9a35_1.jpg" alt="Batik 7">
                <div class="overlay">
                    <h5>Batik Eksklusif</h5>
                    <p>Hanya tersedia dalam jumlah terbatas.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://thebatik.co.id/wp-content/uploads/2023/03/kain-bahan-baju-batik-tulis-motif-ikan-ceplok-latar-putih-1-460x613.jpg" alt="Batik 8">
                <div class="overlay">
                    <h5>Batik Premium</h5>
                    <p>Kualitas tinggi dengan bahan terbaik.</p>
                    <button class="buy-btn" onclick="window.location.href='https://wa.me/6287705721463?'">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://thebatik.co.id/wp-content/uploads/2023/03/kain-bahan-baju-batik-tulis-motif-ikan-ceplok-latar-putih-1-460x613.jpg" alt="Batik 1">
                <div class="overlay">
                    <h5>Batik Premium</h5>
                    <p>Kain batik dengan motif eksklusif.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://blog.knitto.co.id/wp-content/uploads/2023/01/Kain-Batik.jpg" alt="Batik 5">
                <div class="overlay">
                    <h5>Batik Etnik</h5>
                    <p>Perpaduan motif klasik dan modern.</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>
        </div>
    </div>

    @include('templates.main_footer')
    @include('templates.footer')
