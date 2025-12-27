<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreApartmentRequest;
use App\Http\Resources\Apartment\ApartmentCollection;
use Exception;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('currentBooking.tenant')->get();
        return response()->json([
            'message' => 'Apartments retrieved successfully',
            'data' => new ApartmentCollection($apartments),
        ], 200);
    }

    public function store(StoreApartmentRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('apartment', 'public');
            }
            $apartment = Apartment::create([
                'name' => $validatedData['name'],
                'rent' => $validatedData['rent'],
                'number_of_rooms' => $validatedData['number_of_rooms'],
                'image' => $imagePath,
            ]);
            return response()->json([
                'message' => 'Apartment created successfully',
                'data' => $apartment
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create apartment',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
