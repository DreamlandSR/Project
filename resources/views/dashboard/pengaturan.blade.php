@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-lg">
                                    <div class="card-body text-center py-5">

                                        <!-- Avatar -->
                                        <img src="{{ url('img/Frieren.jpeg') }}" alt="Avatar"
                                             class="rounded-circle mb-4"
                                             style="width: 80px; height: 80px; object-fit: cover; background-color: #e6f0fa; padding: 10px;">

                                        <!-- Title -->
                                        <h5 class="text-muted mb-4">Pengaturan Akun</h5>

                                        <!-- List Group -->
                                        <ul class="list-group list-group-flush text-left mb-4">
                                            <li class="list-group-item border-bottom py-3">Detail Informasi Akun</li>
                                            <li class="list-group-item border-bottom py-3">Panduan</li>
                                            <li class="list-group-item border-bottom py-3">Lupa Password</li>
                                        </ul>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-primary btn-sm mr-2 px-4">Keluar</button>
                                            <button class="btn btn-outline-secondary btn-sm px-4">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                            from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                            <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
