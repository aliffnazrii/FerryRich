<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

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
            'title' => 'required',
            'url' => 'required|url',
            // Add other validation rules as needed
        ]);

        $video = Video::findOrFail($id);
        $video->update($request->all());
        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy($id) 
    {
        Video::destroy($id);
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }

    // CUSTOM FUNCTION TO HANDLE VIDEO UPLOAD

    public function videoList(){

        $userId = auth()->user()->id;
       $videos = Video::where('uploaded_by',$userId)->get();
        return view('cc.video-submission', compact('videos'));
    }

}
