<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->paginate(5); 
        return view('dashboard.pesanan', compact('orders'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.pesanan.edit-pesanan', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,cancelled',
            'alamat_pemesanan' => 'required|string|max:255',
            'metode_pengiriman' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
            'alamat_pemesanan' => $request->alamat_pemesanan,
            'metode_pengiriman' => $request->metode_pengiriman,
            'notes' => $request->notes,
        ]);

        return redirect()->route('pesanan.page')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('pesanan.page')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function DetailOrder()
    {
        $orderItems = OrderItem::with(['order.user', 'product'])->get();
        return view('dashboard.detailOrder', compact('orderItems'));
    }
}
