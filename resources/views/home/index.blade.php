@extends('templates.layout')

@section('content')

    @include('templates.header')
    @include('templates.navbar')

    <main class="flex-shrink-0">

        <!-- Header-->
        <header class="py-5 fade-in">
            <div class="container px-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-black mb-2 text-start">Griya Batik</h1>
                            <p class="lead fw-normal text-black mb-4 pr-5" style="text-align:left; font-size: 18px;">
                                platform e-learning terbaru untuk mendukung pengalaman belajar yang lebih modern,
                                interaktif, dan fleksibel. Melalui aplikasi ini, siswa, guru, dan admin dapat berkolaborasi
                                dalam satu sistem yang terintegrasi.
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="login">Get Started</a>
                                <a class="btn btn-light btn-lg px-4" href="guide">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- carousel -->
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"
                            data-interval="6000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('/img/Frieren.jpeg') }}" class="d-block w-100 rounded"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/img/biru.jpeg') }}" class="d-block w-100 rounded" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/img/login.jpeg') }}" class="d-block w-100 rounded" alt="... ">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5 slide-in">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">Fitur yang ada pada Website</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row px-3">
                            <div class="col-12 col-md-6 mb-5 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-collection"></i>
                                </div>
                                <h2 class="h5 fw-bold">Pengumpulan tugas</h2>
                                <p class="mb-0">Melakukan pengumpulan tugas yang diberikan oleh masing - masing guru.</p>
                            </div>
                            <div class="col-12 col-md-6 mb-5 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-building"></i>
                                </div>
                                <h2 class="h5 fw-bold">Quiz</h2>
                                <p class="mb-0">Pengerjaan quiz (ujian) untuk mengukur kemampuan dari masing - masing
                                    siswa.</p>
                            </div>
                            <div class="col-12 col-md-6 mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-toggles2"></i>
                                </div>
                                <h2 class="h5 fw-bold">Materi Pembelajaran Interaktif</h2>
                                <p class="mb-0">Dengan adanya E - learning ini memudahkan pemberian materi untuk siswa.
                                </p>
                            </div>
                            <div class="col-12 col-md-6 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-toggles2"></i>
                                </div>
                                <h2 class="h5 fw-bold">Jadwal dan Kalender Pembelajaran</h2>
                                <p class="mb-0">Adanya jadwal memudahkan siswa untuk mengetahui pembelajaran setiap
                                    harinya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Deskripsi --}}
        <div class="py-5 slide-in">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <h2 class="fw-bolder">Produk yang kami buat</h2>
                            <div class="fs-4 mb-4">"Batik Bondowoso merupakan batik khas yang menonjolkan
                                bagian dari Bondowoso itu sendiri misalnya kopi, kopi
                                ijen dan daun singkong."</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-5">
                <div class="row align-items-center">
                    <!-- Teks -->
                    <div class="col-md-6">
                        <div id="productText" class="fade-in">
                            <h2 class="fw-bold" id="productName">{{ $products[0]->nama }}</h2>
                            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> Bondowoso</p>
                            <p id="productDesc">{{ $products[0]->deskripsi }}</p>
                            <a href="#" class="btn btn-primary mb-3">Learn more</a>
                        </div>
                    </div>

                    <!-- Carousel Gambar -->
                    <div class="col-md-6">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products as $index => $product)
                                    @php
                                        $image = $product->images->first();
                                        $base64 = $image ? base64_encode($image->image_product) : null;
                                        $mime = $image
                                            ? (new \finfo(FILEINFO_MIME_TYPE))->buffer($image->image_product)
                                            : null;
                                    @endphp
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
                                        data-name="{{ $product->nama }}" data-description="{{ $product->deskripsi }}">
                                        @if ($image)
                                            <img src="data:{{ $mime }};base64,{{ $base64 }}"
                                                class="img-square d-block w-100" alt="Product Image">
                                        @else
                                            <img src="{{ asset('img/kamira.png') }}" class="img-square d-block w-100"
                                                alt="Default Image">
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Testimonial section-->
        <div class="py-5 my-5 bg-light slide-in">
            <div class="container px-5 my-3">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <h2 class="fw-bolder">Tentang Kami</h2>
                            <div class="fs-4 mb-4 fst-italic">"Kami adalah pembuat batik disabilitas yang berasal dari
                                Bondowoso dengan membuat berbagai macam
                                inovasi yang nantinya akan membuat Bondowoso
                                semakin terkenal"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" style="width: 40px; height:40px; object-fit:cover;"
                                    src="{{ asset('/img/nelson.jpg') }}" alt="Nelson Mandela" />
                                <div class="fw-bold">
                                    Nelson Mandela
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    1st President of South Africa
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog preview section-->
        <section class="py-5 my-5 slide-in">
            <div class="px-5 slide-in">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-xl-6">
                        <h2 class="fw-bolder">Batik Populer</h2>
                        <p class="lead fw-normal text-muted mb-5">Batik populer khas Bondowoso</p>
                    </div>
                    <div class="col text-end">
                        <i class="bi bi-arrow-left-circle-fill fs-2 me-2" id="prevBtn" style="cursor: pointer;"></i>
                        <i class="bi bi-arrow-right-circle-fill fs-2" id="nextBtn" style="cursor: pointer;"></i>
                    </div>
                </div>

                <div id="carouselContainer" class="d-flex overflow-hidden">
                    @foreach ($products as $product)
                        @php
                            $image = $product->images->first();
                            $base64 = $image ? base64_encode($image->image_product) : null;
                            $mime = $image ? (new \finfo(FILEINFO_MIME_TYPE))->buffer($image->image_product) : null;
                        @endphp

                        <div class="product-card me-3 mx-3" style="flex: 0 0 22%;">
                            <div class="card h-100 shadow-sm">
                                @if ($image)
                                    <img class="card-img-top rounded"
                                        src="data:{{ $mime }};base64,{{ $base64 }}"
                                        style="height: 200px; object-fit: cover;" alt="{{ $product->nama }}">
                                @else
                                    <img class="card-img-top rounded" src="{{ asset('/img/default.jpg') }}"
                                        style="height: 200px; object-fit: cover;" alt="Default Image">
                                @endif
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title fw-bold mb-0 fs-6">{{ $product->nama }}</h5>
                                        <span class="badge bg-primary">
                                            <i
                                                class="bi bi-star-fill text-warning me-1"></i>{{ $product->rating ?? '0' }}
                                        </span>
                                    </div>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-geo-alt-fill"></i> {{ $product->lokasi ?? 'Bondowoso' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </main>

    @include('templates.main_footer')

    @include('templates.footer')
