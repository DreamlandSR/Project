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


                                <div class="d-flex flex-wrap gap-3">
                                    <div class="d-flex align-items-center bg-white rounded-pill px-3 py-1 shadow-sm">
                                        <span class="text-muted me-2 d-none d-sm-block">Tampilkan</span>
                                        <select class="form-select border-0 bg-transparent pe-3">
                                            <option selected>10</option>
                                            <option>25</option>
                                            <option>50</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-outline-primary d-flex align-items-center rounded-pill">
                                        <i class="icon-download me-2"></i>
                                        <span class="d-none d-md-block">Export</span>
                                    </button>

                                    <!-- Tombol Tambah pengiriman Buka Modal -->
                                    <a href="{{ route('pengiriman.create') }}"
                                        class="btn btn-primary d-flex align-items-center rounded-pill">
                                        <i class="icon-plus me-2"></i>
                                        <span class="d-none d-md-block">Tambah produk</span>
                                    </a>
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
                                                    <th>#</th>
                                                    <th>Order ID</th>
                                                    <th>Status Pengiriman</th>
                                                    <th>Nomor Resi</th>
                                                    <th>Jasa Kurir</th>
                                                    <th>Tanggal Dikirim</th>
                                                    <th>Tanggal Sampai</th>
                                                    <th>Catatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pengiriman as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->order_id }}</td>
                                                        <td>{{ $p->status_pengiriman }}</td>
                                                        <td>{{ $p->nomor_resi }}</td>
                                                        <td>{{ $p->jasa_kurir }}</td>
                                                        <td>{{ $p->tanggal_dikirim }}</td>
                                                        <td>{{ $p->tanggal_sampai }}</td>
                                                        <td>{{ $p->catatan }}</td>
                                                        <td>
                                                            <a href="{{ route('pengiriman.edit', $p->id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('pengiriman.destroy', $p->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf @method('DELETE')
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">Belum ada data pengiriman.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endsection --}}
                    {{-- </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> --}}

                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                        <button class="btn btn-link text-muted d-flex align-items-center text-decoration-none me-2">
                            <i class="ti-angle-left me-1"></i> Kembali
                        </button>

                        <nav class="my-2">
                            <ul class="pagination mb-0">
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-muted" href="#">01</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded bg-primary text-white border-0" href="#">02</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-muted" href="#">03</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-muted" href="#">04</a>
                                </li>
                                <li class="page-item disabled">
                                    <span class="page-link border-0 bg-transparent text-muted">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-muted" href="#">10</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-muted" href="#">11</a>
                                </li>
                            </ul>
                        </nav>

                        <button class="btn btn-link text-dark d-flex align-items-center text-decoration-none ms-2">
                            Selanjutnya <i class="ti-angle-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- content-wrapper ends -->
    {{--
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                    template</a>
                from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                with
                <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div> --}}
@endsection
