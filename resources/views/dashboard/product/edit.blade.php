@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <h3 class="fw-bold mb-4" style="color: #000;">Status Pesanan</h3>

                    {{-- Form dengan tata letak dua kolom --}}
                    <form method="POST" action="{{ route('products.update', $product->id) }}"
                          enctype="multipart/form-data" {{-- Diperlukan untuk upload file --}}
                          class="p-4 bg-white shadow rounded mx-auto" style="max-width: 1000px;"> {{-- Lebar disesuaikan untuk dua kolom --}}
                        @csrf
                        @method('PUT')

                        <div class="row">
                            {{-- Kolom Kiri: Upload Gambar --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Gambar</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                            </div>

                            {{-- Kolom Kanan: Input Fields Lainnya --}}
                            <div class="col-md-8">
                                <div class="row">
                                    {{-- Nama Produk --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                               value="{{ old('nama', $product->nama) }}" required>
                                    </div>

                                    {{-- Harga --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                               value="{{ old('harga', $product->harga) }}" required min="0" step="0.01">
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Stok --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="stok" class="form-label">Stok (pcs)</label>
                                        <input type="number" class="form-control" id="stok" name="stok"
                                               value="{{ old('stok', $product->stok) }}" required min="0">
                                    </div>

                                    {{-- Berat --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="berat" class="form-label">Berat (gram)</label>
                                        <input type="number" class="form-control" id="berat" name="berat"
                                               value="{{ old('berat', $product->berat) }}" required min="0" step="0.1">
                                    </div>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $product->deskripsi) }}</textarea> {{-- Rows disesuaikan --}}
                                </div>

                                {{-- Status --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="custom-select w-25 w-md-auto" id="status" name="status" required>
                                        <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>
                                            Tersedia
                                        </option>
                                        <option value="unavailable" {{ old('status', $product->status) == 'unavailable' ? 'selected' : '' }}>
                                            Habis
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-end pt-3 gap-2 mt-3 border-top"> {{-- Tambahkan border-top dan margin-top --}}
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded shadow-sm text-center mr-3">Batal</a>
                            <button type="submit" class="btn btn-primary rounded shadow-sm mr-3">Update Produk</button>
                        </div>
                    </form>
                </div>
                {{-- content-wrapper ends --}}
            </div>
            {{-- main-panel ends --}}
        </div>
        {{-- page-body-wrapper ends --}}
    </div>
    {{-- container-scroller ends --}}
@endsection
