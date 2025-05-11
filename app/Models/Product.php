<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok_id', 'status', 'rating'];
    public $timestamps = false;

    // Relasi: 1 produk memiliki banyak stocks
    public function stocks()
    {
        // return $this->hasMany(Stock::class, 'id');
        return $this->belongsTo(Stock::class, 'id');
    }
    public function images()
    {
        return $this->hasMany(productimages::class);
    }
}

