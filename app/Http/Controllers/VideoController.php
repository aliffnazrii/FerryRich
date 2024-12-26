<?php

namespace App\Http\Controllers;

use Illuminate\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('Staff')->only([

            'index',
            'store',
            'validateAdCode',
        ]);

        $this->middleware('CC')->only([
            'uploadLink',
            'videoList',

        ]);

        $this->middleware('login')->only([

            'streamVideo',
            'updateStatus',

        ]);





    }
    public function index()
    {
        $videos = Video::all();
        return view('staff.video-review', compact('videos'));
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
                'upload_date' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with('success', 'Video Uploaded successfully.');
        }
        return redirect()->back()->with('error', 'No file uploaded.');
    }


    // CUSTOM FUNCTION TO HANDLE VIDEO UPLOAD



    public function uploadLink(Request $request, $id)
    {

        if ($request->video_link != '') {
            $video = Video::findOrFail($id);
            $video->update([
                'video_link' => $request->input('video_link'),
                'ad_code' => $request->input('code_ad'),
                // 'ad_code' => $request->$code,
            ]);
            return redirect()->back()->with('success', 'Link Uploaded Successfully');
        }
        return redirect()->back()->with('failed', 'Link failed to upload');
    }

    public function videoList()
    {

        $userId = Auth::id();
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


    public function validateAdCode(Request $request, $id)
    {
        // Attempt to find the video by ID
        $video = Video::find($id);

        // Check if the video exists
        if (!$video) {
            return redirect()->back()->with('failed', 'Video not found.');
        }

        // Check if the video is already validated
        if ($video->validate === '1') { // Assuming '1' is the validated state
            return redirect()->back()->with('failed', 'Video has already been validated.');
        }

        // Get the authenticated user ID
        $userId = Auth::id();

        // Update the video validation status
        $video->update([
            'validate' => '1', // Set to '1' to mark as validated
            'reviewed_by' => $userId,
            'reviewed_at' => now(), // Use now() for current timestamp
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Successfully validated video with Ad Code.');
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
