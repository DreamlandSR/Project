<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $table = 'stocks';

    public $timestamps = false;

    // Tambahkan 'stok_id' agar bisa diisi
    protected $fillable = ['nama_stok', 'stok_id'];

    // Relasi: Stock milik satu Product
    public function product()
    {
        // return $this->belongsTo(Product::class, 'stok_id');
        return $this->hasMany(Product::class, 'id');
    }
}
