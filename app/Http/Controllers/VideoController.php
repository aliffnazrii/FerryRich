<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('staff.video-review', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
            // Add other validation rules as needed
        ]);

        Video::create($request->all());
        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file_path' => 'required|mimes:mp4,avi,mov|max:102400', // 20MB max
        ]);

        $video = Video::findOrFail($id);

        // Check if a file was uploaded
        if ($request->hasFile('file_path')) {
            // Delete the old file if it exists
            if ($video->file_path && Storage::disk('public')->exists($video->file_path)) {
                Storage::disk('public')->delete($video->file_path);
            }

            // Store the new file
            $path = $request->file('file_path')->store('submited_videos', 'public');
            $video = Video::findOrFail($id);
            $video->update([
                'file_path' => $path,
                'status' => 'Pending',
                'feedback' => '',
            ]);
            return redirect()->back()->with('success', 'Video Uploaded successfully.');
        }
        return redirect()->back()->with('error', 'No file uploaded.');
    }


    // CUSTOM FUNCTION TO HANDLE VIDEO UPLOAD

    public function videoList()
    {

        $userId = auth()->user()->id;
        $videos = Video::where('uploaded_by', $userId)->get();
        return view('cc.video-submission', compact('videos'));
    }

    public function updateStatus(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->update([
            'feedback' => $request->input('feedback'),
            'status' => $request->input('status'),
        ]);

        return back()->with('success', 'Information updated successfully.');
    }

    public function streamVideo($id)
    {
        $video = Video::findOrFail($id);

        // Construct the full path to the video
        $path = storage_path('app/public/' . $video->file_path);

        // Check if file exists
        if (!file_exists($path)) {
            abort(404);
        }

        // Get file information
        $fileSize = filesize($path);
        $mimeType = mime_content_type($path);

        // Stream the video
        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }

}
