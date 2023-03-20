<?php

namespace App\Filters\Product;

use App\Filters\Pipe;
use Closure;

class ProductIsPublishedFilter implements Pipe
{

    public function apply($products, Closure $next)
    {
        if (request()->has('is_published')) {
            $products->where('is_published', request()->get('is_published'));
        }

        return $next($products);
    }
}
