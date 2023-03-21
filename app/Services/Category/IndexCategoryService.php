<?php

namespace App\Services\Category;

use App\Models\Category;

class IndexCategoryService
{
    public function index()
    {
        return Category::all();
    }
}
