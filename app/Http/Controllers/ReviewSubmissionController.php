<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewSubmission;
use App\Models\Video;

class ReviewSubmissionController extends Controller
{
    public function index()
    {
        $reviewSubmissions = ReviewSubmission::all();
        return view('staff.submission', compact('reviewSubmissions'));
    }

    public function store(Request $request,$vid_id)
    {
  
        $video = Video::find($vid_id);
        $contentCreator = $video->uploaded_by;

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
