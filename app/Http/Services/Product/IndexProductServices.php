<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class IndexProductServices
{
    public function index()
    {
        return Product::all();
    }
}
