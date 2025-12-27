<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'apartment' => [
                'id' => $this->apartment->id,
                'name' => $this->apartment->name
            ],
            'tenant' => [
                'id' => $this->tenant->id,
                'name' =>$this->tenant->name
            ]
        ];
    }
}
