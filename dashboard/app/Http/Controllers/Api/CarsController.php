<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::all();
        return response()->json([
            'data' => $car,
            'status' => 'success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string',
            'license_plate' => 'required|string|unique:cars,license_plate',
            'mileage' => 'required|integer|min:0',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'is_premium' => 'boolean',
            'rental_count' => 'required|integer|min:0',
            'daily_rate' => 'required|integer|min:0',
            'status' => 'required|in:available,rented,maintenance,retired',
            'name' => 'required|string'
        ]);

        $car = Car::create($validated);
        return response()->json([
            'data' => $car,
            'status' => 'success'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found'
            ], 404);
        }
        return response()->json([
            'data' => $car,
            'status' => 'success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found'
            ], 404);
        }

        $validated = $request->validate([
            'brand_id' => 'sometimes|exists:brands,id',
            'model_id' => 'sometimes|exists:models,id',
            'model' => 'sometimes|string',
            'year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'color' => 'sometimes|string',
            'license_plate' => 'sometimes|string|unique:cars,license_plate,' . $car->id,
            'mileage' => 'sometimes|integer|min:0',
            'lat' => 'sometimes|numeric|between:-90,90',
            'lng' => 'sometimes|numeric|between:-180,180',
            'is_premium' => 'boolean',
            'rental_count' => 'sometimes|integer|min:0',
            'daily_rate' => 'sometimes|integer|min:0',
            'status' => 'sometimes|in:available,rented,maintenance,retired',
            'name' => 'sometimes|string'
        ]);

        $car->update($validated);
        return response()->json([
            'data' => $car,
            'status' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found'
            ], 404);
        }
        $car->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Car deleted successfully'
        ], 200);
    }
}
