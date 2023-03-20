<?php

namespace App\Http\Services\Product;

class UpdateProductService
{
    public function update($validated, $product)
    {
        $product->update($validated);
        $product->categories()->sync($validated['category_ids']);

        return $product;
    }
}
