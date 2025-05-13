@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('layouts.sections.sidebar')

            <div class="main-panel">
                <div class="content-wrapper py-4">
                    <div class="container">
                        <div class="card shadow-sm rounded-lg p-4">
                            <div class="row align-items-center mb-4">
                                <!-- Profile Photo dan Form Upload -->
                                <div class="col-md-2 text-center">
                                    <form action="{{ route('profile.photo.update') }}" method="POST"
                                        enctype="multipart/form-data" id="photoForm">
                                        @csrf
                                        @method('PATCH')

                                        <!-- Preview Foto -->
                                        <img src="{{ asset('storage/avatars/' . (Auth::user()->avatar ?? 'kamira.jpg')) }}"
                                            class="rounded-circle img-fluid mb-2"
                                            style="width: 100px; height: 100px; object-fit: cover;" alt="Profile Photo"
                                            id="preview">

                                        <!-- Input file tersembunyi -->
                                        <input type="file" name="avatar" id="photoInput" class="d-none" accept="image/*"
                                            onchange="document.getElementById('photoForm').submit();">

                                        <!-- Tombol -->
                                        <button type="button" class="btn btn-outline-primary btn-sm mt-2"
                                            onclick="document.getElementById('photoInput').click();">
                                            Ganti Foto
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Alert sukses -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- Form Profil -->
                            <hr class="my-4">
                            <h5 class="fw-bold mb-3">Data Diri</h5>

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="namaDepan" class="form-label text-primary">Nama</label>
                                    <input type="text" class="form-control" name="name" id="namaDepan"
                                        value="{{ old('name', Auth::user()->name) }}">
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label text-primary">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="form-label text-primary">Nomor Handphone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone', Auth::user()->phone ?? '') }}">
                                    @error('phone')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Simpan & Cancel -->
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            {{ date('Y') }}. Premium <a href="https://www.bootstrapdash.com/" target="_blank">
                                Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                            <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
