@extends('templates.layout')

@section('content')

    @include('templates.header')
    @include('templates.navbar')

    <main class="flex-shrink-0" >

        <!-- Header-->
        <header class="bg-dark py-5 fade-in">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2 text-start">E - learning SMKN 7 Jember</h1>
                            <p class="lead fw-normal text-white-50 mb-4 pr-5" style="text-align: justify; font-size: 20px;">
                            platform e-learning terbaru untuk mendukung pengalaman belajar yang lebih modern, interaktif, dan fleksibel. Melalui aplikasi ini, siswa, guru, dan admin dapat berkolaborasi dalam satu sistem yang terintegrasi.
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="login">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="guide">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- carousel -->
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-interval="6000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('/img/Frieren.jpeg') }}" class="d-block w-100 h-auto rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/img/biru.jpeg') }}" class="d-block w-100 h-auto rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/img/login.jpeg') }}" class="d-block w-100 h-auto rounded-4" alt="... ">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
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
                        <h2 class="fw-bolder mb-0">Fitur yang ada pada E - learning</h2>
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
                                <p class="mb-0">Pengerjaan quiz (ujian) untuk mengukur kemampuan dari masing - masing siswa.</p>
                            </div>
                            <div class="col-12 col-md-6 mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-toggles2"></i>
                                </div>
                                <h2 class="h5 fw-bold">Materi Pembelajaran Interaktif</h2>
                                <p class="mb-0">Dengan adanya E - learning ini memudahkan pemberian materi untuk siswa.</p>
                            </div>
                            <div class="col-12 col-md-6 h-100">
                                <div class="feature bg-primary text-white rounded-3 mb-4">
                                    <i class="bi bi-toggles2"></i>
                                </div>
                                <h2 class="h5 fw-bold">Jadwal dan Kalender Pembelajaran</h2>
                                <p class="mb-0">Adanya jadwal memudahkan siswa untuk mengetahui pembelajaran setiap harinya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="py-5 bg-light slide-in">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"Pendidikan adalah senjata paling ampuh yang dapat kamu gunakan untuk mengubah <br> dunia."</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" style="width: 40px; height:40px; object-fit:cover;" src="{{ asset('/img/nelson.jpg') }}" alt="Nelson Mandela" />
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
        <section class="py-5">
            <div class="container px-5 my-5 slide-in">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Panduan</h2>
                            <p class="lead fw-normal text-muted mb-5">Melalui panduan berikut baik Admin, Siswa, dan guru mampu memahami petunjuk tentang penggunaan Aplikasi pembelajaran ini</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 slide-in">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" style="height: 185px; object-fit: cover;" src="{{ asset('/img/background.jpeg') }}" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-3">News</div>
                                <h5 class="card-title mb-2 fw-bold">Admin</h5></a>
                                <p class="card-text mb-0">Panduan penggunaan untuk admin mulai dari cara menambahkan akun, kelas, menambahkan mata pelajaran, melihat jumlah data akun. <br><a href="{{ asset('/home/guide') }}">lihat selengkapnya</a></p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">Kelly Rowan</div>
                                            <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" style="height: 185px; object-fit: cover;" src="{{ asset('/img/Frieren.jpeg') }}" alt="..." />
                            <div class="card-body p-4" style="min-height: 150px;">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-3">Media</div>
                                <h5 class="card-title mb-2 fw-bold">Guru</h5>
                                <p class="card-text mb-0">Panduan penggunaan untuk guru mulai dari memberikan tugas, materi, ujian serta tugas guru juga bisa memberikan komentar. <br> <a href="{{ asset('/home/guide') }}">lihat selengkapnya</a></p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">Josiah Barclay</div>
                                            <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" style="height: 185px; object-fit: cover;" src="{{ asset('/img/Foto2.jpeg') }}" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-3">News</div>
                                <h5 class="card-title mb-2 fw-bold">Siswa</h5>
                                <p class="card-text mb-0">Panduan penggunaan siswa untuk mengetahui bagaimana cara mengumpulkan tugas, melakukan ujian melaporkan keluhan. <br> <a href="{{ asset('/home/guide') }}">lihat selengkapnya</a></p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">Evelyn Martinez</div>
                                            <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to action-->
                <!-- <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5 slide-in">
                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                            </div>
                            <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                        </div>
                    </div>
                </aside> -->
            </div>
        </section>
    </main>

    @include('templates.main_footer')
    
    @include('templates.footer')
