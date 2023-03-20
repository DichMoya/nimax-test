<?php

namespace App\Filters\Product;

use App\Filters\Pipe;
use Closure;

class ProductNameFilter implements Pipe
{

    public function apply($products, Closure $next)
    {
        if (request()->has('name')) {
            $products->where('name', 'LIKE', '%'.request()->get('name').'%');
        }

        return $next($products);
    }
}
