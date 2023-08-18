<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SaleItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'user_id' => $this->user_id,
            'total' => $this->total,
            'start_date' => $this->start_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sale_items' => SaleItemResource::collection($this->whenLoaded('saleItems')),
        ];
    }
}
