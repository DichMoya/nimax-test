<?php

namespace App\Services\Product;

use App\Models\Product;

class StoreProductServices
{
    public function store($validated)
    {
        $product = Product::create($validated);
        $product->categories()->attach($validated['category_ids']);

        return $product;
    }
}
