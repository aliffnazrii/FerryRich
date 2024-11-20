<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaidReview;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use App\Models\Payment;

class PaidReviewController extends Controller
{
    public function index()
    {
        $paidReviews = PaidReview::with(['contentCreator','product','reviewSubmissions', 'payments'])->get();
        $products = Product::all();
        $contentcreators = User::where('role','Content Creator')->get();
        return view('staff.paid-review', compact('paidReviews','products','contentcreators'));
    }

    public function create()
    {
        return view('paid_reviews.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
           
        // ]);

        $paidReview = PaidReview::create($request->all());

        // $video = Video::create([
        //     'paid_review_id' => $paidReview->id, 
        //     'file_path' => '-', 
        //     'uploaded_by' => $request->input('uploaded_by'),
        //     'upload_date' => $request->input('upload_date'),
        //     'status' => $request->input('status'), 
        //     // ... other video details (e.g., 'reviewed_by', 'reviewed_at', 'feedback')
        // ]);

        // Create the Payment record, associating it with the PaidReview
        $payment = Payment::create([
            'paid_review_id' => $paidReview->id, 
            'amount' => $paidReview->deal_rate, 
            'reference_number' => null, 
        ]);
        return redirect()->back()->with('success', 'Paid Review created successfully.');
    }

    public function show($id)
    {
        $paidReview = PaidReview::findOrFail($id);
        return view('paid_reviews.show', compact('paidReview'));
    }

    public function edit($id)
    {
        $paidReview = PaidReview::findOrFail($id);
        return view('paid_reviews.edit', compact('paidReview'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           
        ]);

        $paidReview = PaidReview::findOrFail($id);
        $paidReview->update($request->all());
        return redirect()->back()->with('success', 'Paid Review updated successfully.');
    }

    public function destroy($id)
    {
        PaidReview::destroy($id);
        return redirect()->route('paid_reviews.index')->with('success', 'Paid Review deleted successfully.');
    }
}
