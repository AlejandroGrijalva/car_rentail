<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loyalty_level;

class Loyalty_LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyalty_levels = Loyalty_level::all();
        return response()->json([
            "data" => $loyalty_levels,
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
            'min_points' => 'required|integer|min:0',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'free_extra_hours' => 'required|integer|min:0'
        ]);

        $loyalty_level = new Loyalty_level();
        $loyalty_level->fill($validated);
        $loyalty_level->save();

        return response()->json([
            "data" => $loyalty_level,
            "message" => "Loyalty level created successfully",
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loyalty_level = Loyalty_level::find($id);
        if ($loyalty_level == null) {
            return response()->json([
                "message" => "Loyalty level not found",
                "status" => "error"
            ], 404);
        }
        return response()->json([
            "data" => $loyalty_level,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loyalty_level = Loyalty_level::find($id);
        if (!$loyalty_level) {
            return response()->json([
                "message" => "Loyalty level not found",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'min_points' => 'required|integer|min:0',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'free_extra_hours' => 'required|integer|min:0'
        ]);

        $loyalty_level->fill($validated);
        $loyalty_level->save();

        return response()->json([
            "data" => $loyalty_level,
            "message" => "Loyalty level updated successfully",
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loyalty_level = Loyalty_level::find($id);
        if (!$loyalty_level) {
            return response()->json([
                "message" => "Loyalty level not found",
                "status" => "error"
            ], 404);
        }
        $loyalty_level->delete();
        return response()->json([
            "message" => "Loyalty level deleted successfully",
            "status" => "success"
        ], 200);
    }
}
