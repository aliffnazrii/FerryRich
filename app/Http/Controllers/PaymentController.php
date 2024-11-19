<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaidReview;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all(); // Get all payments
        return view('staff.payment', compact('payments')); // Return to the index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paidReviews = PaidReview::all(); // Get all paid reviews for the dropdown
        return view('payments.create', compact('paidReviews')); // Return to create view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'paid_review_id' => 'required|exists:paid_reviews,id',
            'amount' => 'required|numeric',
            'reference_number' => 'required|string|unique:payments,reference_number',
            'status' => 'required|string',
        ]);

        // Create the payment
        Payment::create([
            'paid_review_id' => $request->paid_review_id,
            'amount' => $request->amount,
            'reference_number' => $request->reference_number,
            'status' => $request->status,
        ]);

        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment')); // Show a single payment
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $paidReviews = PaidReview::all(); // Get all paid reviews for the dropdown
        return view('payments.edit', compact('payment', 'paidReviews')); // Return to edit view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        // Validate incoming request data
        $request->validate([
            'paid_review_id' => 'required|exists:paid_reviews,id',
            'amount' => 'required|numeric',
            'reference_number' => 'required|string|unique:payments,reference_number,' . $payment->id,
            'status' => 'required|string',
        ]);

        // Update the payment
        $payment->update([
            'paid_review_id' => $request->paid_review_id,
            'amount' => $request->amount,
            'reference_number' => $request->reference_number,
            'status' => $request->status,
        ]);

        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        // Delete the payment
        $payment->delete();

        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
    }
}
