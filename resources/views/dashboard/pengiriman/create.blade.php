@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')
            <h2>Tambah Produk</h2>
            <form method="POST" action="{{ route('pengiriman.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Order ID</label>
                    <select name="order_id" class="form-control" required>
                        <option value="">-- Pilih Order --</option>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Status Pengiriman</label>
                    <select name="status_pengiriman" class="form-control" required>
                        <option value="diproses">Diproses</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="dalam perjalanan">Dalam Perjalanan</option>
                        <option value="sampai">Sampai</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nomor Resi</label>
                    <input type="text" name="nomor_resi" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jasa Kurir</label>
                    <input type="text" name="jasa_kurir" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Dikirim</label>
                    <input type="datetime-local" name="tanggal_dikirim" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Sampai</label>
                    <input type="datetime-local" name="tanggal_sampai" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Catatan</label>
                    <textarea name="catatan" class="form-control" rows="2"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('pengiriman.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @endsection
