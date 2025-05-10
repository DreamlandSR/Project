@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper d-flex py-4">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12"> <!-- Lebar diperbesar -->
                                <div class="card shadow-sm rounded-lg">
                                    <div class="card-body text-center py-5">

                                        <!-- Avatar Canvas -->
                                        <div class="d-flex justify-content-center align-items-center rounded-circle mb-4"
                                            style="width: 80px; height: 80px; margin: 0 auto;">
                                            <img src="{{ url('img/Frieren.jpeg') }}" alt="Avatar" class="rounded-circle"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>

                                        <!-- Title -->
                                        <h5 class="text-muted mb-6 justify-content-start">Pengaturan Akun</h5>
                                        <!-- Lebih besar -->

                                        <!-- List Group -->
                                        <ul class="list-group list-group-flush text-left mb-4">
                                            <li class="list-group-item border-bottom py-3" style="font-size: 16px;">Detail
                                                Informasi Akun</li>
                                            <li class="list-group-item border-bottom py-3" style="font-size: 16px;">Panduan
                                            </li>
                                            <li class="list-group-item border-bottom py-3" style="font-size: 16px;">Lupa
                                                Password</li>
                                        </ul>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-start pb-2"> <!-- Align kiri -->
                                            <button class="btn btn-primary btn-sm mr-3 px-4">Keluar</button>
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
