<?php

namespace App\Http\Services\Category;

use App\Exceptions\CategoryDeleteException;
use App\Models\Category;

class DeleteCategoryService
{
    /**
     * @throws \Exception
     */
    public function delete(Category $category)
    {
        if ($category->products()->count() > 0) {
            throw new CategoryDeleteException();
        }

        $category->delete();
    }
}
