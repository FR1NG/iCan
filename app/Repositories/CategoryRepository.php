<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryInterface
{

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function getAll(Request $request)
    {
        $categories = Category::with(['parent'])->withCount(['products'])->get();
        return $categories;
    }

    public function update(Category $category, array $data)
    {
        if ($data["name"]) {
            $category->name = $data["name"];
        }
        $result = $category->update();
        return $result;
    }

    public function delete(Category $category)
    {
        $result = $category->delete();
        return $result;
    }

    public function getForConsole()
    {
        $categories = Category::query()->select(['id', 'name'])->get();
        return $categories;
    }
}
