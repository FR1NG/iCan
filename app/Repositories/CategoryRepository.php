<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryInterface
{

    public function create(array $data): Model
    {
        return Category::create($data);
    }

    public function getAll(Request $request): Collection
    {
        $categories = Category::with(['parent'])->withCount(['products'])->get();
        return $categories;
    }

    public function update(Category $category, array $data): bool
    {
        if ($data["name"]) {
            $category->name = $data["name"];
        }
        $result = $category->update();
        return $result;
    }

    public function delete(Category $category): bool
    {
        $result = $category->delete();
        return $result;
    }

    public function getForConsole(): Collection
    {
        $categories = Category::query()->select(['id', 'name'])->get();
        return $categories;
    }
}
