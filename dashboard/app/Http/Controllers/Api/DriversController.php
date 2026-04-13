<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver = Driver::all();
        return response()->json([
            "data" => $driver,
            "status" => "success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'license_number' => 'required|string|max:255|unique:drivers',
            'license_img' => 'required|image|max:2048',
            'name' => 'required|string|max:255  '
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                "message" => "Driver not found"
            ], 404);
        }
        return response()->json([
            "data" => $driver,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                "message" => "Driver not found"
            ], 404);
        }
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'license_number' => 'required|string|max:255|unique:drivers',
            'license_img' => 'required|image|max:2048',
            'name' => 'required|string|max:255  '
        ]);
        $driver->update($validated);
        return response()->json([
            "data" => $driver,
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                "message" => "Driver not found"
            ], 404);
        }
        $driver->delete();
        return response()->json([
            "message" => "Driver deleted successfully"
        ], 200);
    }
}
