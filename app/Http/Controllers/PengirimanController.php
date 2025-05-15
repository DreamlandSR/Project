<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Order;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman =  Pengiriman::latest()->paginate(10);
        return view('dashboard.pengiriman', compact('pengiriman'));
    }

    public function create()
    {
        $orders = Order::all(); // ambil semua order
        return view('dashboard.pengiriman', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status_pengiriman' => 'required|in:diproses,dikirim,dalam perjalanan,sampai',
            'nomor_resi' => 'nullable|string|max:100',
            'jasa_kurir' => 'nullable|string|max:100',
            'tanggal_dikirim' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dikirim',
            'catatan' => 'nullable|string',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil ditambahkan.');
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('dashboard.pengiriman.edit', compact('orders'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status_pengiriman' => 'required|in:diproses,dikirim,dalam perjalanan,sampai',
            'nomor_resi' => 'nullable|string|max:100',
            'jasa_kurir' => 'nullable|string|max:100',
            'tanggal_dikirim' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dikirim',
            'catatan' => 'nullable|string',
        ]);

        $pengiriman->update($request->all());

        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil diperbarui.');
    }

    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil dihapus.');
    }
}
