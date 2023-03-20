<?php

namespace App\Filters\Product;

use App\Filters\Pipe;
use Closure;

class ProductCategoryFilter implements Pipe
{

    public function apply($products, Closure $next)
    {
        if (request()->has('category_id')) {
            $products->whereHas('categories', function($query) {
                $query->where('category_id', request()->get('category_id'));
            });
        }

        return $next($products);
    }
}
