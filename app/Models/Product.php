<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok', 'status', 'rating', 'berat'];
    public $timestamps = false;

    // Relasi: 1 produk memiliki banyak stocks
    // public function stocks()
    // {
    //     // return $this->hasMany(Stock::class, 'id');
    //     return $this->belongsTo(Stock::class, 'id');
    // }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImages::class, 'product_id')->where('is_main', 1);
    }
}
