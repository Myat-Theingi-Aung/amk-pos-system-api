<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sale_id' => $this->sale_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'payment_start_period' => $this->payment_start_period,
            'payment_end_period' => $this->payment_end_period,
            'cancel' => $this->cancel,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
