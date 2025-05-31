@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <h2 class="mb-4">Tambah Produk</h2>
                    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" 
                          class="p-4 bg-white shadow rounded" style="max-width: 600px;">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_product" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control @error('image_product.*') is-invalid @enderror" 
                                   name="image_product[]" id="image-input" accept="image/*" multiple>
                            <div class="form-text">Pilih satu atau lebih gambar. Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB per file.</div>
                            @error('image_product.*')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            
                            <!-- Preview Container -->
                            <div id="preview-container" class="row mt-3"></div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" value="{{ old('harga') }}" step="0.01" min="0" required>
                            @error('harga')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Stok/Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                                   id="quantity" name="quantity" value="{{ old('quantity', 0) }}" min="0" required>
                            <div class="form-text">Masukkan jumlah stok produk</div>
                            @error('quantity')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Habis</option>
                                <option value="out_of_stock" {{ old('status') == 'out_of_stock' ? 'selected' : '' }}>Stok Habis</option>
                                <option value="hidden" {{ old('status') == 'hidden' ? 'selected' : '' }}>Disembunyikan</option>
                            </select>
                            @error('status')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Info Preview untuk gambar yang akan diupload -->
                        <div class="mb-3" id="upload-info" style="display: none;">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Info Upload</h6>
                                    <small class="text-muted">
                                        <strong>Total Gambar:</strong> <span id="total-images">0</span> gambar dipilih<br>
                                        <strong>Status:</strong> Siap untuk disimpan
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Produk
                            </button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image-input');
            const previewContainer = document.getElementById('preview-container');
            const uploadInfo = document.getElementById('upload-info');
            const totalImagesSpan = document.getElementById('total-images');
            let selectedFiles = [];

            imageInput.addEventListener('change', function(e) {
                previewContainer.innerHTML = ''; // Bersihkan container sebelumnya
                selectedFiles = Array.from(e.target.files);

                if (selectedFiles.length > 0) {
                    uploadInfo.style.display = 'block';
                    totalImagesSpan.textContent = selectedFiles.length;
                } else {
                    uploadInfo.style.display = 'none';
                }

                selectedFiles.forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const div = document.createElement('div');
                            div.className = 'col-md-4 mb-3';
                            div.innerHTML = `
                                <div class="position-relative">
                                    <img src="${event.target.result}" 
                                         class="img-thumbnail" 
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-preview" 
                                            data-file-index="${index}" style="z-index: 10;">
                                        <i class="fa fa-times"></i> ×
                                    </button>
                                    <div class="position-absolute top-0 start-0 m-1">
                                        <span class="badge bg-primary">Baru</span>
                                    </div>
                                    <small class="d-block text-center mt-1 text-truncate" style="max-width: 150px;">${file.name}</small>
                                    <small class="d-block text-center text-muted">${(file.size / 1024 / 1024).toFixed(2)} MB</small>
                                </div>
                            `;
                            previewContainer.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Handle remove preview
                setTimeout(() => {
                    document.querySelectorAll('.remove-preview').forEach(button => {
                        button.addEventListener('click', function() {
                            const fileIndex = parseInt(this.getAttribute('data-file-index'));
                            
                            if (confirm('Hapus preview gambar ini?')) {
                                // Remove from visual display
                                this.closest('.col-md-4').remove();
                                
                                // Remove from selectedFiles array
                                selectedFiles.splice(fileIndex, 1);
                                
                                // Update file input (create new file list)
                                updateFileInput();
                                
                                // Update info
                                if (selectedFiles.length > 0) {
                                    totalImagesSpan.textContent = selectedFiles.length;
                                } else {
                                    uploadInfo.style.display = 'none';
                                }
                            }
                        });
                    });
                }, 100);
            });

            // Function to update file input with remaining files
            function updateFileInput() {
                const dt = new DataTransfer();
                selectedFiles.forEach(file => dt.items.add(file));
                imageInput.files = dt.files;
            }

            // Auto-update status based on stock
            const quantityInput = document.getElementById('quantity');
            const statusSelect = document.getElementById('status');
            
            quantityInput.addEventListener('input', function() {
                const quantityValue = parseInt(this.value) || 0;
                
                if (quantityValue === 0) {
                    if (statusSelect.value === 'available') {
                        if (confirm('Quantity bernilai 0, ubah status menjadi "Stok Habis"?')) {
                            statusSelect.value = 'out_of_stock';
                        }
                    }
                } else if (statusSelect.value === 'out_of_stock' || statusSelect.value === 'unavailable') {
                    if (confirm('Quantity tersedia, ubah status menjadi "Tersedia"?')) {
                        statusSelect.value = 'available';
                    }
                }
            });

            // Form validation before submit
            document.querySelector('form').addEventListener('submit', function(e) {
                const quantity = parseInt(quantityInput.value) || 0;
                const status = statusSelect.value;
                
                // Warning if status doesn't match quantity
                if (quantity === 0 && status === 'available') {
                    if (!confirm('Warning: Status "Tersedia" dengan quantity 0. Lanjutkan?')) {
                        e.preventDefault();
                        return false;
                    }
                }
                
                if (quantity > 0 && (status === 'out_of_stock' || status === 'unavailable')) {
                    if (!confirm('Warning: Ada quantity tersedia tapi status menunjukkan tidak tersedia. Lanjutkan?')) {
                        e.preventDefault();
                        return false;
                    }
                }
            });
        });
    </script>
@endsection