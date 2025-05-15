@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')
            <h2>Tambah Produk</h2>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label"> Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    <input type="file" name="image_product[]" multiple>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label"> Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label"> Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>


                <div class="mb-3">
                    <label for="stok_id" class="form-label"> Stok</label>
                    <input type="number" class="form-control" id="stok_id" name="stok_id" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label"> Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="available">Tersedia</option>
                        <option value="unavailable">Habis</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label"> Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" step="0.1">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="form btn-primary">Simpan</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>

            <script>
                document.getElementById('image-input').addEventListener('change', function(e) {
                    const previewContainer = document.getElementById('preview-container');
                    previewContainer.innerHTML = ''; // Bersihkan container sebelumnya

                    const files = e.target.files;

                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const img = document.createElement('img');
                            img.src = event.target.result;
                            img.style.height = '100px';
                            img.style.marginRight = '10px';
                            img.classList.add('rounded');
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            </script>
        @endsection
