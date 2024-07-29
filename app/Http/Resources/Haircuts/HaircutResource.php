<?php

namespace App\Http\Resources\Haircuts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HaircutResource extends JsonResource
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
            'price' => $this->price,
            'category' => $this->category->getName(),
            'imageSrc' => $this->imageSrc,
            'imageAlt' => $this->imageAlt,
            'date' => $this->date,
            'sales' => $this->sales,
            'isOnSale' => $this->isOnSale,
        ];
    }
}
