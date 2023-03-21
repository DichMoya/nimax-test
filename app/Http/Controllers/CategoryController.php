<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\Category\DeleteCategoryService;
use App\Services\Category\IndexCategoryService;
use App\Services\Category\StoreCategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCategoryService $indexCategoryService): JsonResponse
    {
        return $this->sendResponse(
            CategoryResource::collection($indexCategoryService->index()),
            'Category retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, StoreCategoryService $storeCategoryService): JsonResponse
    {
        $validated = $request->validated();
        $category = $storeCategoryService->store($validated);
        return $this->sendResponse(
            new CategoryResource($category),
            'Category created  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, DeleteCategoryService $deleteCategoryService): JsonResponse
    {
        $deleteCategoryService->delete($category);
        return $this->sendResponse([], 'Category deleted successfully.');
    }
}
