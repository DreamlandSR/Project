@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <h2 class="mb-4">Edit Produk</h2>
                    <form method="POST" action="{{ route('products.update', $product->id) }}"
                        class="p-4 bg-white shadow rounded" style="max-width: 600px;">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $product->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $product->deskripsi }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok_id" class="form-label">Stok (ID atau jumlah)</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ $product->stok }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ $product->harga }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat</label>
                            <input type="number" class="form-control" id="berat" name="berat"
                                value="{{ $product->berat }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="available" {{ $product->status == 'available' ? 'selected' : '' }}>Tersedia
                                </option>
                                <option value="unavailable" {{ $product->status == 'unavailable' ? 'selected' : '' }}>Habis
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (opsional)</label>
                            <input type="number" class="form-control" id="rating" name="rating" step="0.1"
                                value="{{ $product->rating }}">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
