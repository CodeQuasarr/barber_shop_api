<?php

namespace App\Http\Resources\Haircuts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HaircutCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }
}