<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => Payment::all(),
            "status" => "success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'transaction_id' => 'nullable|string|max:255|unique:payments,transaction_id',
            'status' => 'required|in:pending,completed,failed,refunded',
            'payment_date' => 'required|datetime',
        ]);

        $payment = new Payment();
        $payment->rental_id = $validated['rental_id'];
        $payment->amount = $validated['amount'];
        $payment->payment_method = $validated['payment_method'];
        $payment->payment_date = $validated['payment_date'];
        $payment->transaction_id = $validated['transaction_id'];
        $payment->status = $validated['status'];
        $payment->payment_date = $validated['payment_date'];

        $payment->save();

        return response()->json([
            "data" => $payment,
            "message" => "Payment created successfully",
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        if ($payment == null) {
            return response()->json([
                "message" => "Payment not found",
                "status" => "error"
            ], 404);
        }
        return response()->json([
            "data" => $payment,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json([
                "message" => "Payment not found",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'transaction_id' => 'nullable|string|max:255|unique:payments,transaction_id,' . $payment->id,
            'status' => 'required|in:pending,completed,failed,refunded',
            'payment_date' => 'required|datetime',
        ]);

        $payment->fill($validated);
        $payment->save();

        return response()->json([
            "data" => $payment,
            "message" => "Payment updated successfully",
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json([
                "message" => "Payment not found",
                "status" => "error"
            ], 404);
        }

        $payment->delete();

        return response()->json([
            "message" => "Payment deleted successfully",
            "status" => "success"
        ], 200);
    }
}
