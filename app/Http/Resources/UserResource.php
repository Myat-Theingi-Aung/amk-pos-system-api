<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'NRC' => $this->NRC,
            'insurance_name' => $this->insurance_name,
            'role' => $this->role->value,
            'color' => $this->color,
            'food' => $this->food,
            'boyfriend' => $this->boyfriend,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
