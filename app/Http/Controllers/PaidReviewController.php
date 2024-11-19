<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaidReview;

class PaidReviewController extends Controller
{
    public function index()
    {
        $paidReviews = PaidReview::all();
        return view('staff.paid-review', compact('paidReviews'));
    }

    public function create()
    {
        return view('paid_reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required',
            // Add other validation rules as needed
        ]);

        PaidReview::create($request->all());
        return redirect()->route('paid_reviews.index')->with('success', 'Paid Review created successfully.');
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
            'review_text' => 'required',
            // Add other validation rules as needed
        ]);

        $paidReview = PaidReview::findOrFail($id);
        $paidReview->update($request->all());
        return redirect()->route('paid_reviews.index')->with('success', 'Paid Review updated successfully.');
    }

    public function destroy($id)
    {
        PaidReview::destroy($id);
        return redirect()->route('paid_reviews.index')->with('success', 'Paid Review deleted successfully.');
    }
}
