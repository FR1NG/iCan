<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryInterface $category)
    {
    }

    public function create(CategoryRequest $request): JsonResponse
    {
        $data = $request->all();
        $category = $this->category->create($data);
        return response()->json(
            [
                'message' => 'category has been created successfully',
                'data' => $category
            ],
            201
        );
    }

    public function index(Request $request): JsonResponse
    {
        $categories = $this->category->getAll($request);
        return response()->json(['data' => $categories]);
    }

    public function update(Category $category, CategoryRequest $request): JsonResponse
    {
        $result = $this->category->update($category, $request->all());
        if ($result) {
            return response()->json(['message' => 'Category has been updated successfully']);
        }
        return response()->json(['message' => 'Category has not been updated'], 500);
    }

    public function delete(Category $category): JsonResponse
    {
        $result = $this->category->delete($category);
        if ($result) {
            return response()->json(['message' => 'Category has been deleted successfully']);
        }
        return response()->json(['message' => 'Category has not been deleted'], 500);
    }
}
