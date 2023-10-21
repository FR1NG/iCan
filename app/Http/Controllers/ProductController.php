<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

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
        return $this->product->create($data);
    }

    public function index()
    {
        return $this->product->getAll();
    }

    public function update(Product $product, ProductRequest $request)
    {
        // image update to be handled lather
        $data = $request->all();
        // this line to prevent updating image name on database
        if (isset($data['image'])) {
            unset($data['image']);
        }
        return $this->product->update($product, $data);
    }

    public function delete(Product $product)
    {
        return $this->product->delete($product);
    }

    private function uploadImage(ProductRequest $request): string
    {
        if ($request->file('image')) {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Images/Products'), $filename);
            return $filename;
        }
        return 'default.png';
    }
}
