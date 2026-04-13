<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => Rental::all(),
            "status" => "success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'pickup_time' => 'nullable|datetime',
            'return_date' => 'required|datetime',
            'status' => 'required|in:pending,active,completed,cancelled',
            'total_amount' => 'required|numeric|min:0'
        ]);

        $rental = new Rental();
        $rental->name = $request->name;
        $rental->user_id = $request->user_id;
        $rental->car_id = $request->car_id;
        $rental->driver_id = $request->driver_id;
        $rental->pickup_time = $request->pickup_time;
        $rental->return_date = $request->return_date;
        $rental->status = $request->status;
        $rental->total_amount = $request->total_amount;

        $rental->save();

        return response()->json([
            "data" => $rental,
            "message" => "Rental created successfully",
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rental = Rental::find($id);
        if ($rental == null) {
            return response()->json([
                "message" => "Rental not found",
                "status" => "error"
            ], 404);
        }
        return response()->json([
            "data" => $rental,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rental = Rental::find($id);
        if (!$rental) {
            return response()->json(['message' => 'Rental not found'], 404);
        }
        $rental->update($request->validated([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'pickup_time' => 'nullable|datetime',
            'return_date' => 'required|datetime',
            'status' => 'required|in:pending,active,completed,cancelled',
            'total_amount' => 'required|numeric|min:0'
        ]));

        return response()->json($rental);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rental = Rental::find($id);
        if (!$rental) {
            return response()->json(['message' => 'Rental not found'], 404);
        }
        $rental->delete();
        return response()->json(['message' => 'Rental deleted successfully']);
    }
}
