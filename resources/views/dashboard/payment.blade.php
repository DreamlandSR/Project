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
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3 align-items-center">
                                            {{-- Dropdown kiri --}}
                                            <div class="col-md-6">
                                                <form method="GET" action="{{ route('payment.page') }}"
                                                    class="d-flex align-items-center gap-2">
                                                    <label for="status"
                                                        class="mr-3 mb-0 small fw-semibold text-muted">Filter
                                                        Status </label>
                                                    <div class="custom-select-wrapper">
                                                        <select name="status" id="status" class="custom-select"
                                                            onchange="this.form.submit()">
                                                            <option value="">Semua</option>
                                                            <option value="pending"
                                                                {{ request('status') == 'pending' ? 'selected' : '' }}>
                                                                Ditunda</option>
                                                            <option value="completed"
                                                                {{ request('status') == 'completed' ? 'selected' : '' }}>
                                                                Berhasil</option>
                                                            <option value="failed"
                                                                {{ request('status') == 'failed' ? 'selected' : '' }}>Gagal
                                                            </option>
                                                            <option value="refunded"
                                                                {{ request('status') == 'refunded' ? 'selected' : '' }}>
                                                                Pengembalian</option>
                                                        </select>

                                                    </div>
                                                </form>
                                            </div>

                                            {{-- Search kanan --}}
                                            <div class="col-md-6">
                                                <form method="GET" action="{{ route('payment.page') }}"
                                                    class="d-flex justify-content-end">
                                                    <div class="input-group input-group-sm" style="max-width: 300px;">
                                                        <input type="text" name="search" class="form-control"
                                                            placeholder="Cari nama..." value="{{ request('search') }}">
                                                        <button type="submit" class="btn-primary btn-sm mx-3">
                                                            <i class="ti-search"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>




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
                                                        <td>{{ $payments->firstItem() + $index }}</td>
                                                        <td>{{ $payment->order->user->nama ?? 'Tidak Diketahui' }}</td>
                                                        <td>{{ $payment->metode_pembayaran }}</td>
                                                        <td>
                                                            @php
                                                                $badgeClass = match ($payment->status_pembayaran) {
                                                                    'pending' => 'badge-warning',
                                                                    'completed' => 'badge-success',
                                                                    'failed' => 'badge-danger',
                                                                    'refunded' => 'badge-secondary',
                                                                    default => 'badge-light',
                                                                };
                                                            @endphp
                                                            <label class="badge {{ $badgeClass }}">
                                                                {{ ucfirst($payment->status_pembayaran) }}
                                                            </label>
                                                        </td>

                                                        <td>{{ \Carbon\Carbon::parse($payment->waktu_pembayaran)->format('d M Y, H:i') }}
                                                        </td>
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
