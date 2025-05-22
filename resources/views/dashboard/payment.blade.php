@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap justify-content-between align-items-center p-3">
                                <div class="mb-2 mb-md-0">
                                    <h3 class="fw-bold mb-0" style="color: #000;">Detail Pesanan</h3>
                                </div>


                                <div class="d-flex flex-wrap gap-3">
                                    <div class="d-flex align-items-center bg-white rounded-pill px-3 py-1 shadow-sm">
                                        <span class="text-muted me-2 d-none d-sm-block">Tampilkan</span>
                                        <select class="form-select border-0 bg-transparent pe-3">
                                            <option selected>10</option>
                                            <option>25</option>
                                            <option>50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Metode pembayaran</th>
                                                    <th>Status Pembayaran</th>
                                                    <th>Waktu pembayaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $index => $payment)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $payment->order->user->nama ?? 'Tidak Diketahui' }}</td>
                                                        <td>{{ $payment->metode_pembayaran }}</td>
                                                        <td>{{ $payment->status_pembayaran }}</td>
                                                        <td>{{ $payment->waktu_pembayaran }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>


                                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">

                                        {{-- Tombol Kembali --}}
                                        @if ($payments->onFirstPage())
                                            <span
                                                class="btn btn-link text-muted d-flex align-items-center text-decoration-none me-2 disabled">
                                                <i class="ti-angle-left me-1"></i> Kembali
                                            </span>
                                        @else
                                            <a href="{{ $payments->previousPageUrl() }}"
                                                class="btn btn-link text-dark d-flex align-items-center text-decoration-none me-2">
                                                <i class="ti-angle-left me-1"></i> Kembali
                                            </a>
                                        @endif

                                        {{-- Tombol Selanjutnya --}}
                                        @if ($payments->hasMorePages())
                                            <a href="{{ $payments->nextPageUrl() }}"
                                                class="btn btn-link text-dark d-flex align-items-center text-decoration-none ms-2">
                                                Selanjutnya <i class="ti-angle-right ms-1"></i>
                                            </a>
                                        @else
                                            <span
                                                class="btn btn-link text-muted d-flex align-items-center text-decoration-none ms-2 disabled">
                                                Selanjutnya <i class="ti-angle-right ms-1"></i>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
