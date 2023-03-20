<?php

namespace App\Http\Services\Category;

use App\Http\Controllers\Controller;

class DeleteCategoryService
{
    /**
     * @throws \Exception
     */
    public function delete($category)
    {
        if($category->products()->count() > 0)
            throw new \Exception('Cannot be deleted because of the connection to the product.');

        $category->delete();
    }
}
