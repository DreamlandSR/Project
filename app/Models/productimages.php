<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productimages extends Model
{
    protected $fillable = ['product_id', 'image'];
    public $timestamps = false;
    
    protected $table = 'product_images';

    public function product()
    {
    return $this->belongsTo(Product::class);
    }
}
