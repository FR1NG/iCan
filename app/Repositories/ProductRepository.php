<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository implements ProductInterface
{

    public function create(array $data)
    {
        $product = Product::create($data);
        if (isset($data['categories'])) {
            $product->categories()->attach($data['categories']);
        }
        return response()->json(['message' => 'Product has been created successfully', 'data' => $product], 201);
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
        return response()->json(['data' => $products]);
    }

    public function update(Product $product, array $data)
    {
        $result = $product->update($data);
        if ($result) {
            return response()->json(['message' => 'Product has been updated successfully']);
        }
        return response()->json(['message' => 'Product has not been updated'], 500);
    }

    public function delete(Product $product)
    {
        $result = $product->delete();
        if ($result) {
            return response()->json(['message' => 'Product has been deleted successfully']);
        }
        return response()->json(['message' => 'Product has not been deleted'], 500);
    }
}
