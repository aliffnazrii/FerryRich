<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaidReview;
use App\Models\Product;
use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('Staff')->only([
            'index',
            'store',
            'update',
        ]);
        $this->middleware('CC')->only([
            'PaymentList',

        ]);

        $this->middleware('login')->only([
            'viewReceipt',

        ]);
    }
    public function index()
    {


        // $payments = PaidReview::with(['video', 'payments'])
        // ->where('order_status','Delivered')
        // ->whereHas('video', function($query){
        //     $query->where('status','Approved');
        //     $query->whereNotNull('ad_code');
        //     $query->whereNotNull('video_link');
        // })
        // ->get();

        $payments = Payment::with(['paidReview.video'])
            ->whereHas(
                'paidReview',
                function ($query) {
                    $query->where('order_status', 'delivered');

                }
            )
            ->whereHas(
                'paidReview.video',
                function ($query) {
                    $query->where('status', 'Approved');
                    $query->whereNotNull('ad_code');
                    $query->whereNotNull('video_link');
                    $query->where('validate', 1);
                }

            )->get();

        return view('staff.finance.payment', compact('payments')); // Return to the index view
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        // $request->validate([

        //     'reference_number' => 'nullable|string',
        //     'status' => 'required|string',
        //     'receipt' => 'nullable|mimes:pdf,jpeg,png|max:2048',
        // ]);

        $payment = Payment::findOrFail($id);
        $PR_id = $payment->paid_review_id;
        $PR_payment = PaidReview::findOrFail($PR_id);
        $receiptPath = null;

        if ($request->hasFile('receipt') && $request->file('receipt')->isValid()) {
            // Delete the old file if it exists
            if ($payment->file_path && Storage::disk('public')->exists($payment->file_path)) {
                Storage::disk('public')->delete($payment->file_path);
            }

            // Store the new file
            $receiptPath = $request->file('receipt')->store('payment_receipt', 'public');
            $payment->update([
                'file_path' => $receiptPath, // The new path or the existing path
                'updated_at' => now()->setTimezone('Asia/Kuala_Lumpur'),
            ]);

            $paidReviewReceipt = PaidReview::findOrFail($payment->paid_review_id);
            $paidReviewReceipt->update([
                'receipt_photo' => $receiptPath,
            ]);
        }




        if ($request->reference_number != '') {
            // Update the payment
            $payment->update([

                'reference_number' => $request->reference_number,
                'status' => $request->status,
            ]);
        }

        if ($request->status == 'Completed') {
            if ($payment->file_path != '' && $payment->reference_number != '') {

                $PR_payment->update([
                    'payment_status' => 'Paid',
                    'validation' => 'Completed',
                ]);
                $payment->update([
                    'status' => 'Completed',
                ]);




                $pr_id = PaidReview::findOrFail($payment->paid_review_id);
                $cc = User::find($pr_id->content_creator_id);
                $data = [
                    'title' => 'Payment Successfully Processed !',
                    'message' => 'Your payment has been successfully completed.',
                    'url' => '/payment-history',
                ];

                $userController = new UserController();
                $userController->sendNotification($cc, $data);
            } else {
                return redirect()->back()->with('failed', 'Receipt and Reference Number Required');
            }
        }


        if ($request->status == 'Failed') {

            $PR_payment->update([
                'payment_status' => 'Failed',
                'validation' => 'Pending',
            ]);
            $payment->update([

                'reference_number' => 'Payment Failed',
                'status' => $request->status,

            ]);
            return redirect()->back()->with('success', 'Payment updated successfully');
        }

        return redirect()->back()->with('success', 'Payment updated successfully');
    }


    public function PaymentList()
    {
        $userId = Auth::id();

        // Fetch PaidReviews for the authenticated Content Creator with related payments
        $payments = PaidReview::with('payments')
            ->where('content_creator_id', $userId) // Ensure this column exists in the PaidReviews table
            ->get();

        return view('cc.payment-history', compact('payments'));
    }


    public function viewReceipt($id)
    {
        $payment = Payment::findOrFail($id);

        $path = storage_path('app/public/' . $payment->file_path); // Assuming 'receipt' is the column storing the file path

        if (!file_exists($path)) {
            abort(404);
        }

        // Determine the content type based on the file extension
        $mimeType = mime_content_type($path);

        return response()->file($path, [
            'Content-Type' => $mimeType, // Use the correct MIME type
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }

    public function openReceipt($id)
    {
        $payment = Payment::with('paidReview')->findOrFail($id);
        // $pr = PaidReview::with('product')->where('id',$payment->paid_review_id);
        $user = User::findOrFail($payment->paidReview->content_creator_id);
        $products = Product::where('id', $payment->paidReview->product_id)->get();

        return view('payment.receipt', compact(['payment','products', 'user']));




 
    }
}
