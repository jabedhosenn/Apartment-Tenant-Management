<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\StoreTenantRequest;
use App\Http\Resources\Tenant\TenantCollection;
use Exception;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        // $tenants = Tenant::all();
        $tenants = Tenant::with('currentBooking.tenant')->get();
        return response()->json([
            'message' => 'Tenants retrieved successfully',
            'data' => new TenantCollection($tenants),
        ], 200);
    }

    public function store(StoreTenantRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('tenant', 'public');
            }
            $apartment = Tenant::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'image' => $imagePath,
            ]);
            return response()->json([
                'message' => 'Tenant created successfully',
                'data' => $apartment
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create tenant',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
