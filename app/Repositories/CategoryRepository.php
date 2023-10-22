<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryInterface
{

    public function create(array $data)
    {
        $category = Category::create($data);
        return response()->json(['message' => 'category has been created successfully', 'data' => $category], 201);
    }

    public function getAll(Request $request)
    {
        $categories = Category::with(['parent'])->withCount(['products'])->get();
        return response()->json(['data' => $categories]);
    }

    public function update(Category $category, array $data)
    {
        if ($data["name"]) {
            $category->name = $data["name"];
        }
        $result = $category->update();
        if ($result) {
            return response()->json(['message' => 'Category has been updated successfully']);
        }
        return response()->json(['message' => 'Category has not been updated'], 500);
    }

    public function delete(Category $category)
    {
        $result = $category->delete();
        if ($result) {
            return response()->json(['message' => 'Category has been deleted successfully']);
        }
        return response()->json(['message' => 'Category has not been deleted'], 500);
    }

    public function getForConsole() {
        $categories = Category::query()->select(['id', 'name'])->get();
        return $categories;
    }
}
