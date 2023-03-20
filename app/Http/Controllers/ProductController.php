<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\Product\DeleteProductServices;
use App\Http\Services\Product\IndexProductServices;
use App\Http\Services\Product\StoreProductServices;
use App\Http\Services\Product\UpdateProductService;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexProductServices $indexProductService, IndexProductRequest $request): JsonResponse
    {
        $request->validated();
        return $this->sendResponse(
            ProductResource::collection($indexProductService->index()),
            'Product retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, StoreProductServices $storeProductServices): JsonResponse
    {
        $validated = $request->validated();
        $product = $storeProductServices->store($validated);
        return $this->sendResponse(
            new ProductResource($product),
            'Product created  successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        return $this->sendResponse(
            new ProductResource($product),
            'Product retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, UpdateProductService $updateProductService, Product $product): JsonResponse
    {
        $validated = $request->validated();
        $product = $updateProductService->update($validated, $product);
        return $this->sendResponse(
            new ProductResource($product),
            'Product created  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, DeleteProductServices $deleteProductServices): JsonResponse
    {
        return $this->sendResponse(
            new ProductResource($deleteProductServices->delete($product)),
            'Product deleted successfully.');
    }
}
