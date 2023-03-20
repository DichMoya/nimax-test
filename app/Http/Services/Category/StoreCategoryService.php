<?php

namespace App\Http\Services\Category;

use App\Models\Category;

class StoreCategoryService
{
    public function store($validated)
    {
        return Category::create($validated);
    }
}
