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
                                    <h3 class="fw-bold mb-0" style="color: #000;">Status Pengiriman</h3>
                                </div>


                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                    {{-- Informasi jumlah data yang ditampilkan --}}
                                    <div class="text-muted mr-5">
                                        Menampilkan {{ $orders->firstItem() }} - {{ $orders->lastItem() }} dari total
                                        {{ $orders->total() }} data
                                    </div>

                                    {{-- Dropdown pilih jumlah per halaman --}}
                                    <form method="GET" id="perPageForm">
                                        <div class="d-flex align-items-center bg-white rounded-pill px-3 py-1 shadow-sm">
                                            <span class="text-muted me-2 d-none d-sm-block">Tampilkan</span>
                                            <select name="per_page" class="form-select border-0 bg-transparent pe-3"
                                                onchange="document.getElementById('perPageForm').submit()">
                                                <option value="10" {{ $orders->perPage() == 10 ? 'selected' : '' }}>10
                                                </option>
                                                <option value="25" {{ $orders->perPage() == 25 ? 'selected' : '' }}>25
                                                </option>
                                                <option value="50" {{ $orders->perPage() == 50 ? 'selected' : '' }}>50
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm align-middle text-center custom-table">
                                            <thead>
                                                <tr>
                                                    <th class="col-no">No</th>
                                                    <th class="col-nama">Nama</th>
                                                    <th class="col-tanggal">Tanggal Pesan</th>
                                                    <th class="col-alamat">Alamat</th>
                                                    <th class="col-metode">Metode Pengiriman</th>
                                                    <th class="col-catatan">Catatan</th>
                                                    <th class="col-status">Status</th>
                                                    <th class="col-action">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($orders as $index => $order)
                                                    <tr>
                                                        <td>{{ $orders->firstItem() + $index }}</td>
                                                        <td class="col-nama">{{ $order->user->nama ?? 'Tidak Diketahui' }}
                                                        </td>
                                                        <td class="col-tanggal">
                                                            {{ \Carbon\Carbon::parse($order->waktu_order)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="col-alamat">{{ $order->alamat_pemesanan }}</td>
                                                        <td class="col-metode">{{ $order->metode_pengiriman ?? '-' }}</td>
                                                        <td class="col-catatan">{{ $order->notes ?? '-' }}</td>
                                                        <td class="col-status">
                                                            @php
                                                                $badgeClass = match ($order->status) {
                                                                    'pending' => 'badge-warning',
                                                                    'paid' => 'badge-primary',
                                                                    'shipped' => 'badge-info',
                                                                    'completed' => 'badge-success',
                                                                    'cancelled' => 'badge-danger',
                                                                };
                                                            @endphp
                                                            <label
                                                                class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</label>
                                                        </td>
                                                        <td class="col-action">
                                                            <a href="{{ route('order.edit', $order->id) }}"
                                                                class="btn btn-sm btn-primary">Edit</a>
                                                            <form action="{{ route('order.destroy', $order->id) }}"
                                                                method="POST" style="display:inline-block;">
                                                                @csrf @method('DELETE')
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>


                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="deleteModal{{ $order->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $order->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{ route('order.destroy', $order->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="deleteModalLabel{{ $order->id }}">
                                                                            Konfirmasi Hapus</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Tutup">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus pesanan ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-danger">Ya,
                                                                            Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">

                                        {{-- Tombol Kembali --}}
                                        @if ($orders->onFirstPage())
                                            <span
                                                class="btn btn-link text-muted d-flex align-items-center text-decoration-none me-2 disabled">
                                                <i class="ti-angle-left me-1"></i> Kembali
                                            </span>
                                        @else
                                            <a href="{{ $orders->previousPageUrl() }}"
                                                class="btn btn-link text-dark d-flex align-items-center text-decoration-none me-2">
                                                <i class="ti-angle-left me-1"></i> Kembali
                                            </a>
                                        @endif


                                        {{-- Navigasi Angka --}}
                                        <div>
                                            {{ $orders->links('pagination::bootstrap-4') }}
                                        </div>

                                        {{-- Tombol Selanjutnya --}}
                                        @if ($orders->hasMorePages())
                                            <a href="{{ $orders->nextPageUrl() }}"
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
