<?php

namespace App\Services\Product;

use App\Filters\Product\ProductCategoryFilter;
use App\Filters\Product\ProductCategoryNameFilter;
use App\Filters\Product\ProductIsPublishedFilter;
use App\Filters\Product\ProductNameFilter;
use App\Filters\Product\ProductPricesFilter;
use App\Models\Product;
use Illuminate\Pipeline\Pipeline;
use function app;

class IndexProductServices
{
    public function index()
    {
        $products = Product::query();
        $response =
            app(Pipeline::class)
                ->send($products)
                ->through([
                    ProductNameFilter::class,
                    ProductCategoryFilter::class,
                    ProductCategoryNameFilter::class,
                    ProductIsPublishedFilter::class,
                    ProductPricesFilter::class,
                ])
                ->via('apply')
                ->then(function ($product) {
                    return $product->get();
                });

        return $response;
    }
}
