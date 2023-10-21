<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductInterface extends BaseInterface
{
    public function update(Product $product, array $data);
    public function delete(Product $product);
}
