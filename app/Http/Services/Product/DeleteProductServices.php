<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class DeleteProductServices
{
    public function delete(Product $product): Product
    {
        if($product->is_deleted) {
            throw new \Exception('Product already deleted.');
        }
        $product->update([
            'is_deleted' => true
        ]);
        return $product;
    }
}
