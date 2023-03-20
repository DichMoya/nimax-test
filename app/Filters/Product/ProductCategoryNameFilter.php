<?php

namespace App\Filters\Product;

use App\Filters\Pipe;
use Closure;

class ProductCategoryNameFilter implements Pipe
{

    public function apply($products, Closure $next)
    {
        if (request()->has('category_name')) {
            $products->whereHas('productCategories.category', function($query) {
                $query->where('name', 'LIKE', '%'.request()->get('category_name').'%');
            });
        }

        return $next($products);
    }
}
