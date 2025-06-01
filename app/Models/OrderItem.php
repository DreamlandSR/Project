<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'kuantitas',
        'harga',
        'subtotal',
    ];

    /**
     * Relasi ke Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Accessor untuk memastikan subtotal dihitung otomatis
     * jika tidak diset manual
     */
    public function getSubtotalAttribute($value)
    {
        // Jika subtotal sudah ada, gunakan nilai tersebut
        if ($value) {
            return $value;
        }
        
        // Jika tidak ada, hitung otomatis
        return $this->kuantitas * $this->harga;
    }

    /**
     * Mutator untuk mengupdate subtotal otomatis
     * ketika kuantitas atau harga berubah
     */
    public function setKuantitasAttribute($value)
    {
        $this->attributes['kuantitas'] = $value;
        if (isset($this->attributes['harga'])) {
            $this->attributes['subtotal'] = $value * $this->attributes['harga'];
        }
    }

    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = $value;
        if (isset($this->attributes['kuantitas'])) {
            $this->attributes['subtotal'] = $this->attributes['kuantitas'] * $value;
        }
    }
}