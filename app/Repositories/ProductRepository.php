<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

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

    public function getAll()
    {
        $products = Product::with(['categories'])->get();
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
