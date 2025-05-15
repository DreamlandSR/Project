<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->get(); // pastikan relasi ke user disiapkan
        return view('dashboard.pesanan', compact('orders'));
    }
}
