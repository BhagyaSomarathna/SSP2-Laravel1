<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class categoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'category_id'   => $this->id,
            'category_name' => $this->category_name,

            // Include items only if loaded
            'items' => $this->whenLoaded('items', function () {
                return $this->items->map(function ($item) {
                    return [
                        'item_id'    => $item->id,
                        'item_name'  => $item->item_name,
                        'price'      => $item->price,
                        'description'=> $item->description,
                        'img'        => $item->img,
                    ];
                });
            }),
        ];
    }
}
