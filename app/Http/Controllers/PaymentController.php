<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaidReview;
use App\Models\User;
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
        $payments = Payment::with(['paidReview'])->get(); // Get all payments
        return view('staff.finance.payment', compact('payments')); // Return to the index view
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([

            'reference_number' => 'nullable|string',
            // 'reference_number' => 'required|string|unique:payments,reference_number,' . $payment->id,
            'status' => 'required|string',
        ]);

        $payment = Payment::findOrFail($id);
        $PR_id = $payment->paid_review_id;
        $PR_payment = PaidReview::findOrFail($PR_id);

        if ($request->reference_number != '') {
            // Update the payment
            $payment->update([

                'reference_number' => $request->reference_number,
                'status' => $request->status,
            ]);


            if ($request->status == 'Completed') {
                $PR_payment->update([
                    'payment_status' => 'Paid',
                ]);
            } else if ($request->status == 'Failed') {
                $PR_payment->update([
                    'payment_status' => 'Pending',
                ]);
            }

            // Redirect to the payments index page with success message
            return redirect()->back()->with('success', 'Payment updated successfully');
        } else {

            if ($request->status == 'Failed') {


                $payment->update([

                    'reference_number' => 'Payment Failed',
                    'status' => $request->status,

                ]);
                return redirect()->back()->with('success', 'Payment updated successfully');
            } else {
                return redirect()->back()->with('failed', 'Reference number is required');
            }
        }


    }


    public function PaymentList()
    {
        $userId = auth()->user()->id;

        // Fetch PaidReviews for the authenticated Content Creator with related payments
        $payments = PaidReview::with('payments')
            ->where('content_creator_id', $userId) // Ensure this column exists in the PaidReviews table
            ->get();

        return view('cc.payment-history', compact('payments'));
    }

}
