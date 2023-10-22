<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductInterface $product)
    {
    }

    public function create(ProductRequest $request)
    {
        $filename = $this->uploadImage($request);
        $data = $request->all();
        $data['image'] = $filename;
        $product = $this->product->create($data);
        return response()->json(
            [
                'message' => 'Product has been created successfully',
                'data' => $product
            ],
            201
        );
    }

    public function index(Request $request)
    {
        $products = $this->product->getAll($request);
        return response()->json(['data' => $products]);
    }

    public function update(Product $product, ProductRequest $request)
    {
        // image update to be handled lather
        $data = $request->all();
        // this line to prevent updating image name on database
        if (isset($data['image'])) {
            unset($data['image']);
        }
        $result = $this->product->update($product, $data);
        if ($result) {
            return response()->json(['message' => 'Product has been updated successfully']);
        }
        return response()->json(['message' => 'Product has not been updated'], 500);
    }

    public function delete(Product $product)
    {
        $result = $this->product->delete($product);
        if ($result) {
            return response()->json(['message' => 'Product has been deleted successfully']);
        }
        return response()->json(['message' => 'Product has not been deleted'], 500);
    }

    private function uploadImage(ProductRequest $request): string
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Images/Products'), $filename);
            return $filename;
        }
        return 'default.png';
    }
}
