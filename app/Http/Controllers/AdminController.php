<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menangani halaman admin dengan metode GET
    public function index()
    {
        return view('dashboard.admin'); // Ganti dengan tampilan admin yang sesuai
    }

    // Menangani permintaan POST (misalnya, form submit)
    public function store(Request $request)
    {
        // Logika untuk menangani POST request
        // Misalnya, simpan data atau proses sesuatu
    }
}
