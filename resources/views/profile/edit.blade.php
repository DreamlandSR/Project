@extends('layout')

@section('content')
    @include('layouts.sections.navbar')

    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.sections.sidebar')

        <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center space-x-6">
            <!-- Profile Picture -->
            <img src="{{ asset('storage/profile_photos/default.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">

        <!-- User Info -->
        <div>
            <h2 class="text-xl font-semibold text-blue-700">Ryan Adi Saputra</h2>
            <p class="text-gray-500">Pengguna</p>
            <div class="mt-2 space-x-2">
                <button class="px-3 py-1 text-sm text-white bg-gray-300 rounded hover:bg-gray-400">Change Photo</button>
                <button class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Edit Profile</button>
            </div>
        </div>
    </div>

    <hr class="my-6">

    <!-- Form Data Diri -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Depan</label>
            <input type="text" name="first_name" value="Ryan Adi Saputra" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" placeholder="Nama belakang Anda" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
            <input type="text" name="phone" placeholder="Masukkan Nomor Handphone Anda" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</a>
        </div>
    </form>
</div>
@endsection