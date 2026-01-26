<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class orderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'order_ID'      => $this->order_ID ?? $this->id,
            'order_date'    => $this->order_date,
            'delivery_date' => $this->delivery_date,
            'amount'        => $this->amount,

            // Include customer only if loaded
            'customer' => $this->whenLoaded('customer', function () {
                return [
                    'customer_ID'   => $this->customer->customer_ID ?? $this->customer->id,
                    'customer_name' => $this->customer->customer_name,
                    'email'         => $this->customer->email_address,
                ];
            }),
             // Include items only if loaded (many-to-many)
            'items' => $this->whenLoaded('items', function () {
                return $this->items->map(function ($item) {
                    return [
                        'item_id'   => $item->id,
                        'item_name' => $item->item_name,
                        'price'     => $item->price,
                        'quantity'  => $item->pivot->quantity ?? null,
                    ];
                });
            }),
        ];
    }
}
