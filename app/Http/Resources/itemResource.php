<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class itemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'item_id'       => $this->id,
            'item_name'     => $this->item_name,
            'category_name' => $this->category_name,
            'price'         => $this->price,
            'description'   => $this->description,
            'img'           => $this->img,

            
            'category' => $this->whenLoaded('category', function () {
                return [
                    'category_id'   => $this->category->id,
                    'category_name' => $this->category->category_name,
                ];
            }),
        ];
    }
}
