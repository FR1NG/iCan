<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface
{

    public function create(array $data)
    {
        return response()->json(['message' => 'category has been created successfully'], 201);
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
