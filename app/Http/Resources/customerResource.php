<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class customerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customer_ID'    => $this->customer_ID ?? $this->id,
            'customer_name'  => $this->customer_name,
            'address'        => $this->address,
            'email_address'  => $this->email_address,
            'contact_number' => $this->contact_number,

            // Include orders only if loaded
            'orders' => $this->whenLoaded('orders', function () {
                return $this->orders->map(function ($order) {
                    return [
                        'order_ID'      => $order->order_ID ?? $order->id,
                        'order_date'    => $order->order_date,
                        'delivery_date' => $order->delivery_date,
                        'amount'        => $order->amount,
                    

                    ];

                     });
            }),
        ];

    }
}
