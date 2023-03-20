<?php

namespace App\Filters\Product;

use App\Filters\Pipe;
use Closure;

class ProductPricesFilter implements Pipe
{

    public function apply($products, Closure $next)
    {
        if (request()->has('prices')) {
            $priceRange = explode(',', request()->get('prices'));
            $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        return $next($products);
    }
}
