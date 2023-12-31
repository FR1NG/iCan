<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository implements ProductInterface
{

    public function create(array $data): Model
    {
        $product = Product::create($data);
        if (isset($data['categories'])) {
            $product->categories()->attach($data['categories']);
        }
        return $product;
    }

    public function getAll(Request $request)
    {

        $categoryFilter = $request->query('category');
        $priceFrom = $request->query('priceFrom') ?? 0;
        $priceTo = $request->query('priceTo') ?? PHP_FLOAT_MAX;
        $query = Product::query()->with(['categories']);
        if ($categoryFilter && strlen($categoryFilter) > 0) {
            $query->whereHas('categories', function ($q) use ($categoryFilter) {
                $q->where('name', '=', $categoryFilter);
            });
        }
        if ($priceFrom <= $priceTo) {
            $query->whereBetween('price', [$priceFrom, $priceTo]);
        }
        $products = $query->get();
        return $products;
    }

    public function update(Product $product, array $data): bool
    {
        $result = $product->update($data);
        return $result;
    }

    public function delete(Product $product): bool
    {
        $result = $product->delete();
        return $result;
    }
}
