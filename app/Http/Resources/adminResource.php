<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class adminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'admin_id'    => $this->id,
            'admin_name'  => $this->admin_name,
            'admin_email' => $this->admin_email,

            
            'customers' => $this->whenLoaded('customers', function () {
                return $this->customers->map(function ($customer) {
                    return [
                        'customer_ID'   => $customer->customer_ID ?? $customer->id,
                        'customer_name' => $customer->customer_name,
                        'email'         => $customer->email_address,
                    ];
                });
            }),

             'categories' => $this->whenLoaded('categories', function () {
                return $this->categories->map(function ($category) {
                    return [
                        'category_id'   => $category->id,
                        'category_name' => $category->category_name,
                    ];
                });
            }),

            'items' => $this->whenLoaded('items', function () {
                return $this->items->map(function ($item) {
                    return [
                        'item_id'    => $item->id,
                        'item_name'  => $item->item_name,
                        'price'      => $item->price,
                    ];
                });
            }),
        ];
    }
}
