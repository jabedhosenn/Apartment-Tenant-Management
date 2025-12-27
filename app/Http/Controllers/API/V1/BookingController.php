<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Booking\BookingCollection;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('apartment', 'tenant')->get();
        return response()->json([
            'message' => 'Bookings retrieved successfully',
            'data' => new BookingCollection($bookings),
        ], 200);
    }

    public function store(StoreBookingRequest $request)
    {
        return response()->json([
            'message' => 'Booking created successfully',
            'data' => new BookingResource(Booking::create($request->validated()))
        ], 201);
    }
}
