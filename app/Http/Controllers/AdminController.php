<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
{
    $now = Carbon::now();
    $thirtyDaysAgo = $now->copy()->subDays(30);
    $prevThirtyDaysAgo = $now->copy()->subDays(60);

    // Data 30 hari terakhir
    $totalProduk = DB::table('products')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->count();

    $totalRegister = DB::table('users')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->count();

    $totalSold = DB::table('orders')
        ->where('status', 'completed')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->count();

    $totalPembayaran = DB::table('orders')
        ->where('status', 'completed')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->sum('total_harga');

    // Data 30 hari sebelumnya (untuk perbandingan)
    $prevProduk = DB::table('products')
        ->whereBetween('created_at', [$prevThirtyDaysAgo, $thirtyDaysAgo])
        ->count();

    $prevRegister = DB::table('users')
        ->whereBetween('created_at', [$prevThirtyDaysAgo, $thirtyDaysAgo])
        ->count();

    $prevSold = DB::table('orders')
        ->where('status', 'paid')
        ->whereBetween('created_at', [$prevThirtyDaysAgo, $thirtyDaysAgo])
        ->count();

    $prevPembayaran = DB::table('orders')
        ->where('status', 'paid')
        ->whereBetween('created_at', [$prevThirtyDaysAgo, $thirtyDaysAgo])
        ->sum('total_harga');

    // Hitung pertumbuhan (%)
    $growth = function ($current, $previous) {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100, 2);
    };

    $growthProduk = $growth($totalProduk, $prevProduk);
    $growthRegister = $growth($totalRegister, $prevRegister);
    $growthSold = $growth($totalSold, $prevSold);
    $growthPembayaran = $growth($totalPembayaran, $prevPembayaran);

    // Ambil produk terlaris jika dipanggil oleh /admin/terlaris
    $produkTerlaris = DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('products.nama as nama_produk', DB::raw('SUM(order_items.kuantitas) as total_terjual'))
        ->groupBy('products.nama')
        ->orderByDesc('total_terjual')
        ->limit(6)
        ->get();

    return view('dashboard.admin', compact(
        'totalProduk',
        'totalRegister',
        'totalSold',
        'totalPembayaran',
        'growthProduk',
        'growthRegister',
        'growthSold',
        'growthPembayaran',
        'produkTerlaris' // Mengirimkan produk terlaris ke tampilan
    ));
}

}
