<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // sesuai dengan nama tabel di database

    // Di dalam model Order.php
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'waktu_order',
        'status',
        'total_harga',
        'alamat_pemesanan',
        'metode_pengiriman',
        'notes',
    ];

    /**
     * Relasi ke user (many-to-one)
     */


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke pengiriman (one-to-many)
     */
    public function pengirimans()
    {
        return $this->hasMany(Pengiriman::class, 'order_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
