<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function parent() {
        return $this->hasOne(Category::class,'id', 'parent_id');
    }
}
