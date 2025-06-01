<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok_id', 'status', 'rating', 'berat'];
    public $timestamps = false;

    // Relasi: 1 produk memiliki banyak stocks
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stok_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImages::class, 'product_id')->where('is_main', 1);
    }
}
