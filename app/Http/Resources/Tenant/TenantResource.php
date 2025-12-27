<?php

namespace App\Http\Resources\Tenant;

use App\Http\Resources\Booking\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'status' => $this->currentBooking ? 'Booked' : 'Abailable',
            'current_booking' => $this->when(
                $this->relationLoaded('currentBooking')
                    && $this->currentBooking,
                fn() => new BookingResource($this->currentBooking)
            ),
        ];
    }
}
