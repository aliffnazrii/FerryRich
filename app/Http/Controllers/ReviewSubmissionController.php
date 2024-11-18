<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewSubmission;

class ReviewSubmissionController extends Controller
{
    public function index()
    {
        $reviewSubmissions = ReviewSubmission::all();
        return view('review_submissions.index', compact('reviewSubmissions'));
    }

    public function create()
    {
        return view('review_submissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'submission_text' => 'required',
            // Add other validation rules as needed
        ]);

        ReviewSubmission::create($request->all());
        return redirect()->route('review_submissions.index')->with('success', 'Review Submission created successfully.');
    }

    public function show($id)
    {
        $reviewSubmission = ReviewSubmission::findOrFail($id);
        return view('review_submissions.show', compact('reviewSubmission'));
    }

    public function edit($id)
    {
        $reviewSubmission = ReviewSubmission::findOrFail($id);
        return view('review_submissions.edit', compact('reviewSubmission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'submission_text' => 'required',
            // Add other validation rules as needed
        ]);

        $reviewSubmission = ReviewSubmission::findOrFail($id);
        $reviewSubmission->update($request->all());
        return redirect()->route('review_submissions.index')->with('success', 'Review Submission updated successfully.');
    }

    public function destroy($id)
    {
        ReviewSubmission::destroy($id);
        return redirect()->route('review_submissions.index')->with('success', 'Review Submission deleted successfully.');
    }
}
