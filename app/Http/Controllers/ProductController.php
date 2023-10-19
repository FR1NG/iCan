<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductInterface $product)
    {
    }

    public function index()
    {
        return $this->product->getAll();
    }
}
