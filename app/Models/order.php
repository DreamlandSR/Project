<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'status',
        'alamat_pemesanan',
        'metode_pengiriman',
        'notes',
        'total_amount',

    ];

    /**
     * Relasi ke User (pembeli)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke OrderItem (items dalam pesanan)
     * RELASI INI YANG DIBUTUHKAN UNTUK MENGATASI ERROR
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Accessor untuk mendapatkan total harga pesanan
     * (dihitung dari sum subtotal semua order items)
     */
    public function getTotalAmountAttribute()
    {
        return $this->orderItems->sum('subtotal');
    }

    /**
     * Accessor untuk mendapatkan total kuantitas items
     */
    public function getTotalQuantityAttribute()
    {
        return $this->orderItems->sum('kuantitas');
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk filter berdasarkan tanggal
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}