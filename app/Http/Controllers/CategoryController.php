<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->sendResponse(Category::all(), 'Category retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $category = Category::create($validated);

        return $this->sendResponse($category, 'Category created  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        if($category->products()->count() > 0)
            return $this->sendError('Cannot be deleted because of the connection to the product.');

        $category->delete();
        return $this->sendResponse([], 'Category deleted successfully.');
    }
}
