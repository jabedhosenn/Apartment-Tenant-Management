<?php

namespace App\Http\Resources\Apartment;

use App\Http\Resources\Booking\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ApartmentResource extends JsonResource
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
            'rent' => $this->rent,
            'number_of_rooms' => $this->number_of_rooms,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'status' => $this->currentBooking ? 'Booked' : 'Available',
            'current_booking' => $this->when(
                $this->relationLoaded('currentBooking')
                    && $this->currentBooking,
                fn() => new BookingResource($this->currentBooking)
            ),
        ];
    }
}
