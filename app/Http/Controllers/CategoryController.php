<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    public function __construct(protected CategoryInterface $category)
    {
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->all();
        return $this->category->create($data);
    }
}
