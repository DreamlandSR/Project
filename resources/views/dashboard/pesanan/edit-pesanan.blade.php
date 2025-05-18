@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Pesanan</h2>
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>


            <div class="form-group">
                <label>Alamat Pemesanan</label>
                <input type="text" name="alamat_pemesanan" class="form-control" value="{{ $order->alamat_pemesanan }}">
            </div>

            <div class="form-group">
                <label>Metode Pengiriman</label>
                <input type="text" name="metode_pengiriman" class="form-control" value="{{ $order->metode_pengiriman }}">
            </div>

            <div class="form-group">
                <label>Catatan</label>
                <textarea name="notes" class="form-control">{{ $order->notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
@endsection
