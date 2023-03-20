<?php

namespace App\Http\Services\Category;

use App\Models\Category;

class IndexCategoryService
{
    public function index()
    {
        return Category::all();
    }
}
