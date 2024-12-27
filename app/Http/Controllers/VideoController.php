<?php

namespace App\Http\Controllers;

use Illuminate\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CustomNotification;
use Illuminate\Support\Facades\Notification;


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

            $uploader = User::findOrFail($video->uploaded_by);

            $data = [
                'title' => 'There is a video from ' . $uploader->tiktok_username . ' need to be review ',
                'message' => 'There is a Content Creator that need to be validate',
                'url' => route('videos.index'),
            ];


            $userController = new UserController();
            $userController->sendNotificationToRole('Staff', $data);
            $userController->sendNotificationToRole('Admin', $data);



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

            $uploader = User::findOrFail($video->uploaded_by);

            $data = [
                'title' => 'There is a code ad need to be validate ',
                'message' => 'There is a code ad from ' . $uploader->tiktok_username . ' that need to be validate',
                'url' => '/code-ad',
            ];


            $userController = new UserController();
            $userController->sendNotificationToRole('Staff', $data);
            $userController->sendNotificationToRole('Admin', $data);


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
        $video = Video::with('paidReviews')->findOrFail($id);

        $video->update([
            'feedback' => $request->input('feedback'),
            'status' => $request->input('status'),
        ]);

        $cc = User::find($video->uploaded_by);

        if ($video->status == 'Approved') {
            $data = [
                'title' => 'Video has been Approved ',
                'message' => 'Please upload the video link and the code ad',
                'url' => '/video-submission',
            ];
        }
        if ($video->status == 'Rejected') {
            $data = [
                'title' => 'Video has been rejected ',
                'message' => 'Please upload a new video for the review',
                'url' => '/video-submission',
            ];
        }

        $userController = new UserController();
        $userController->sendNotification($cc, $data);

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

        if ($request->validate == '2') { //invalid == 2

            $userId = Auth::id();

            // Update the video validation status
            $video->update([
                'validate' => '0', // Set to '1' to mark as validated
                'reviewed_by' => $userId,
                'reviewed_at' => now(), // Use now() for current timestamp
            ]);

            $cc = User::find($video->uploaded_by);

            // notify cc
            $data = [
                'title' => 'Ad Code not valid',
                'message' => 'Ad Code is not valid. Please upload a new Ad Code',
                'url' => '/video-submission',
            ];

            $userController = new UserController();
            $userController->sendNotification($cc, $data);

            return redirect()->back()->with('success', 'Invalidate Ad Code Succeed.');
        } elseif ($request->validate == '1') {
            $userId = Auth::id();

            // Update the video validation status
            $video->update([
                'validate' => '1', // Set to '1' to mark as validated
                'reviewed_by' => $userId,
                'reviewed_at' => now(), // Use now() for current timestamp
            ]);

            $cc = User::find($video->uploaded_by);

             // notify cc
            $data = [
                'title' => 'Code Ad has been validated',
                'message' => 'Code Ad has been validated. Payment will be made within 7-14 working days',
                'url' => '/payment-history',
            ];

            $userController = new UserController();
            $userController->sendNotification($cc, $data);


            // Get the authenticated user ID
            $userId = Auth::id();

            // Update the video validation status
            $video->update([
                'validate' => '1', // Set to '1' to mark as validated
                'reviewed_by' => $userId,
                'reviewed_at' => now(), // Use now() for current timestamp
            ]);

            //notify finance

            $data = [
                'title' => 'New payment',
                'message' => 'There is a payment that need to be processed',
                'url' => route('payments.index'),
            ];


            $userController = new UserController();
            $userController->sendNotificationToRole('Finance', $data);

            return redirect()->back()->with('success', 'Ad Code Validated.');
        }


        // Redirect back with success message
        return redirect()->back()->with('failed', 'validate failed');
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
