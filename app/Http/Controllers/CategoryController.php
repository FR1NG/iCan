<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    public function __construct(protected CategoryInterface $category)
    {
    }

    public function create()
    {
        return $this->category->create([]);
    }
}
