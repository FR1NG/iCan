<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function create(array $data)
    {
        Category::create($data);
        return response()->json(['message' => 'category has been created successfully', 'data' => $data], 201);
    }

    public function getAll()
    {
    }

    public function update($id, array $data)
    {
    }

    public function delete($id)
    {
    }
}
