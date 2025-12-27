<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apartment\ApartmentResource;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Dashboard data retrieved successfully',

            'total_apartments' => Apartment::count(),
            'total_tenants'    => Tenant::count(),
            'total_bookings'   => Booking::count(),

            'booked_apartments' => ApartmentResource::collection(
                Apartment::whereHas('currentBooking')->get()
            ),

            'vacant_apartments' => ApartmentResource::collection(
                Apartment::whereDoesntHave('currentBooking')->get()
            ),

        ], 200);
    }
}
