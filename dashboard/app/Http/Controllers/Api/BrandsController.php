<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json([
            'data' => $brands,
            'status' => 'success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:brands,name',
            'img' => 'required|image|max:2048'
        ]);

        $brand = Brand::create($validated);
        return response()->json([
            'data' => $brand,
            'status' => 'success'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Brand not found'
            ], 404);
        }
        return response()->json([
            'data' => $brand,
            'status' => 'success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Brand not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|unique:brands,name,' . $brand->id,
            'img' => 'sometimes|image|max:2048'
        ]);

        $brand->update($validated);
        return response()->json([
            'data' => $brand,
            'status' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Brand not found'
            ], 404);
        }
        $brand->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Brand deleted successfully'
        ], 200);
    }
}
