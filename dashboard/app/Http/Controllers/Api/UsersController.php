<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            "data" => $user,
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
            'email' => 'required|email|unique:users',
            'profile_img' => 'nullable|image|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'loyalty_points' => 'nullable|integer',
            'loyalty_level_id' => 'nullable|exists:loyalty_levels,id'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_img = $request->profile_img ?? 'default_image.jpg';
        $user->loyalty_points = $request->loyalty_points ?? 0;
        $user->loyalty_level_id = $request->loyalty_level_id ?? null;

        $user->save();

        return response()->json([
            "data" => $user,
            "message" => "User created successfully",
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(User::find($id));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                "message" => "User not found",
                "status" => "error"
            ], 404);
        }
        return response()->json([
            "data" => $user,
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                "message" => "User not found",
                "status" => "error"
            ], 404);
        }
        $user->delete();
        return response()->json([
            "message" => "User deleted successfully",
            "status" => "success"
        ], 201);
    }
}
