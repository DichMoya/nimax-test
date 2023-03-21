<?php

namespace App\Services\Product;

use App\Exceptions\ProductDeleteException;
use App\Models\Product;

class DeleteProductServices
{
    public function delete(Product $product)
    {
        if($product->is_deleted) {
            throw new ProductDeleteException();
        }

        $product->update([
            'is_deleted' => true
        ]);
    }
}
