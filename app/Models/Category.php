<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class category extends Model
{
    use HasFactory;
    public function products() {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}
