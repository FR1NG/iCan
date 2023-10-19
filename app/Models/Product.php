<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    public function categoris() {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
}
