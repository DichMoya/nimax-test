<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'is_published' => (bool) $this->is_published,
            'is_deleted' => (bool) $this->is_deleted,
            'categories' => $this->productCategory->map->only('id', 'name'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
