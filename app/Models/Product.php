<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_published',
        'is_deleted',
    ];

    public function productCategory(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
