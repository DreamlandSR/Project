<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Order;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengiriman::with(['order.user']);

        // Filter status pengiriman
        if ($request->filled('status_pengiriman')) {
            $query->where('status_pengiriman', $request->status_pengiriman);
        }

        // Filter berdasarkan nama pembeli
        if ($request->has('search') && $request->search !== '') {
            $query->whereHas('order.user', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $pengiriman = $query->paginate(5)->withQueryString();

        return view('dashboard.pengiriman', compact('pengiriman'));
    }

    public function create()
    {
        $pengiriman = Pengiriman::all(); // ambil semua order
        return view('dashboard.pengiriman', compact('pengiriman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status_pengiriman' => 'required|in:diproses,dikirim,dalam perjalanan,sampai, gagal',
            'nomor_resi' => 'nullable|string|max:100',
            'jasa_kurir' => 'nullable|string|max:100',
            'tanggal_dikirim' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dikirim',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil ditambahkan.');
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('dashboard.pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_pengiriman' => 'required|in:diproses,dikirim,dalam_perjalanan,sampai,gagal',
            'nomor_resi' => 'required|string|max:100',
            'jasa_kurir' => 'nullable|string|max:100',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->update([
            'status_pengiriman' => $request->status_pengiriman,
            'nomor_resi' => $request->nomor_resi,
            'jasa_kurir' => $request->jasa_kurir,
        ]);

        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil diperbarui.');
    }



    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success', 'Data berhasil dihapus.');
    }
}
