<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Guideline;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuidelineController extends Controller
{
    public function view(Request $request, $id)
    {
        $guidelines = Guideline::where('product_id', $id)->get();
        $product_id = $id;
        $pName = Product::findOrFail($id)->name;

        return view('staff.guideline-manage', compact('guidelines', 'pName', 'product_id'));
    }


    public function store(Request $request)
    {
        // Validate the request 
        $validated = $request->validate([
            'product_id' => 'required|integer', // Ensure product_id is an integer
            'title' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,docx,txt,jpg,png,jpeg,mp4,mov,heic', // Validate file upload

            'remark' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $validated['file_type'] = $validated['file_path']->getMimeType();
            $validated['file_path'] = $request->file('file_path')->store('guidelines', 'public'); // Save file to storage/app/guidelines
        }

        // Create the guideline
        Guideline::create($validated);

        // Redirect with success message
        return redirect()->back()->with('success', 'Guideline created successfully.');
    }


    public function destroy(Guideline $guideline)
    {
        try {
            // Check if the old file exists and delete it
            if ($guideline->file_path && File::exists(storage_path('app/public/' . $guideline->file_path))) {
                File::delete(storage_path('app/public/' . $guideline->file_path));
            }

            // Delete the guideline record
            $guideline->delete();

            return redirect()->back()->with('success', 'Guideline deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the guideline.');
        }
    }

    public function viewGuideline($id)
    {
        $guideline = Guideline::findOrFail($id);

        $path = storage_path('app/public/' . $guideline->file_path);

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
}
