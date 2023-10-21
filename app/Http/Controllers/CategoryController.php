<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;

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

    public function index()
    {
        return $this->category->getAll();
    }

    public function update(Category $category, CategoryRequest $request)
    {
        return $this->category->update($category, $request->all());
    }

    public function delete(Category $category)
    {
        return $this->category->delete($category);
    }
}
